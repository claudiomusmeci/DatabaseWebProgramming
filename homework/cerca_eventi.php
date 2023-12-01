<?php
    $API_KEY="Ai0JvwYHNKSDaJmIWAvgMQMlYWiEOaRA";
    $endpoint="https://app.ticketmaster.com/discovery/v2/events.json?keyword=fashion%20show&sort=date,asc&apikey=";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint.$API_KEY);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;
?>