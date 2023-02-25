<?php

//obtain 3 day forecast data from weather-forecast.com
//need to get 3 day forecast for city based on user input
//have to grab input from the page
//create html page with an input  and submit button
//need validation and error message for city cannot be found
//use explode function to create an array from data in string format and then access that data


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Weather Scraper</title>
</head>
<body>
<div class="container text-center px-4 py-5 my-5">
        <h1>What's The Weather?</h1>
        <p>Enter the name of a city.</p>
        <form method="post">
            <fieldset class="form-group">
                <!-- <label for="city">Enter the name of a city.</label> -->
                <input type="text" id="city" name="city" class="w-25">
            </fieldset>
            <button type="submit" id="submit" class="btn btn-primary btn-sm px-4 mt-2">Submit</button>
        </form>
</div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>