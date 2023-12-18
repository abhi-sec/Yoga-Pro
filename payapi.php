<?php
include("connection.php");

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle payment request
    handlePayment();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Method Not Allowed"]);
}

function handlePayment() {
    global $conn;

    // Decode JSON data
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Log decoded data for debugging
    error_log("Decoded JSON data: " . print_r($data, true));

    // Use decoded data to retrieve payment details
    $email = mysqli_real_escape_string($conn, $data['email'] ?? '');

    // Perform basic server-side validation here if needed

    // Insert email into the feepaid table with a fixed payment amount
    $pay = 500;
    $feepaid_query = "INSERT INTO feepaid (email, AmountPaid) VALUES (?, ?)";
    $feepaid_stmt = mysqli_prepare($conn, $feepaid_query);
    mysqli_stmt_bind_param($feepaid_stmt, "si", $email, $pay);

    if (mysqli_stmt_execute($feepaid_stmt)) {
        http_response_code(200); // OK
        echo json_encode(["success" => true, "message" => "Payment successful"]);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(["success" => false, "message" => "Failed to process payment"]);
    }

    mysqli_stmt_close($feepaid_stmt);
}


?>
