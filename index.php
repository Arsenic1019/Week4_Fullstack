<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="form-box">
    <h2>User Registration</h2>

    <!-- SUCCESS MESSAGE -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="success">Registration successful!</div>
    <?php endif; ?>

    <!-- ERROR MESSAGE -->
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form action="process.php" method="POST">

        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="name" placeholder=" " required>
            <label>Name</label>
        </div>

        <div class="input-group">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" placeholder=" " required>
            <label>Email</label>
        </div>

        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder=" " required>
            <label>Password</label>
        </div>

        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="confirm_password" placeholder=" " required>
            <label>Confirm Password</label>
        </div>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
