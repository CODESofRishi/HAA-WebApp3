<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //getting the roll number value from the home page
    $roll = $_GET["Roll"];
    //the required parameter for mysql server connection
    $server = "mysql-db-server1.mysql.database.azure.com";
    $username = "Rishiadmin@mysql-db-server1";
    $password = "(windows)->host-web12";
    $database = "studentrecord";
    //the server connection function.
    $conn = new mysqli($server, $username, $password, $database);
    if($conn->connect_error === TRUE) {
        echo "Sorry failed to connect to database";
    }
    else {
        echo "Connection stablished" . "<br>";
        //the query to check for roll number in the database.
        $sql_query = "select * from students where Roll = '$roll'";
        $result = $conn->query($sql_query);
        //checking the result of the query
        if($result->num_rows === 0) {
            echo "RollNo., not present in the database go back" . "<br>";
        }
        else if($result->num_rows >= 1) {
        //printing each row having roll value as the input
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row['Name'] . "<br>";
                echo "Roll: " .$row['Roll'] . "<br>.";
                echo "CGPA: " .$row['CGPA'] . "<br>";
                #echo "Year: " .$row['year'] . "<br>";
            }
        }
    }
    ?>
</body>
</html>