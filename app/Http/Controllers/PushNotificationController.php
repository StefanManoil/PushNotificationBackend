<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Services\GoogleSendService;

class PushNotificationController extends Controller {

    public function sendPushNotification(Request $request) {
      // GoogleSendService $google_send_service_instance, string $device_token = '', string $message_title = '', string $message_body = ''
      $google_send_service_instance = new GoogleSendService();
      $device_token = "dnAJtswkTzyQZfeZOzS4_d:APA91bH-4bdkcgJ58Qnr2LfmuMO6zpsLLGb0j_kLHEKbffsTRGGOwSIoej0uWEDXGd3dJubV2s-ZfhzcxJGGzce_8LcV7Mb2GPkCl3l3HBDXWof3vlauCroFjHS10izNXrEywO7IkKiA";
      $message_title = "This is the title of the message";
      $message_body = "This is the body of the message";
      $post_body = [
                    'to' => $device_token,
                    'data' =>
                      [
                      'title' => $message_title,
                      'body' => $message_body
                      ]
                   ];
      return $google_send_service_instance->sendPushNotificationPostRequest($post_body);
    }
}
