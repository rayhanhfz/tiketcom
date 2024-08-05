<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Add New Bus</h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=admin_store" method="post">
                <div class="form-group">
                    <label for="name">Bus Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="seats">Number of Seats</label>
                    <input type="number" class="form-control" id="seats" name="seats" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Bus</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>
