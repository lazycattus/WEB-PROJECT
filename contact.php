<!-- PHP INCLUDES -->

<?php
    include "connect.php";
    include 'Includes/functions/functions.php';
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

    // Getting website settings
    $stmt = $con->prepare("SELECT * FROM website_settings");
    $stmt->execute();
    $settings = $stmt->fetchAll();

    $restaurant_email = $restaurant_address = $restaurant_phonenumber = '';

    foreach ($settings as $opt) {
        if ($opt['option_name'] === 'restaurant_email') {
            $restaurant_email = $opt['option_value'];
        } elseif ($opt['option_name'] === 'restaurant_address') {
            $restaurant_address = $opt['option_value'];
        } elseif ($opt['option_name'] === 'restaurant_phonenumber') {
            $restaurant_phonenumber = $opt['option_value'];
        }
    }
?>

<!-- Custom Styling -->
<style>
    .contact-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: url('Design/images/back_3.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        color: #fff;
    }
    .contact-section::before {
        content: "";
        position: absolute;
        inset: 0;
    }
    .contact-info {
        position: relative;
        background: rgba(255,255,255,0.9);
        color: #333;
        max-width: 600px;
        margin: auto;
        padding: 40px 50px;
        border-radius: 12px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        text-align: center;
    }
    .contact-info h2 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #222;
    }
    .contact-info h3 {
        font-size: 22px;
        margin-bottom: 15px;
    }
    .contact-info h4 {
        font-size: 18px;
        line-height: 1.6;
    }
    .contact-info h4 span {
        font-weight: bold;
    }
</style>

<!-- Contact Us Section -->
<section class="contact-section" id="contact">
    <div class="contact-info">
        <h2>Contact Us Now!</h2>
        <h3><?php echo htmlspecialchars($restaurant_address); ?></h3>
        <h4>
            <span>Email:</span> <?php echo htmlspecialchars($restaurant_email); ?><br>
            <span>Phone:</span> <?php echo htmlspecialchars($restaurant_phonenumber); ?>
        </h4>
    </div>
</section>

<?php include "Includes/templates/footer.php"; ?>
