<!DOCTYPE html>
<html>
<head>
    <title>Weather Information</title>
</head>
<body>
<h1>Current Weather</h1>
<p>Date Generated: {{ $weatherData['dateGenerated'] }}</p>
<p>Status: {{ $weatherData['status'] }}</p>

@if ($weatherData['status'] === 'OK')
    @php
        $temperatureData = $weatherData['data'][0]['coordinates'][0]['dates'][0];
    @endphp
    <h2>Temperature Information</h2>
    <h1> Date: {{$temperatureData['date']}}</h1>
    <h1> Temperature: {{$temperatureData['value']}}</h1>
@else
    <p>Error: {{ $weatherData['status'] }}</p>
@endif
</body>
</html>
