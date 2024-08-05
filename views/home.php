<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('includes/header.php');

// Pastikan pengguna sudah login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Guest'; // Atau redirect ke halaman login
}
?>

<main class="container mt-4">
    <div class="jumbotron jumbotron-fluid bg-primary text-white text-center rounded-lg">
        <div class="container">
            <h1 class="display-4">Selamat datang, <?php echo htmlspecialchars($username); ?>!</h1>
            <p class="lead">Effortlessly book your bus tickets online with our easy-to-use platform.</p>
            <hr class="my-4">
            <form action="index.php?action=schedule" method="get">
                <input type="hidden" name="action" value="schedule">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="origin">Origin</label>
                        <input type="text" class="form-control" id="origin" name="origin" placeholder="Enter Origin" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="destination">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="departure_date">Departure Date</label>
                        <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-lg">Search Buses</button>
            </form>
        </div>
    </div>
</main>

<footer class="footer bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Bus Ticket Booking System. All rights reserved.</p>
    </div>
</footer>

<script src="path/to/bootstrap.js"></script>
<script src="path/to/custom.js">
</body>
</html>
