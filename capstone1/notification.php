<?php
$notifications = [
    "Notification 1: huhu",
    "Notification 2: hoho",
    "Notification 3: hihi",
    "Notification 4: hehe",
    "Notification 5: haha"
];

$randomIndex = array_rand($notifications);
echo $notifications[$randomIndex];
?>