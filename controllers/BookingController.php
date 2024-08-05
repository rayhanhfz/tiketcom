<?php

require_once 'models/Booking.php';
require_once 'models/Schedule.php';

class BookingController
{
    private $bookingModel;
    private $scheduleModel;

    public function __construct($conn)
    {
        $this->bookingModel = new Booking($conn);
        $this->scheduleModel = new Schedule($conn);
    }

    private function checkLogin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }

    public function store()
    {
        $this->checkLogin();
        if (isset($_POST['schedule_id'], $_POST['passenger_name'], $_POST['passenger_email'], $_POST['seats'])) {
            $schedule_id = $_POST['schedule_id'];
            $passenger_name = $_POST['passenger_name'];
            $passenger_email = $_POST['passenger_email'];
            $seats = $_POST['seats'];

            // Get current available seats
            $schedule = $this->scheduleModel->getScheduleById($schedule_id);
            if ($schedule['seats'] < $seats) {
                echo "Not enough seats available.";
                return;
            }

            $success = $this->bookingModel->createBooking($schedule_id, $passenger_name, $passenger_email, $seats, $_SESSION['user_id']);

            if ($success) {
                // Update seats in schedule
                $this->scheduleModel->updateSeats($schedule_id, $schedule['seats'] - $seats);
                header("Location: index.php?action=bookings");
            } else {
                echo "Error occurred. Please try again.";
            }
        }
    }

    public function index()
    {
        $this->checkLogin();
        $bookings = $this->bookingModel->getBookingsByUser($_SESSION['user_id']);
        include 'views/bookings.php';
    }

    public function view($schedule_id)
    {
        $this->checkLogin();
        $schedule = $this->scheduleModel->getScheduleById($schedule_id);
        include 'views/book.php';
    }
}
?>
