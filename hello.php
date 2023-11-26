<?php
$today = date("Y/m/d");
$last = date("2023/11/20");
echo "The difference between the two dates is " . floor((strtotime($today) - strtotime($last)) / (60 * 60 * 24)) . " days.";
