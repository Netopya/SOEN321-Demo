<?php

    include 'dbconfig.php';
    
    header('Access-Control-Allow-Origin: *');

    $fingerPrint = $_REQUEST["fingerprint"];
    $key = $_REQUEST["key"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM Prints WHERE fingerprint=? AND partnerkey=?");
    $stmt->bind_param("ss", $fingerPrint, $key);    
    $stmt->execute();

    $stmt->bind_result($id, $fingerPrint, $key, $value, $timestamp);

    $results = array();
    
    while ($stmt->fetch()) {
        array_push($results, array("value" => $value));
    }
    
    echo(json_encode($results));
?>