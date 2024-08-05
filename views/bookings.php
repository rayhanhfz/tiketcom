<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <h2 class="mb-4">My Bookings</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Bus</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Seats</th>
                    <th>Booking Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?php echo htmlspecialchars($booking['id']); ?></td>
                    <td><?php echo htmlspecialchars($booking['name']); ?></td>
                    <td><?php echo htmlspecialchars($booking['departure_time']); ?></td>
                    <td><?php echo htmlspecialchars($booking['arrival_time']); ?></td>
                    <td><?php echo htmlspecialchars($booking['origin']); ?></td>
                    <td><?php echo htmlspecialchars($booking['destination']); ?></td>
                    <td><?php echo htmlspecialchars($booking['seats']); ?></td>
                    <td><?php echo htmlspecialchars($booking['booking_time']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>
