<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Add New Bus</h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=admin_add_bus" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Bus Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="seats">Number of Seats</label>
                    <input type="number" class="form-control" id="seats" name="seats" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <select class="form-control" id="class" name="class" required>
                        <option value="Executive">Executive</option>
                        <option value="Economy">Economy</option>
                        <option value="Business">Business</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Bus Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Bus</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>
