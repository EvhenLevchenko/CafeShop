<?php

$host     = "localhost";
$port     = 3306;
$socket   = "";
$user     = "root";
$password = "root";
$dbname   = "cms";

$con = new mysqli($host, $user, $password, $cms, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

$query = "SELECT actor_id, first_name, last_name, last_update
          FROM   actor
          WHERE  last_update > ?";
$last_update = '';

$stmt->bind_param('s', $last_update);

if ($stmt = $con->prepare($query)) {

    $stmt->execute();
    $stmt->bind_result($actor_id, $first_name, $last_name, $last_update);

    while ($stmt->fetch()) {
        // printf("%s, %s, %s, %s\n",
        //   $actor_id, $first_name, $last_name, $last_update);
    }

    $stmt->close();
}

?>
