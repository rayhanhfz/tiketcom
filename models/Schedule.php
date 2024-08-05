<?php

class Schedule
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getSchedules($origin = '', $destination = '', $departure_date = '')
    {
        $sql = "SELECT schedules.id, buses.name, buses.class, buses.image, schedules.departure_time, schedules.arrival_time, schedules.origin, schedules.destination, buses.seats 
                FROM schedules 
                JOIN buses ON schedules.bus_id = buses.id 
                WHERE schedules.origin LIKE ? AND schedules.destination LIKE ? AND DATE(schedules.departure_time) LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $origin = "%$origin%";
        $destination = "%$destination%";
        $departure_date = $departure_date ? $departure_date : '%';
        $stmt->bind_param("sss", $origin, $destination, $departure_date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addSchedule($bus_id, $departure_time, $arrival_time, $origin, $destination)
    {
        $sql = "INSERT INTO schedules (bus_id, departure_time, arrival_time, origin, destination) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $bus_id, $departure_time, $arrival_time, $origin, $destination);
        return $stmt->execute();
    }

    public function getScheduleById($id)
    {
        $sql = "SELECT schedules.id, buses.name, buses.class, buses.image, schedules.departure_time, schedules.arrival_time, schedules.origin, schedules.destination, buses.seats 
                FROM schedules 
                JOIN buses ON schedules.bus_id = buses.id 
                WHERE schedules.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateSeats($id, $seats)
    {
        $sql = "UPDATE buses SET seats = ? WHERE id = (SELECT bus_id FROM schedules WHERE id = ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $seats, $id);
        return $stmt->execute();
    }
}
?>
