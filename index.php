<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include 'Includes/functions/functions.php';
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";


    //Getting website settings

    $stmt_web_settings = $con->prepare("SELECT * FROM website_settings");
    $stmt_web_settings->execute();
    $web_settings = $stmt_web_settings->fetchAll();

    $restaurant_name = "";
    $restaurant_email = "";
    $restaurant_address = "";
    $restaurant_phonenumber = "";

    foreach ($web_settings as $option)
    {
        if($option['option_name'] == 'restaurant_name')
        {
            $restaurant_name = $option['option_value'];
        }

        elseif($option['option_name'] == 'restaurant_email')
        {
            $restaurant_email = $option['option_value'];
        }

        elseif($option['option_name'] == 'restaurant_phonenumber')
        {
            $restaurant_phonenumber = $option['option_value'];
        }
        elseif($option['option_name'] == 'restaurant_address')
        {
            $restaurant_address = $option['option_value'];
        }
    }

?>

	<!-- HOME SECTION -->

	<section class="home-section" id="home">
		<div class="container">
			<div class="row" style="flex-wrap: nowrap;">
				<div class="col-md-6 home-centre-section">
					<div style="padding: 100px 0px; color: white;">
						<h1>
							Orderlah
						</h1>
						<h2>
							Lah! Just Order Already.
						</h2>
						<hr>
						<p>
							Tasty food, fast delivery, confirm syok! 
						</p>
						<div style="display: flex;">
							<a href="order_food.php" target="_blank" class="bttn_style_1" style="margin-right: 10px; display: flex;justify-content: center;align-items: center;">
								Order Now
								<i class="fas fa-angle-right"></i>
							</a>
							<a href="#menus" class="bttn_style_2" style="display: flex;justify-content: center;align-items: center;">
								VIEW MENU
								<i class="fas fa-angle-right"></i>
							</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<!-- OUR QUALITIES SECTION -->

<section class="our_qualities" style="padding:100px 0px;">
    <div class="container">
        <div class="row">
            <!-- Quality Foods -->
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/quality_food_img.png">
                    <div class="caption">
                        <h3>Quality Foods</h3>
                        <p>
                            We serve only the finest quality meals, prepared with fresh ingredients to ensure great taste and nutrition in every bite.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Fast Delivery -->
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/fast_delivery_img.png">
                    <div class="caption">
                        <h3>Fast Delivery</h3>
                        <p>
                            Enjoy prompt and reliable delivery service, ensuring your food arrives hot and on time, every time.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Original Taste -->
            <div class="col-md-4">
                <div class="our_qualities_column">
                    <img src="Design/images/original_taste_img.png">
                    <div class="caption">
                        <h3>Original Taste</h3>
                        <p>
                            Discover authentic flavors crafted from traditional recipes that bring a unique and unforgettable dining experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


	

    <!-- FOOTER BOTTOM  -->

    <?php include "Includes/templates/footer.php"; ?>

    <script type="text/javascript">

	    $(document).ready(function()
	    {
	        $('#contact_send').click(function()
	        {
	            var contact_name = $('#contact_name').val();
	            var contact_email = $('#contact_email').val();
	            var contact_subject = $('#contact_subject').val();
	            var contact_message = $('#contact_message').val();

	            var flag = 0;

	            if($.trim(contact_name) == "")
	            {
	            	$('#invalid-name').text('This is a required field!');
	            	flag = 1;
	            }
	            else
	            {
	            	if(contact_name.length < 5)
	            	{
	            		$('#invalid-name').text('Length is less than 5 letters!');
	            		flag = 1;
	            	}
	            }

	            if(!ValidateEmail(contact_email))
	            {
	            	$('#invalid-email').text('Invalid e-mail!');
	            	flag = 1;
	            }

	            if($.trim(contact_subject) == "")
	            {
	            	$('#invalid-subject').text('This is a required field!');
	            	flag = 1;
	            }

	            if($.trim(contact_message) == "")
	            {
	            	$('#invalid-message').text('This is a required field!');
	            	flag = 1;
	            }

	            if(flag == 0)
	            {
	            	$('#sending_load').show();

		            $.ajax({
		                url: "Includes/php-files-ajax/contact.php",
		                type: "POST",
		                data:{contact_name:contact_name, contact_email:contact_email, contact_subject:contact_subject, contact_message:contact_message},
		                success: function (data) 
		                {
		                	$('#contact_status_message').html(data);
		                },
		                beforeSend: function()
		                {
					        $('#sending_load').show();
					    },
					    complete: function()
					    {
					        $('#sending_load').hide();
					    },
		                error: function(xhr, status, error) 
		                {
		                    alert("Internal ERROR has occured, please, try later!");
		                }
		            });
	            }
	            
	        });
	    }); 
	    
	</script>

