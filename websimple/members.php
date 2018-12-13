<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>Members - Mart's Website</title>
</head>

<body>
<?php include "./header.html"; ?>
<?php
    include("./registerDB.php");
    $results = fetchAllUserData();
?>
    <div class="container is-fluid" style="height: 800px;">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-three-quarters">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <?php 
                        while ($data = mysqli_fetch_array($results[0])) {
                            echo "<tr>";
                            echo ("<td>".$data['id']."</td>");
                            echo ("<td>".$data['firstname']." ".$data['lastname']."</td>");
                            echo ("<td>".$data['gender']."</td>");
                            echo ("<td>".$data['dob']."</td>");
                            echo ("<td>".$data['email']."</td>");
                            echo "</tr>";
                        }
                        mysqli_close($results[1]);
                    ?>
                </table>
            </div>
            <div class="column"></div>
        </div>
    </div>

<?php include "./footer.html"; ?>
</body>

</html>