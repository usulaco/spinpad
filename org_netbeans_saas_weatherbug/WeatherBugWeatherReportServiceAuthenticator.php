<?php

include("WeatherBugWeatherReportServiceAuthenticatorProfile.php");

class WeatherBugWeatherReportServiceAuthenticator {

    public static function getApiKey() {
        $apiKey = WeatherBugWeatherReportServiceAuthenticatorProfile::getApiKey();
        if ($apiKey == null || $apiKey == "") {
            throw new Exception("Please specify your api key in the apikey.php file.");
        }
        return $apiKey;
    }

}

?>
