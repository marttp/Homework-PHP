<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>HW02</title>
</head>
    <?php
$asiaCountries = array("Afghanistan",
    "Armenia",
    "Azerbaijan",
    "Bahrain",
    "Bangladesh",
    "Bhutan",
    "Brunei",
    "Cambodia",
    "China",
    "Georgia",
    "Hong Kong",
    "India",
    "Indonesia",
    "Iran",
    "Iraq",
    "Israel",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kuwait",
    "Kyrgyzstan",
    "Laos",
    "Lebanon",
    "Macau",
    "Malaysia",
    "Maldives",
    "Mongolia",
    "Myanmar",
    "Nepal",
    "North Korea",
    "Oman",
    "Pakistan",
    "Philippines",
    "Qatar",
    "Saudi Arabia",
    "Singapore",
    "South Korea",
    "Sri Lanka",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Thailand",
    "Timor-Leste",
    "Turkmenistan",
    "United Arab Emirates",
    "Uzbekistan",
    "Vietnam",
    "Yemen",
);
?>

<body>
    <div class="container-fluid" style="margin-top: 3rem;">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <form action="./HW02.php" method="POST">
                            <div class="form-group">
                            <label for="news">Insert news</label>
                                <textarea class="form-control" name="news" id="news" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Find country</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <?php
// * When this php file create a _POST. Then next step
if ($_POST) {

    // ! 1.Split word by space from $_POST['news']
    $textNewSplit = explode(" ", $_POST['news']);
    $asiaCountryInNews = array();

    // ! 2. Use for-loop for check all word in textNewSplit array
    for ($i = 0; $i < sizeof($textNewSplit); $i++) {

        // ? Normal case
        if (in_array($textNewSplit[$i], $asiaCountries)) {
            array_push($asiaCountryInNews, $textNewSplit[$i]);
        }

        // ? Korea case
        if ($textNewSplit[$i] == "Korea") {
            if (($textNewSplit[$i] == "Korea" && $textNewSplit[$i - 1] == "South")) {
                $test = "South Korea";
                array_push($asiaCountryInNews, $test);
            } else if (($textNewSplit[$i]) == "Korea" && $textNewSplit[$i - 1] == "North") {
                $test = "North Korea";
                array_push($asiaCountryInNews, $test);
            }
        }

        // ? Saudi Arabia case
        if ($textNewSplit[$i] == "Arabia") {
            if ($textNewSplit[$i - 1] == "Saudi") {
                array_push($asiaCountryInNews, "Saudi Arabia");
            }

        }
        // ? Sri Lanka case
        if ($textNewSplit[$i] == "Lanka") {
            if ($textNewSplit[$i - 1] == "Sri") {
                array_push($asiaCountryInNews, "Sri Lanka");
            }
        }

    }
    echo "<br>";

    // ! 3. Clear redundant data to unique array -> natural order listCountryUnique
    $listCountryUnique = array_unique($asiaCountryInNews);
    natcasesort($listCountryUnique);

    // ! 4. Use foreach to iterate all of element in listCountryUnique to show to screen
    foreach ($listCountryUnique as $key => $value) {
        echo ("<div class=\"card\">
                <div class=\"card-body\">
                    $key -> $value
                </div>
            </div>");
    }

}

?>

                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>