<?php 

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    
    function connectToDatabase(){
        global $servername, $db_username, $db_password;
        // Create connection
        $conn = @mysqli_connect($servername, $db_username, $db_password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "CREATE DATABASE myDatabase";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo mysqli_connect_error() . "<hr>";
            }
            return $conn;
        }
    }


    function saveDataToDB($person, $loginData, $more, $conn){

        global $servername, $db_username, $db_password;

        $conn = @mysqli_connect($servername, $db_username, $db_password, "myDatabase") or die(mysqli_connect_error() . "</body></html>");

        $sql = "CREATE TABLE Users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(100) NOT NULL,
            lastname VARCHAR(100) NOT NULL,
            gender VARCHAR(10),
            dob TIMESTAMP,
            address VARCHAR(500),
            phoneNumber VARCHAR(10),
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            described VARCHAR(500),
            resume VARCHAR(1000)
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table Users created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $sql = "INSERT INTO Users (firstname, lastname, gender, dob, address, phoneNumber, username, password, email, described, resume)
        VALUES (\"$person[0]\", \"$person[1]\", \"$person[2]\", \"$person[3]\", \"$person[4]\", \"$person[5]\", \"$loginData[0]\", \"$loginData[1]\", \"$loginData[2]\", \"$more[0]\", \"$more[1]\")";
        $r = mysqli_query($conn, $sql);

        if(!$r) { 
            echo "<br>Add user error <br>";
            mysqli_close($conn);
            return false;
        } else { 
            echo "<br>Add user completed <br>";
            mysqli_close($conn);
            return true;
        }

    }

    function fetchAllUserData(){

        global $servername, $db_username, $db_password;
        $conn = @mysqli_connect($servername, $db_username, $db_password, "myDatabase") or die(mysqli_connect_error() . "</body></html>");

        $sql = "SELECT id,firstname, lastname, gender, dob, email FROM Users";
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result);
        // mysqli_close($conn);

        return array($result, $conn);
    }

?>