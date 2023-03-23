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

    $search = $_POST['search'];

    $sql = "SELECT * FROM product WHERE NAME = '$search';";


    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <title>Document</title>
            </head>
            
            <body class="page">
              <main class="main page__main">
                <form class="card-form" action="search.php" method="POST">
                  <div class="card-form__main-content">
                    <h2 class="card-form__title">Info</h2>
                    <p class="card-form__desc">Here are the info you need.</p>
            ';
            echo "ID: " . $row["ID"]. "<br>"." - Name: " . $row["NAME"]. "<br>"." - Weight: " . $row["WEIGHT"]. "<br>"." - Expiry Date: " . $row["EXP"]. "<br>"." - Quantity: " . $row["QUANTITY"]. "<br>";

            echo '

            </div>
            </form>
            </main>
        </body>
        
        
        </html>
            ';
        }
    } else {
        echo "0 results";
    }



