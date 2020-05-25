<?php

namespace App\Services;

use GuzzleHttp\Client;

// Mini Api Service for pushNotification
// This is the service
class GoogleSendService {
  private $http;
  private $url;
  private $headers;

  // Constructor that intializes Guzzle Client, points to the correct url at Google,
  // and sets the correct request headers
  public function __construct() {
    $this->http = new Client();
    $this->url = 'https://fcm.googleapis.com/fcm/send';
    $this->headers = [
      'Content-Type' => 'application/json',
      'Authorization' => 'key=AAAA4o3XhvM:APA91bGu2Gi8HxIUP-mbbWTd2zf1LFIQTDkCRFdofGlOj_X4hbodwXWI-X1iuJMJXz4gTxoYkIEkwpMlWEQ32Z0q24pgvQ29a9boOx9fYkH5srl9W9eWM0JknuPMQebn7lpNdwZy9x1l'
    ];
  }

  // Method that performs the post request
  public function sendPushNotificationPostRequest(array $post_body = []) {
    $request = $this->http->post($this->url, [
      'headers' => $this->headers,
      'json' => $post_body
    ]);
    $response = $request ? $request->getBody()->getContents() : null;
    $status = $request ? $request->getStatusCode() : 500;
    if ($response && $status === 200 && $response !== 'null') {
      return (array) json_decode($response);
    }
    return null;
  }
}
