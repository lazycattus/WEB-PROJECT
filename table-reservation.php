<!-- PHP INCLUDES -->

<?php
    //Set page title
    $pageTitle = 'Table Reservation';

    include "connect.php";
    include 'Includes/functions/functions.php';
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";


?>
    
    <style type="text/css">
        .table_reservation_section
        {
            max-width: 850px;
            margin: 50px auto;
            min-height: 500px;
        }

        .check_availability_submit
        {
            background: #ffc851;
            color: white;
            border-color: #ffc851;
            font-family: work sans,sans-serif;
        }
        .client_details_tab  .form-control
        {
            background-color: #fff;
            border-radius: 0;
            padding: 25px 10px;
            box-shadow: none;
            border: 2px solid #eee;
        }

        .client_details_tab  .form-control:focus 
        {
            border-color: #ffc851;
            box-shadow: none;
            outline: none;
        }
        .text_header
        {
            margin-bottom: 5px;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.5;
            margin-top: 22px;
            text-transform: capitalize;
        }
        .layer
        {
            height: 100%;
        background: -moz-linear-gradient(top, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
    background: -webkit-linear-gradient(top, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
    background: linear-gradient(to bottom, rgba(45,45,45,0.4) 0%, rgba(45,45,45,0.9) 100%);
        }

    </style>

    <!-- START ORDER FOOD SECTION -->

    <section style="
    background: url(Design/images/food_pic.jpg);
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="layer">
            <div style="text-align: center;padding: 15px;">
                <h1 style="font-size: 120px; color: white;font-family: 'Roboto'; font-weight: 100;
">Book a Table</h1>
            </div>
        </div>
        
    </section>

	<section class="table_reservation_section">

        <div class="container">
            <?php

            if(isset($_POST['submit_table_reservation_form']) && $_SERVER['REQUEST_METHOD'] === 'POST')
            {
                // Selected Date and Time

                $selected_date = $_POST['selected_date'];
                $selected_time = $_POST['selected_time'];

                $desired_date = $selected_date." ".$selected_time;

                //Nbr of Guests

                $number_of_guests = $_POST['number_of_guests'];

                //Table ID

                $table_id = $_POST['table_id'];

                //Client Details

                $client_full_name = test_input($_POST['client_full_name']);
                $client_phone_number = test_input($_POST['client_phone_number']);
                $client_email = test_input($_POST['client_email']);

                $con->beginTransaction();
                try
                {
                    $stmtgetCurrentClientID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'restaurant_website' AND TABLE_NAME = 'clients'");
            
                    $stmtgetCurrentClientID->execute();
                    $client_id = $stmtgetCurrentClientID->fetch();

                    $stmtClient = $con->prepare("insert into clients(client_name,client_phone,client_email) 
                                values(?,?,?)");
                    $stmtClient->execute(array($client_full_name,$client_phone_number,$client_email));

                    
                    $stmt_reservation = $con->prepare("insert into reservations(date_created, client_id, selected_time, nbr_guests, table_id) values(?, ?, ?, ?, ?)");
                    $stmt_reservation->execute(array(Date("Y-m-d H:i"),$client_id[0], $desired_date, $number_of_guests, $table_id));
                    $stmt_table = $con->prepare("UPDATE tables SET is_available = 0 WHERE table_id = ?");
$stmt_table->execute([$table_id]);
                    $stmtUpdateTable = $con->prepare("UPDATE tables SET is_available = 0 WHERE table_id = ?");
                    $stmtUpdateTable->execute([$table_id]);

                    
                    echo "<div class = 'alert alert-success'>";
                        echo "Great! Your Reservation has been created successfully.";
                    echo "</div>";

                    $con->commit();
                }
                catch(Exception $e)
                {
                    $con->rollBack();
                    echo "<div class = 'alert alert-danger'>"; 
                        echo $e->getMessage();
                    echo "</div>";
                }
            }

        ?>



            <div class="text_header">
                <span>
                    1. Select Date & Time
                </span>
            </div>
            <form method="POST" action="table-reservation.php">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="reservation_date">Date</label>
                            <input type="date" min="<?php echo (isset($_POST['reservation_date']))?$_POST['reservation_date']:date('Y-m-d',strtotime("+1day"));  ?>" 
                            value = "<?php echo (isset($_POST['reservation_date']))?$_POST['reservation_date']:date('Y-m-d',strtotime("+1day"));  ?>"
                            class="form-control" name="reservation_date">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="reservation_time">Time</label>
                            <input type="time" value="<?php echo (isset($_POST['reservation_time']))?$_POST['reservation_time']:date('H:i');  ?>" class="form-control" name="reservation_time">
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                       <div class="form-group">
    <label for="number_of_guests">How many people?</label>
    <input 
        class="form-control" 
        list="guests_options" 
        name="number_of_guests" 
        id="number_of_guests" 
        value="<?php echo isset($_POST['number_of_guests']) ? htmlspecialchars($_POST['number_of_guests']) : ''; ?>"
    >
    <datalist id="guests_options">
        <option value="1">One person</option>
        <option value="2">Two person</option>
        <option value="3">Three person</option>
        <option value="4">Four person</option>
    </datalist>
</div>

                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <label for="check_availability" style="visibility: hidden;">Check Availability</label>
                            <input type="submit" class="form-control check_availability_submit" name="check_availability_submit">
                        </div>
                    </div>
                </div>
            </form>

            <!-- CHECKING AVAILABILITY OF TABLES -->

            <?php
if (isset($_POST['check_availability_submit'])) {
    $selected_date = $_POST['reservation_date'];
   $selected_time = date("H:i:s", strtotime($_POST['reservation_time']));

    $number_of_guests = $_POST['number_of_guests'];

    $datetime = $selected_date . ' ' . $selected_time;

    $stmt = $con->prepare("
       SELECT table_id 
FROM tables 
WHERE is_available = 1
  AND table_id NOT IN (
    SELECT table_id 
    FROM reservations 
    WHERE DATE(selected_time) = ? 
      AND TIME(selected_time) = ? 
      AND canceled = 0 
      AND liberated = 0
)
ORDER BY table_id ASC

    ");
    $stmt->execute([$selected_date, $selected_time]);
    $available_tables = $stmt->fetchAll();

    if (count($available_tables) == 0) {
        echo '<div class="error_div">
                <span class="error_message" style="font-size: 16px">ALL TABLES ARE RESERVED</span>
              </div>';
    } else {
        $table_id = $available_tables[0]['table_id'];
        ?>
        <div class="text_header">
            <span>2. Client details</span>
        </div>
        <form method="POST" action="table-reservation.php">
            <input type="hidden" name="selected_date" value="<?php echo $selected_date ?>">
            <input type="hidden" name="selected_time" value="<?php echo $selected_time ?>">
            <input type="hidden" name="number_of_guests" value="<?php echo $number_of_guests ?>">
            <input type="hidden" name="table_id" value="<?php echo $table_id ?>">
            <div class="client_details_tab">
                <div class="form-group colum-row row">
                    <div class="col-sm-12">
                        <input type="text" name="client_full_name" id="client_full_name" class="form-control" placeholder="Full name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="email" name="client_email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="client_phone_number" class="form-control" placeholder="Phone number" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit_table_reservation_form" class="btn btn-info" value="Make a Reservation">
            </div>
        </form>
        <?php
    }
}


            ?>
        </div>
    </section>

    <style type="text/css">
        .details_card
        {
            display: flex;
            align-items: center;
            margin: 150px 0px;
        }
        .details_card>span
        {
            float: left;
            font-size: 60px;
        }
        
        .details_card>div
        {
            float: left;
            font-size: 20px;
            margin-left: 20px;
            letter-spacing: 2px
        }
    </style>

    <section class="restaurant_details" style="background: url(Design/images/food_pic_2.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50% 0%;
    background-size: cover;
    color:white !important;
    min-height: 300px;">
        <div class="layer">
            <div class="container">
            <div class="row">
            <div class="col-md-3 details_card">
                <span>30</span>
                <div>
                    Total 
                    <br>
                    Reservations
                </div>
            </div>
            <div class="col-md-3 details_card">
                <span>30</span>
                <div>
                    Total 
                    <br>
                    Menus
                </div>
            </div>
            <div class="col-md-3 details_card">
                <span>30</span>
                <div>
                    Years of 
                    <br>
                    Experience
                </div>
            </div>
            <div class="col-md-3 details_card">
                <span>30</span>
                <div>
                    Profesionnal 
                    <br>
                    Cook
                </div>
            </div>
        </div>
        </div>
         </div>
    </section>

    <!-- FOOTER BOTTOM  -->

    <?php include "Includes/templates/footer.php"; ?>
