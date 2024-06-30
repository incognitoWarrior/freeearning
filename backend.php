<?php
// Get the posted data
$postData = file_get_contents('php://input');
$data = json_decode($postData);

if ($data) {
    $username = $data->username;
    $referral = $data->referral;
    $amount = $data->amount;
    $timestamp = $data->timestamp;

    // Format the log entry
    $logEntry = "User: $username, Referral: $referral, Amount: $amount, Timestamp: $timestamp" . PHP_EOL;

    // Append to the log file
    $logFile = 'payments.log';
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);

    echo 'Payment logged successfully.';
} else {
    echo 'Invalid data received.';
}
?>
