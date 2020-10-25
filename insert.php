<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            //getting the values from the insert page
            $name = $_POST["Name"];
            $roll = $_POST["Roll"];
            $cgpa = $_POST["CGPA"];
            // $year = $_POST["year"];
            //passing the connecion parameter
            $server = "mysql-db-server1.mysql.database.azure.com";
            $username = "Rishiadmin@mysql-db-server1";
            $password = "(windows)->host-web12";
            $database = "studentrecord";
            //checking the connection
            $conn = new mysqli($server, $username, $password, $database);
            if($conn->connect_error === TRUE) {
                echo "Connection to database failed" . "<br>";
            }
            else {
                // echo "Connected to the database-server and the database" . "<br>";
                //entering the value into the database
                $sql_query = "insert into students (Roll, Name, CGPA) values('$roll', '$name', '$cgpa')";
                //checking the query
                if($conn->query($sql_query) === TRUE) {
                    echo "Data inserted successfuly!";
                }
                else {
                    echo "Failed to insert data!!";
                }
            }
        ?>
    </body>
</html>