<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Add New Schedule</h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=admin_add_schedule" method="post">
                <div class="form-group">
                    <label for="bus_id">Bus</label>
                    <select class="form-control" id="bus_id" name="bus_id" required>
                        <?php foreach ($buses as $bus): ?>
                            <option value="<?php echo $bus['id']; ?>"><?php echo $bus['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure_time">Departure Time</label>
                    <input type="datetime-local" class="form-control" id="departure_time" name="departure_time" required>
                </div>
                <div class="form-group">
                    <label for="arrival_time">Arrival Time</label>
                    <input type="datetime-local" class="form-control" id="arrival_time" name="arrival_time" required>
                </div>
                <div class="form-group">
                    <label for="origin">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" required>
                </div>
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destination" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Schedule</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>
