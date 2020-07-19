<?php
session_start();
include('connection.php');

// sender details using session var
$senderid = $_SESSION['senderid'];
$sendercredit = $_SESSION['sendercredit'];
$sendername = $_SESSION['sendername'];

$amount = $_POST['amount'];
$receiver = $_POST['receiver'];

if ($amount > $sendercredit) {
    echo "You do not have Enough Credits";
    exit;
}
if (strtolower($sendername) == strtolower($receiver)) {
    echo "Both persons are same";
    exit;
}
if ($amount < 1) {
    echo "Enter an valid credits";
    exit;
}

// changes in users table
$totalcredit = $sendercredit - $amount;
$sql = "UPDATE users SET credit='$totalcredit' WHERE id='$senderid'";
// $sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Error in query1" . mysqli_error($link);
    exit;
}
$sql = "UPDATE `users` SET `credit`=credit+$amount WHERE `name`='$receiver'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Error in query2" . mysqli_error($link);
    exit;
}

// changes in transfer table
$sql = "INSERT INTO `transfer` (`id`,`sender`,`receiver`,`credit_transferred`) VALUES ('$senderid','$sendername','$receiver','$amount')";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "Error in query3";
    exit;
}

echo "success";
