<?php
include "../admin/PhpFunctions/connection.php";
$otp = $_POST['otp'];
$email = $_COOKIE['email'];

if (isset($email) && strlen($email) > 3) {
    $stmt = $connection->prepare("SELECT * FROM `wait-list` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $connection->prepare("SELECT * FROM `wait-list` WHERE email = ? AND otp = ?");
        $stmt->bind_param("ss", $email, $otp);
        $stmt->execute();
        $otpResult = $stmt->get_result();

        if ($otpResult->num_rows > 0) {
            $user = $otpResult->fetch_assoc();
            $userName = $user['username'];
            $gender = $user['gender'];
            $email = $user['email'];
            $password = $user['password'];

            $insert = "INSERT INTO users (username, gender, email, password, permission, beforeblocked) VALUES (?, ?, ?, ?, '3', '3')";
            $stmt = $connection->prepare($insert);
            $stmt->bind_param("ssss", $userName, $gender, $email, $password);
            $stmt->execute();

            $selectUser = $connection->query("SELECT * FROM users WHERE email = '$email'");
            $newUser = $selectUser->fetch_assoc();
            $id = $newUser['id'];
            setcookie("email","", time() - 1 ,"/");
            setcookie("userid", $id, strtotime("+1 day"), "/");

            $stmt = $connection->prepare("DELETE FROM `wait-list` WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $response = array("status" => "success", "message" => "Your email is verified");
        } else {
            $response = array("status" => "error", "message" => "Incorrect OTP");
        }
    } else {
        $response = array("status" => "error2", "message" => "Email not found");
    }
} else {
    $response = array("status" => "error2", "message" => "Invalid email address");
}

echo json_encode($response);
die();
?>
