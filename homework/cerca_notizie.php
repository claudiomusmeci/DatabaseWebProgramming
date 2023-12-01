<?php
    $API_KEY="b240070143224ec2bdea1641575f640b";
    $endpoint="https://newsapi.org/v2/everything?q=fashion&language=it&apiKey=";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $endpoint.$API_KEY);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;
?>