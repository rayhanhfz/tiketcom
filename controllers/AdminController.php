<?php

require_once 'models/Bus.php';
require_once 'models/Schedule.php';
require_once 'models/Booking.php';

class AdminController
{
    private $busModel;
    private $scheduleModel;
    private $bookingModel;

    public function __construct($conn)
    {
        $this->busModel = new Bus($conn);
        $this->scheduleModel = new Schedule($conn);
        $this->bookingModel = new Booking($conn);
    }

    public function index()
    {
        $this->checkAdmin();
        include 'views/admin_dashboard.php';
    }

    public function showBusForm()
    {
        $this->checkAdmin();
        include 'views/admin_bus_form.php';
    }

    public function addBus()
    {
        $this->checkAdmin();
        if (isset($_POST['name']) && isset($_POST['seats']) && isset($_POST['class']) && isset($_FILES['image'])) {
            $name = $_POST['name'];
            $seats = $_POST['seats'];
            $class = $_POST['class'];
            $image = $this->uploadImage($_FILES['image']);

            $success = $this->busModel->addBus($name, $seats, $class, $image);

            if ($success) {
                header("Location: index.php?action=admin");
            } else {
                echo "Error occurred. Please try again.";
            }
        }
    }

    public function showScheduleForm()
    {
        $this->checkAdmin();
        $buses = $this->busModel->getBuses();
        include 'views/admin_schedule_form.php';
    }

    public function addSchedule()
    {
        $this->checkAdmin();
        if (isset($_POST['bus_id']) && isset($_POST['departure_time']) && isset($_POST['arrival_time']) && isset($_POST['origin']) && isset($_POST['destination'])) {
            $bus_id = $_POST['bus_id'];
            $departure_time = $_POST['departure_time'];
            $arrival_time = $_POST['arrival_time'];
            $origin = $_POST['origin'];
            $destination = $_POST['destination'];

            $success = $this->scheduleModel->addSchedule($bus_id, $departure_time, $arrival_time, $origin, $destination);

            if ($success) {
                header("Location: index.php?action=admin");
            } else {
                echo "Error occurred. Please try again.";
            }
        }
    }

    public function showBookings()
    {
        $this->checkAdmin();
        $bookings = $this->bookingModel->getAllBookings();
        include 'views/admin_bookings.php';
    }

    private function checkAdmin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: index.php?action=login");
            exit();
        }
    }

    private function uploadImage($file)
    {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            return null;
        }

        // Check file size
        if ($file["size"] > 500000) {
            return null;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return null;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            return $targetFile;
        }

        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return null;
        }
    }
}
?>
