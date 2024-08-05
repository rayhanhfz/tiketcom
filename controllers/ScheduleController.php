<?php

require_once 'models/Schedule.php';

class ScheduleController
{
    private $scheduleModel;

    public function __construct($conn)
    {
        $this->scheduleModel = new Schedule($conn);
    }

    public function index()
    {
        $origin = isset($_GET['origin']) ? $_GET['origin'] : '';
        $destination = isset($_GET['destination']) ? $_GET['destination'] : '';
        $departure_date = isset($_GET['departure_date']) ? $_GET['departure_date'] : '';

        $schedules = $this->scheduleModel->getSchedules($origin, $destination, $departure_date);
        include 'views/schedule.php';
    }
}
?>
