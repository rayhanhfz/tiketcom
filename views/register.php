<?php include('includes/header.php'); ?>

<main class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=register" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3">Already have an account? <a href="index.php?action=login">Login here</a></p>
        </div>
    </div>
</main>

</body>
</html>
