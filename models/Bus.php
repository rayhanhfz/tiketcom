<?php

class Bus
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getBuses()
    {
        $sql = "SELECT * FROM buses";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addBus($name, $seats, $class, $image)
    {
        $sql = "INSERT INTO buses (name, seats, class, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siss", $name, $seats, $class, $image);
        return $stmt->execute();
    }
}
?>
