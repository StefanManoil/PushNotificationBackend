<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Services\ScooterDataService;

class ScooterDataController extends Controller {

    public function sendPushNotification(Request $request) {
      $scooter_data_service_instance = new ScooterDataService();
      return $scooter_data_service_instance->requestStatusOfScooters();
    }
}
