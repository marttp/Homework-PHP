<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Show form register</title>
    <style>
        body {
            background-color: wheat
        }

        .body-show-detail {
            margin: 50px 0px;
            border: 3px black solid;
            border-radius: 8px;
            padding: 20px;
            background-color: rgba(227, 247, 183, 0.7);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            display: flex;
            flex-direction: column;
        }

        .profile-box {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 2rem;
            text-align: center;
            border: 3px black solid;
            border-radius: 8px;
            flex: 0.2;
        }

        .box-content {
            flex: 0.2;
        }

        hr {
            border: 2px solid gray;
            margin: 1rem 0px;
        }

    </style>
</head>
<body>
    <div class="contanier">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 body-show-detail">
            <?php 
                error_reporting( error_reporting() & ~E_NOTICE)
            ?>
                <div class="profile-box">
                    <p>Profile</p>
                </div>
                <div class="box-content">
                    <br>
                    <p style="text-decoration-line: underline;">Your profile</p>
                    <?php 
                        if($_POST["firstName"]){
                            $firstName = $_POST["firstName"];
                            echo("Firstname : $firstName");
                        }
                    ?>
                    <br>
                    <?php 
                        if($_POST["lastName"]){
                            $lastName = $_POST["lastName"];
                            echo("Lastname : $lastName");
                        }
                    ?>
                    <br>
                    <?php 
                        if($_POST["gender"]){
                            $gender = $_POST["gender"];
                            echo("Gender : $gender");
                        }
                    ?>
                    <br>
                    <?php 
                        if($_POST["inputEmail"]){
                            $inputEmail = $_POST["inputEmail"];
                            echo("Email : $inputEmail");
                        }
                    ?>
                    <br>
                </div>
                <hr>
                <div class="box-content">
                    <?php 
                        if($_POST["address"] && $_POST["inputCity"] && $_POST["inputState"] && $_POST["inputZip"]){
                            $address = $_POST["address"];
                            $city = $_POST["inputCity"];
                            $state = $_POST["inputState"];
                            $zip = $_POST["inputZip"];
                    ?>
                    <p style="text-decoration-line: underline;">Address</p>
                    <p><?php echo("$address <br>City: $city <br>National: $state <br>Zip Code: $zip") ?></p>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-1"></div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>

