<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Booking Details</h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=store" method="post">
                <input type="hidden" name="schedule_id" value="<?php echo htmlspecialchars($schedule['id']); ?>">
                <div class="form-group">
                    <label for="passenger_name">Name</label>
                    <input type="text" class="form-control" id="passenger_name" name="passenger_name" required>
                </div>
                <div class="form-group">
                    <label for="passenger_email">Email</label>
                    <input type="email" class="form-control" id="passenger_email" name="passenger_email" required>
                </div>
                <div class="form-group">
                    <label for="seats">Number of Seats</label>
                    <input type="number" class="form-control" id="seats" name="seats" required>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </div>
</main>

</body
