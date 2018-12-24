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
            $sql = "CREATE DATABASE IF NOT EXISTS myDatabase";
            if ($conn->query($sql) === TRUE) {
                echo "<br>Database created successfully";
            } else {
                echo mysqli_connect_error() . "<hr>";
            }
            return $conn;
        }
    }


    function saveDataToDB($person, $loginData, $more, $isWebDev, $conn){

        global $servername, $db_username, $db_password;

        $conn = @mysqli_connect($servername, $db_username, $db_password, "myDatabase") or die(mysqli_connect_error() . "</body></html>");

        $sql = "CREATE TABLE IF NOT EXISTS Users (
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
            is_web_dev VARCHAR(5),
            register_date TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            echo "<br>Table Users created successfully";
        } else {
            echo "<br>Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS Files(
			file_id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
			file_name VARCHAR(160) UNIQUE, 
			file_type VARCHAR(100),
            file_content BLOB)";
        mysqli_query($conn, $sql);

        $nowDate = date("m-d-Y H:i:s");

        $sql = "INSERT INTO Users (firstname, lastname, gender, dob, address, phoneNumber, username, password, email, described, is_web_dev, register_date)
        VALUES (\"$person[0]\", \"$person[1]\", \"$person[2]\", \"$person[3]\", \"$person[4]\", \"$person[5]\", \"$loginData[0]\", \"$loginData[1]\", \"$loginData[2]\", \"$more[0]\", \"$isWebDev\",\"$nowDate\")";
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

    function uploadPhoto($inputFile){

        global $servername, $db_username, $db_password;
        $conn = @mysqli_connect($servername, $db_username, $db_password, "myDatabase") or die(mysqli_connect_error() . "</body></html>");

        if($inputFile['file']['error'] != 0) {
            echo "File Uploaded Error!";
        } else {
            $file = $inputFile['file']['tmp_name'];
            $content = addslashes(file_get_contents($file));
            $name = $inputFile['file']['name'];
            $type = $inputFile['file']['type'];
    
            $sql = "INSERT INTO files(file_name, file_type, file_content) VALUES (\"$name\", \"$type\", \"$content\")";
    
            $r = mysqli_query($conn, $sql);

            mysqli_close($conn);
            return $r;

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