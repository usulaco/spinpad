<?php

include_once "org_netbeans_saas/RestConnection.php";
include_once "WeatherBugWeatherReportServiceAuthenticator.php";

class WeatherBugWeatherReportService {

    public function WeatherBugWeatherReportService() {
        
    }

    /*
      @param searchString resource URI parameter
      @return an instance of RestResponse */

    public static function getLocationsXML($searchString) {
        $apiKey = WeatherBugWeatherReportServiceAuthenticator::getApiKey();
        $pathParams = array();
        $queryParams = array();
        $queryParams["ACode"] = $apiKey;
        $queryParams["SearchString"] = $searchString;

        $conn = new RestConnection("http://api.wxbug.net/getLocationsXML.aspx", $pathParams, $queryParams);

        sleep(1);
        return $conn->get();
    }

}

?>
