<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>

<?php

if (isset($_POST['do_']) && $_POST['do_'] == "Deliver_Order") {
    $order_id = $_POST['order_id'];

    $stmt = $con->prepare("UPDATE placed_orders SET delivered = 1 WHERE order_id = ?");
    $stmt->execute([$order_id]);
}

elseif (isset($_POST['do_']) && $_POST['do_'] == "Cancel_Order") {
    $order_id = $_POST['order_id'];
    $cancellation_reason_order = test_input($_POST['cancellation_reason_order']);

    $stmt = $con->prepare("UPDATE placed_orders SET canceled = 1, cancellation_reason = ? WHERE order_id = ?");
    $stmt->execute([$cancellation_reason_order, $order_id]);
}

elseif (isset($_POST['do_']) && $_POST['do_'] == "Cancel_Reservation") {
    $reservation_id = $_POST['reservation_id'];
    $cancellation_reason_reservation = test_input($_POST['cancellation_reason_reservation']);

    // Update reservation as canceled
    $stmt = $con->prepare("UPDATE reservations SET canceled = 1, cancellation_reason = ? WHERE reservation_id = ?");
    $stmt->execute([$cancellation_reason_reservation, $reservation_id]);

    // Free the table associated with this reservation
    $stmt = $con->prepare("SELECT table_id FROM reservations WHERE reservation_id = ?");
    $stmt->execute([$reservation_id]);
    $table_id = $stmt->fetchColumn();

    if ($table_id) {
        $stmt = $con->prepare("UPDATE tables SET is_available = 1 WHERE table_id = ?");
        $stmt->execute([$table_id]);
    }
}

elseif (isset($_POST['do_']) && $_POST['do_'] == "Liberate_Reservation") {
    $reservation_id = $_POST['reservation_id'];

    // Get the table ID for the reservation
    $stmt = $con->prepare("SELECT table_id FROM reservations WHERE reservation_id = ?");
    $stmt->execute([$reservation_id]);
    $table_id = $stmt->fetchColumn();

    // 1. Mark reservation as liberated and set selected_time to the past
    $stmt = $con->prepare("UPDATE reservations SET liberated = 1, selected_time = ? WHERE reservation_id = ?");
    $stmt->execute([date('Y-m-d H:i:s', time() - 60), $reservation_id]);

    // 2. Mark table as available
    $stmt = $con->prepare("UPDATE tables SET is_available = 1 WHERE table_id = ?");
    $stmt->execute([$table_id]);
}


?>
