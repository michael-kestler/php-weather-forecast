<?php
if($_POST["city"]){//have to grab input from the page
    $cityCode = file_get_contents("https://www.weather-forecast.com/locations/" . $_POST["city"] . "/forecasts/latest");
    $cityCode = str_replace("<", "<>", $cityCode);

    $splitCityCode = explode("<", $cityCode);

    $openingTag = array_search('Weather Today</h2> (1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">', $splitCityCode, true);

    $closingTag = array_search('/span', $splitCityCode, true);

    $i = $openingTag;
    $total = "";
    while($i < $closingTag) {
        $total = $total . $splitCityCode[$i];
        $i = $i + 1;
    }
   
}

$final = substr($total, 5);
    echo $final;

//obtain 3 day forecast data from weather-forecast.com
//need to get 3 day forecast for city based on user input
//need validation and error message for city cannot be found
//use explode function to create an array from data in string format and then access that data


?>

<!DOCTYPE html>
<!-- create html page with an input  and submit button -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    html {
            background: url('sunset.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    body {
        background: none;
    }
    
    .container {
        text-align: center;
        margin-top: 100px;
        width: 450px;
    }

    input {
        margin: 40px 0;
    }
    </style>
    <title>Weather Scraper</title>
</head>
<body>
    <div class="container">
            <h1>What's The Weather?</h1>
            <form method="post">
                <fieldset class="form-group">
                    <label for="city">Enter the name of a city.</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="E.g., Paris, Madrid">
                </fieldset>
                <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>