<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <h2 class="mb-4">Available Bus Schedules</h2>
    <?php if (!empty($schedules)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Bus</th>
                        <th>Class</th>
                        <th>Image</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Seats Available</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($schedule['name']); ?></td>
                        <td><?php echo htmlspecialchars($schedule['class']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($schedule['image']); ?>" alt="Bus Image" style="width: 100px;"></td>
                        <td><?php echo htmlspecialchars($schedule['departure_time']); ?></td>
                        <td><?php echo htmlspecialchars($schedule['arrival_time']); ?></td>
                        <td><?php echo htmlspecialchars($schedule['origin']); ?></td>
                        <td><?php echo htmlspecialchars($schedule['destination']); ?></td>
                        <td><?php echo htmlspecialchars($schedule['seats']); ?></td>
                        <td><a class="btn btn-success" href="index.php?action=book&schedule_id=<?php echo $schedule['id']; ?>">Book Now</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center">No schedules found for the selected route and date.</p>
    <?php endif; ?>
</main>

</body>
</html>
