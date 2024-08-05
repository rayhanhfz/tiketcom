<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/db.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ScheduleController.php';
require_once 'controllers/BookingController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/AuthController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'schedule':
        $controller = new ScheduleController($conn);
        $controller->index();
        break;
    case 'book':
        $controller = new BookingController($conn);
        $controller->view($_GET['schedule_id']);
        break;
    case 'store':
        $controller = new BookingController($conn);
        $controller->store();
        break;
    case 'bookings':
        $controller = new BookingController($conn);
        $controller->index();
        break;
    case 'admin':
        $controller = new AdminController($conn);
        $controller->index();
        break;
    case 'admin_show_bus_form':
        $controller = new AdminController($conn);
        $controller->showBusForm();
        break;
    case 'admin_add_bus':
        $controller = new AdminController($conn);
        $controller->addBus();
        break;
    case 'admin_show_schedule_form':
        $controller = new AdminController($conn);
        $controller->showScheduleForm();
        break;
    case 'admin_add_schedule':
        $controller = new AdminController($conn);
        $controller->addSchedule();
        break;
    case 'admin_bookings':
        $controller = new AdminController($conn);
        $controller->showBookings();
        break;
    case 'login':
        $controller = new AuthController($conn);
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController($conn);
        $controller->logout();
        break;
    case 'register':
        $controller = new AuthController($conn);
        $controller->register();
        break;
    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
?>
