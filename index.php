<?php
    $weather = "";
    $error = "";

if(array_key_exists('city', $_GET)){
    $city = str_replace(" ", "-", $_GET['city']);

    $file_headers = @get_headers("https://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");

    if($file_headers[0] == "HTTP/1.1 404 Not Found") {
        $error = "That city could not be found.";
    }
    else {
        $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/" . $city . "/forecasts/latest");
        
        $pageArray = 
            explode('Weather Today</h2> (1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">',
            $forecastPage);

        if(sizeOf($pageArray) > 1) {
            $secondPageArray = explode('</span></p></td>', $pageArray[1]);
                

        if(sizeOf($secondPageArray) > 1) {
            $weather = $secondPageArray[0];    
        }   
            else {
                $error = "That city could not be found.";
            }
        
        }   
        else {
            $error = "That city could not be found.";
        }
    
        }//end file headers NOT empty

} else {
    $error = "That city could not be found.";
}//end of array key exists test

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
    <!-- CSS -->
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

    #weather {
        margin-top: 15px;
    }
    </style>
    <title>Weather Scraper</title>
</head>
<body>
    <div class="container">
            <h1>What's the Weather?</h1>
            <form method>
                <fieldset class="form-group">
                    <label for="city">Enter the name of a city.</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="E.g., Paris, Madrid"
                    value = "<?php
                        if(array_key_exists('city', $_GET)){
                            echo $_GET['city'];
                        }
                    ?>">
                </fieldset>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </form>

            <div id="weather"> 
                <?php
                    if($weather){
                        echo '<div class="alert alert-success" role="alert">' . $weather . '</div>';
                    }
                    else if($error){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        
                    }    
                ?>    
        </div>
    </div> <!-- end of container class div -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
</body>
</html>