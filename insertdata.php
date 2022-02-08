<?php

include_once("connection.php");

if(isset($_POST['name_of_player']) && isset($_POST['country']) && isset($_POST['team']))
{

$name = $_POST['name_of_player'];

$team = $_POST['team'];

$country = $_POST['country'];

$sql = "INSERT INTO users (name_of_player,team,country) VALUES ('$name','$team','$country')";

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


?>