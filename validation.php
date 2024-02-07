<?php

$name =  $_POST['name'];
$date =  $_POST['date'];

if(!$name) {
  $errors[] = 'Event name is required';
}

if(!$date) {
  $errors[] = 'Event date is required';
}