<?php
include("connection.php");

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle registration request
    handleRegistration();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Method Not Allowed"]);
}

function handleRegistration() {
    global $conn;

    // Decode JSON data
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Log decoded data for debugging
    error_log("Decoded JSON data: " . print_r($data, true));

    // Use decoded data to retrieve form values
    $fname = mysqli_real_escape_string($conn, $data['fname'] ?? '');
    $lname = mysqli_real_escape_string($conn, $data['lname'] ?? '');
    $email = mysqli_real_escape_string($conn, $data['email'] ?? '');
    $batch = mysqli_real_escape_string($conn, $data['batch'] ?? '');
    $age = mysqli_real_escape_string($conn, $data['age'] ?? '');
    $dob = mysqli_real_escape_string($conn, $data['dob'] ?? '');

    if (empty($fname) || empty($lname) || empty($email) || empty($batch) || empty($age) || empty($dob)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Incomplete data"]);
        return;
    }

    // Check if email is already registered
    $sql = "SELECT * FROM trainee WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        // Perform registration using prepared statement
        $query = "INSERT INTO trainee (fname, lname, email, batch, age, dob) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $batch, $age, $dob);

        if (mysqli_stmt_execute($stmt)) {
            http_response_code(201); // Created
            echo json_encode(["message" => "Registration successful"]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["error" => "Failed to register"]);
        }

        mysqli_stmt_close($stmt);
    } else {
        http_response_code(409); // Conflict
        echo json_encode(["error" => "User already registered"]);
    }
}
?>
