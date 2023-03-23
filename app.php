<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // echo "hello";

    $name = $_POST['fullname'];
    $weight = $_POST['weight'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];

    echo "$name $weight $date $quantity";
    
    // // Insert data into table
    $sql = "INSERT INTO product (NAME, WEIGHT, EXP, QUANTITY) 
    VALUES ('$name', '$weight', '$date', '$quantity')";

    if ($conn->query($sql) === TRUE) {
    header("Location: res.html");
    exit;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


