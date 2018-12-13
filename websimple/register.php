<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles.css">

    <title>Register - Mart's Website</title>
</head>
<?php 
    $isValidForm = false;
    $msg = "";
    $err = "";
?>
<body>
<?php 
                                if($_POST){
                                    if($_POST['person'][0]) {
                                        $firstName = $_POST['person'][0];
                                        $msg .= "<b>Firstname:</b> $firstName";
                                    } else {
                                        $err .= "<li>Empty firstname</li>";
                                    }

                                    if($_POST['person'][1]) {
                                        $lastName = $_POST['person'][1];
                                        $msg .= "<br><b>Lastname:</b> $lastName";
                                    } else {
                                        $err .= "<li>Empty lastname</li>";
                                    }

                                    if($_POST['person'][2]) {
                                        $gender = $_POST['person'][2];
                                        $msg .= "<br><b>Gender:</b> $gender";
                                    } else {
                                        $err .= "<li>Select gender</li>";
                                    }

                                    if($_POST['person'][3]) {
                                        $dob = $_POST['person'][3];
                                        $msg .= "<br><b>Date of Birth:</b> $dob";
                                    } else {
                                        $err .= "<li>Select date of birth</li>";
                                    }

                                    if($_POST['person'][4]) {
                                        $address = $_POST['person'][4];
                                        $msg .= "<br><b>Address:</b> $address";
                                    } else {
                                        $err .= "<li>Empty address</li>";
                                    }

                                    if($_POST['person'][5]) {
                                        $phoneNumber = $_POST['person'][5];
                                        $msg .= "<br><b>Phone number:</b> $phoneNumber";
                                    } else {
                                        $err .= "<li>Empty phone number</li>";
                                    }

                                    if($_POST['loginData'][0]) {
                                        $username = $_POST['loginData'][0];
                                        $msg .= "<br><b>Username:</b> $username";
                                    } else {
                                        $err .= "<li>Empty username</li>";
                                    }

                                    if($_POST['loginData'][1]) {
                                        $password = $_POST['loginData'][1];
                                    } else {
                                        $err .= "<li>Empty password</li>";
                                    }

                                    if($_POST['loginData'][2]) {
                                        $recheckPassword = $_POST['loginData'][2];
                                    } else {
                                        $err .= "<li>Empty checked password</li>";
                                        if($_POST['loginData'][1] && $_POST['loginData'][2]){
                                            $real = $_POST['loginData'][1];
                                            $check = $_POST['loginData'][2];
                                            if(strtolower($real) != strtolower($check)){
                                                $err .= "<li>Rechecked password not match</li>";
                                            }
                                        }
                                    }

                                    if($_POST['loginData'][3]) {
                                        $email = $_POST['loginData'][3];
                                        $msg .= "<br><b>Email:</b> $email";
                                    } else {
                                        $err .= "<li>Empty email</li>";
                                    }

                                    if($_POST['more'][0]) {
                                        $described = $_POST['more'][0];
                                        $msg .= "<br><b>Description:</b> $described";
                                    } else {
                                        $err .= "<li>Empty Description</li>";
                                    }

                                    if($_POST['more'][1]) {
                                        $resume = $_POST['more'][1];
                                        $msg .= "<br><b>Resume:</b> $resume";
                                    } else {
                                        $err .= "<li>Empty resume</li>";
                                    }

                                    if($err == "") {
                                        $isValidForm = true;
                                    }
                                    
                                }
                            ?>
<?php include "./header.html"?>
    <div class="container is-fluid">
        <div class="columns">
            <div class="column"></div>
            <div class="column is-three-quarters form-input card">
                <div class="box-form">
                    <h2 class="title is-2" style="text-align: center;">Register form</h2>
                    <?php 
                        if(!$isValidForm){
                            if($_POST){
                                echo("<article class=\"message is-danger\" id=\"error-notification\">");
                                echo("<div class=\"message-body\">");
                                echo '<div><b>Something wrong!</b>' . $err . '</div>';
                                echo("</div>");
                                echo("</article>");
                            }
                        } else {
                            echo("<article class=\"message is-success\" id=\"error-notification\">");
                            echo("<div class=\"message-body\">");
                            echo "<h4>Your Input data:</h4>$msg";
                            include("./registerDB.php");
                            $conn = connectToDatabase();
                            $isSuccess = saveDataToDB($_POST['person'], $_POST['loginData'], $_POST['more'], $conn);
                            if($isSuccess){
                                echo "<h5>Your data already add to database</h5>";
                            } else {
                                echo "<h5>Something error. Please try again</h5>";
                            }
                            echo("</div>");
                            echo("</article>");
                        }
                    ?>
                    <h5 class="title is-5">Personal information</h5>
                    <form action="" method="post">
                        <div class="columns">
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Firstname</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Firstname" maxlength="100" name="person[]">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Lastname</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Lastname" maxlength="100" name="person[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-one-third">
                                <div class="field">
                                    <label class="label">Gender</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="person[]">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-one-third">
                                <div class="field">
                                    <label class="label">Date of Birth</label>
                                    <div class="control">
                                        <input class="input" type="date" placeholder="Date of Birth" name="person[]">
                                    </div>
                                </div>                           
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Home address..." name="person[]"></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Phone number</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Phonenumber" maxlength="10" name="person[]" 
                                    pattern="08([0-9]{8})" title="Input your correct phone number e.g. 08XXXXXXXX">
                            </div>
                        </div>

                        <hr>
                        
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="text" placeholder="Username" value="" maxlength="100" name="loginData[]">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <div class="columns">
                                <div class="column is-four-fifths">
                                    <div class="control has-icons-left has-icons-right">
                                        <input id="inputPassword" class="input" type="password" placeholder="Password" title="Minimum eight characters,least one uppercase letter, one lowercase letter and one number"
                                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" name="loginData[]">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-unlock-alt"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="column">
                                    <button id="show_password" class="button is-primary" type="button">
                                        <span>Show</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Repeat-Password</label>
                            <div class="columns">
                                <div class="column is-four-fifths">
                                    <div class="control has-icons-left has-icons-right">
                                        <input id="confirmPassword" class="input" type="password" placeholder="Rechecked password" title="Minimum eight characters,least one uppercase letter, one lowercase letter and one number"
                                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" name="loginData[]">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-unlock-alt"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="column">
                                    <button id="show_confirm_password" class="button is-primary" type="button">
                                        <span>Show</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="Email input" name="loginData[]">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <hr>
                        <h5 class="title is-5">More information</h5>

                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Description..." name="more[]"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <div class="file is-boxed">
                                <label class="file-label">
                                    <label class="label">Resume</label>
                                    <input class="file-input" type="file" name="more[]">
                                    <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Choose a file…
                                    </span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="agreeTerm" id="agreeTerm">
                                    I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-primary btn-long" id="submit">Submit</button>
                            </div>
                            <div class="control">
                                <button type="reset" class="button is-warning btn-long">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
    
<?php include "./footer.html"?>
<script>
    // $("#error-notification").hide();
    $("#submit").prop('disabled', true);

    $(document).ready(function () {

        $("#submit").click(function (event) {
            if($("#agreeTerm").is(":checked")){
                $("#error-notification").show();
            }
        })

        $("#show_password").click(function(){
            if ($("#inputPassword").attr("type") == "password") {
              $("#inputPassword").attr("type", "text");
            } else {
              $("#inputPassword").attr("type", "password");
            }
          }
        );

        $("#show_confirm_password").click(function(){
            if ($("#confirmPassword").attr("type") == "password") {
              $("#confirmPassword").attr("type", "text");
            } else {
              $("#confirmPassword").attr("type", "password");
            }
          }
        );

        $("#agreeTerm").click(function(){
            if($("#agreeTerm").is(":checked")){
                $("#submit").prop('disabled', false);
            } else {
                $("#submit").prop('disabled', true);
            }
        })
    })
</script>
</body>

</html>