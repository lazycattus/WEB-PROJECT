<?php
    include "connect.php";
    include 'Includes/functions/functions.php';
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

    // Get website settings
    $stmt_web_settings = $con->prepare("SELECT * FROM website_settings");
    $stmt_web_settings->execute();
    $web_settings = $stmt_web_settings->fetchAll();

    $restaurant_name = "";
    $restaurant_email = "";
    $restaurant_address = "";
    $restaurant_phonenumber = "";

    foreach ($web_settings as $option) {
        if($option['option_name'] == 'restaurant_name') {
            $restaurant_name = $option['option_value'];
        } elseif($option['option_name'] == 'restaurant_email') {
            $restaurant_email = $option['option_value'];
        } elseif($option['option_name'] == 'restaurant_phonenumber') {
            $restaurant_phonenumber = $option['option_value'];
        } elseif($option['option_name'] == 'restaurant_address') {
            $restaurant_address = $option['option_value'];
        }
    }
?>

<!-- ================== HOME SECTION ================== -->
<section class="home-section" id="home" style="padding: 100px 0; background-color: #222; color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <h1>Orderlah</h1>
                <h2>Lah! Just Order Already.</h2>
                <hr style="border-color: white;">
                <p>Tasty food, fast delivery, confirm syok!</p>
                <div class="d-flex justify-content-center mt-4">
                    <a href="order_food.php" target="_blank" class="bttn_style_1 mx-2">
                        Order Now <i class="fas fa-angle-right"></i>
                    </a>
                    <a href="#menus" class="bttn_style_2 mx-2">
                        View Menu <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== QUALITIES SECTION ================== -->
<section class="our_qualities" style="padding: 100px 0; background-color: #f8f8f8;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/quality_food_img.png">
                    <h3>Quality Foods</h3>
                    <p>We serve only the finest quality meals, prepared with fresh ingredients for great taste and nutrition.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/fast_delivery_img.png">
                    <h3>Fast Delivery</h3>
                    <p>Prompt and reliable delivery service so your food arrives hot and on time, every time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/original_taste_img.png">
                    <h3>Original Taste</h3>
                    <p>Authentic flavors crafted from traditional recipes for a unique dining experience.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== FOOTER ================== -->
<?php include "Includes/templates/footer.php"; ?>

<!-- ================== CSS for Fading Mouse Trail ================== -->
<style>
  .trail-dot {
    position: absolute;
    width: 12px;
    height: 12px;
    background-color: white;
    border-radius: 50%;
    pointer-events: none;
    opacity: 1;
    transition: opacity 0.5s ease;
    z-index: 9999;
  }
</style>

<!-- ================== JS SCRIPTS ================== -->
<script src="Design/js/jquery.min.js"></script>
<script src="Design/js/bootstrap.min.js"></script>
<script src="Design/js/bootstrap.bundle.min.js"></script>
<script src="Design/js/main.js"></script>

<!-- ================== Fading Mouse Trail Script ================== -->
<script>
  document.addEventListener("mousemove", function(e) {
    const dot = document.createElement("div");
    dot.classList.add("trail-dot");
    dot.style.left = e.pageX + "px";
    dot.style.top = e.pageY + "px";
    document.body.appendChild(dot);

    setTimeout(() => {
      dot.style.opacity = "0";
    }, 10); // start fading almost immediately

    setTimeout(() => {
      dot.remove();
    }, 500); // remove after fade completes
  });
</script>

</body>
</html>
