<?php 
    session_start();
    $pageTitle = 'Admin Registration';

    include 'connect.php';
    include 'Includes/functions/functions.php';
    include 'Includes/templates/header.php';
?>

<div class="login">
    <form class="login-container validate-form" name="register-form" action="" method="POST" onsubmit="return validateLoginForm()">
        <span class="login100-form-title p-b-32">
            Admin Registration
        </span>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_register'])) {
            $username = test_input($_POST['username']);
            $email = test_input($_POST['email']);
            $password = test_input($_POST['password']);
            $hashedPass = sha1($password); // For better security, use password_hash()

            // Check if username or email already exists
            $stmt = $con->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);

            if($stmt->rowCount() > 0) {
                echo '<div class="alert alert-danger">Username or Email already exists!</div>';
            } else {
                // Insert new user
                $stmt = $con->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
                $success = $stmt->execute([$username, $hashedPass, $email]);

                if($success) {
                    echo '<div class="alert alert-success">Registration successful. You can now <a href="index.php">log in</a>.</div>';
                } else {
                    echo '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
                }
            }
        }
        ?>

        <!-- USERNAME INPUT -->
        <div class="form-input">
            <span class="txt1">Username</span>
            <input type="text" name="username" class="form-control username"
            oninput="document.getElementById('username_required').style.display = 'none'" autocomplete="off" required>
            <div class="invalid-feedback" id="username_required">Username is required!</div>
        </div>

        <!-- EMAIL INPUT -->
        <div class="form-input">
            <span class="txt1">Email</span>
            <input type="email" name="email" class="form-control"
            oninput="document.getElementById('email_required').style.display = 'none'" autocomplete="off" required>
            <div class="invalid-feedback" id="email_required">Email is required!</div>
        </div>

        <!-- PASSWORD INPUT -->
        <div class="form-input">
            <span class="txt1">Password</span>
            <input type="password" name="password" class="form-control"
            oninput="document.getElementById('password_required').style.display = 'none'" autocomplete="new-password" required>
            <div class="invalid-feedback" id="password_required">Password is required!</div>
        </div>

        <!-- SUBMIT BUTTON -->
        <p>
            <button type="submit" name="admin_register">Register</button>
        </p>

        <span class="forgotPW">Already have an account? <a href="index.php">Login here</a>.</span>
    </form>
</div>

<?php include 'Includes/templates/footer.php'; ?>
