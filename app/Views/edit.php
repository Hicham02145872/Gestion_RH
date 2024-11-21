<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Employee</h2>

    <!-- Edit Employee Form -->
    <form action="<?= site_url('gestion_employee/edit/' . $employee->id); ?>" method="post">
        <?= csrf_field(); ?> <!-- CSRF token for security -->

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?= old('name', $employee->name); ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?= old('email', $employee->email); ?>" required>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" class="form-control" name="position" value="<?= old('position', $employee->position); ?>" required>
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" class="form-control" name="department" value="<?= old('department', $employee->department); ?>">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="<?= old('phone', $employee->phone); ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="Active" <?= old('status', $employee->status) == 'Active' ? 'selected' : ''; ?>>Active</option>
                <option value="On Leave" <?= old('status', $employee->status) == 'On Leave' ? 'selected' : ''; ?>>On Leave</option>
                <option value="Inactive" <?= old('status', $employee->status) == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Employee</button>
        <a href="<?= site_url('employee'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
