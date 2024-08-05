<?php

class Booking
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createBooking($schedule_id, $passenger_name, $passenger_email, $seats, $user_id)
    {
        $sql = "INSERT INTO bookings (schedule_id, passenger_name, passenger_email, seats, user_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issii", $schedule_id, $passenger_name, $passenger_email, $seats, $user_id);
        return $stmt->execute();
    }

    public function getBookingsByUser($user_id)
    {
        $sql = "SELECT bookings.id, buses.name, schedules.departure_time, schedules.arrival_time, schedules.origin, schedules.destination, bookings.seats, bookings.booking_time 
                FROM bookings 
                JOIN schedules ON bookings.schedule_id = schedules.id 
                JOIN buses ON schedules.bus_id = buses.id
                WHERE bookings.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllBookings()
    {
        $sql = "SELECT bookings.id, bookings.passenger_name, bookings.passenger_email, buses.name, schedules.departure_time, schedules.arrival_time, schedules.origin, schedules.destination, bookings.seats, bookings.booking_time 
                FROM bookings 
                JOIN schedules ON bookings.schedule_id = schedules.id 
                JOIN buses ON schedules.bus_id = buses.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
