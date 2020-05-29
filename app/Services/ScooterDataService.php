<?php

namespace App\Services;

use GuzzleHttp\Client;

// Mini Api Service for pushNotification
// This is the service
class ScooterDataService {
  private $http;
  private $url;
  private $headers;

  // Constructor that intializes Guzzle Client, points to the correct url at Google,
  // and sets the correct request headers
  public function __construct() {
    $this->http = new Client();
    $this->url = 'https://data.lime.bike/api/partners/v1/gbfs/calgary/free_bike_status.json';
    $this->headers = [
      'Content-Type' => 'application/json'
    ];
  }

  // Method that performs the post request
  public function requestStatusOfScooters() {
    $request = $this->http->get($this->url, [
      'headers' => $this->headers
    ]);
    $response = $request ? $request->getBody()->getContents() : null;
    $status = $request ? $request->getStatusCode() : 500;
    if ($response && $status === 200 && $response !== 'null') {
      $pivot_number = 150;
      $json_array  = json_decode($response, true);
      $bikes_array = $json_array["data"]["bikes"];
      dd($bikes_array);
      /*
      The numbers are the length of the bikes_array in other words the number of
      available scooters/bikes. The number left of the arrow is the number of the bikes
      given from the directly previous request and the number on the right is how much
      we currently have.
      Sample Case:
      150 --> 148   Accumulator: 2+
      148 --> 147                1+
      147 --> 150                5+
      150 --> 145                3+
      145 --> 142                1+
      142 --> 144
      144 --> 146
      146 --> 145                Total uses/rides today: (2+1+5+3+1) = 12
      */

    }
    return null;
  }
}
