<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <h2 class="mb-4">Bus List</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Seats</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buses as $bus): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bus['id']); ?></td>
                    <td><?php echo htmlspecialchars($bus['name']); ?></td>
                    <td><?php echo htmlspecialchars($bus['seats']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary mt-3" href="index.php?action=admin_show_bus_form">Add New Bus</a>
    <a class="btn btn-secondary mt-3" href="index.php?action=admin_show_schedule_form">Add New Schedule</a>
</main>

</body>
</html>
