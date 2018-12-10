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
/*
- เรียงค่าน้อยไปมาก
- เรียงค่ามากไปน้อย
-แยกประเทศที่อยู่ในแถบทวีปเอเชีย
-แยกประเทศที่ไม่ได้อยู่ในแถบทวีปเอเชีย
 */
$asiaCountries = array("Afghanistan",
    "Armenia",
    "Azerbaijan",
    "Bahrain",
    "Bangladesh",
    "Bhutan",
    "Brunei",
    "Cambodia",
    "China",
    "Cyprus",
    "Georgia",
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
    "Malaysia",
    "Maldives",
    "Mongolia",
    "Myanmar",
    "Nepal",
    "North Korea",
    "Oman",
    "Pakistan",
    "Palestine",
    "Philippines",
    "Qatar",
    "Russia",
    "Saudi Arabia",
    "Singapore",
    "South Korea",
    "Sri Lanka",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Thailand",
    "Timor-Leste",
    "Turkey",
    "Turkmenistan",
    "United Arab Emirates",
    "Uzbekistan",
    "Vietnam",
    "Yemen",
);

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

$otherCountries = array();

foreach ($countries as $country) {
    if (!in_array($country, $asiaCountries)) {
        array_push($otherCountries, $country);
    }
}


// ! Explode special puncuation
function multiexplode($delimiters, $string)
{
    // * 1. replace first array of delimiters to all element array in text
    $ready = str_replace($delimiters, $delimiters[0], $string);
    // * 2. then explode with first element before
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

// ! Find country function
function findCountriesInNew($textNewSplit, $listNation)
{
    $asiaCountryInNews = array();
    $otherCountryInNews = array();
    for ($i = 0; $i < sizeof($textNewSplit); $i++) {
        // ? Normal case
        if (in_array($textNewSplit[$i], $listNation[0])) {
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
        // ? Sri Lanka case
        if ($textNewSplit[$i] == "Emirates") {
            if ($textNewSplit[$i - 1] == "Arab") {
                array_push($asiaCountryInNews, "United Arab Emirates");
            }
        }

        if (in_array($textNewSplit[$i], $listNation[1])) {
            array_push($otherCountryInNews, $textNewSplit[$i]);
        }

    }
    return array($asiaCountryInNews, $otherCountryInNews);
}

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
    $textNewSplit = multiexplode(array(" ", "'", ",", ".", ")", "(", '"'), $_POST['news']);
    $asiaCountryInNews = findCountriesInNew($textNewSplit, array($asiaCountries, $otherCountries))[0];
    $otherCountryInNews = array_unique(findCountriesInNew($textNewSplit, array($asiaCountries, $otherCountries))[1]);

    echo "<br>";
    echo ("
    <br>
        <div class=\"alert alert-success\" role=\"alert\">
        ASC
        </div>
    <hr>");

    // ! 3. Clear redundant data to unique array -> natural order listCountryUnique
    $listCountryUnique = array_unique($asiaCountryInNews);
    natcasesort($listCountryUnique);

    // ! 4. Use foreach to iterate all of element in listCountryUnique to show to screen
    foreach ($listCountryUnique as $value) {
        echo ("<div class=\"card\">
                <div class=\"card-body\">
                    $value
                </div>
            </div>");
    }

    echo "<br>";
    echo ("
    <br>
        <div class=\"alert alert-warning\" role=\"alert\">
        DESC
        </div>
    <hr>");

    $listCountryUniqueReverse = array_reverse($listCountryUnique);
    foreach ($listCountryUniqueReverse as $value) {
        echo ("<div class=\"card\">
                <div class=\"card-body\">
                    $value
                </div>
            </div>");
    }

    echo "<br>";
    echo ("
    <br>
        <div class=\"alert alert-danger\" role=\"alert\">
        Not Asia
        </div>
    <hr>");
    foreach ($otherCountryInNews as $value) {
        echo ("<div class=\"card\">
                <div class=\"card-body\">
                    $value
                </div>
            </div>");
    }
    echo "<br>";
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