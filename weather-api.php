<?php
if (isset($_GET['location'])) {
    $location = urlencode($_GET['location']);
    $apiKey = '247a41c43e78c3ad015611d8eddc722c'; // Replace with your actual OpenWeatherMap API key

    // OpenWeatherMap API endpoint
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$location&appid=$apiKey&units=metric";

    // Get the response
    $response = file_get_contents($url);

    if ($response !== false) {
        header('Content-Type: application/json');
        echo $response;
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Unable to fetch weather data']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'No location provided']);
}
?>
