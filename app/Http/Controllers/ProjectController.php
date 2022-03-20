<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Symfony\Component\ErrorHandler\Debug;

class ProjectController extends Controller
{
 public $response2 = '';
 public $afterOneDay = '';
 
    //
    public function getData(Request $request){
        $city1 = "Vilnius";
        $city2 = "Kaunas";
        $city3 = "Klaipeda";
        $city4 = "Taurage";  
        
        $response1 = Http::get("https://api.meteo.lt/v1/places/".$city1."/forecasts/long-term");
        // $response2 = Http::get("https://api.meteo.lt/v1/places/".$city2."/forecasts/long-term");
        // $response3 = Http::get("https://api.meteo.lt/v1/places/".$city3."/forecasts/long-term");
        // $response4 = Http::get("https://api.meteo.lt/v1/places/".$city4."/forecasts/long-term");
      //  return $response1['forecastTimestamps']['0']['airTemperature'];
    //  return $response1['place']['name'];
      
    // $collection = collect($response1->json());
    // $filtered = $collection->whereIn('forecastTimestamps', [1, 2, 3, 4]);
    //       $response_array =[$filtered];
    //$response_array =[$response1];
       
          
        //   return view('index',['response'=>$response_array]);
         //  return view('index',['response'=>$filtered]);
          return view('index',['response1'=>$response1]);
    }

    public function search(Request $request){
      $city =  $request->input('city');
      $response = Http::get("https://api.meteo.lt/v1/places/".$city."/forecasts/long-term");
      //    return $response['weather']['0']['description'];
      $response_array = [$response];
      $filteredItems = $this->filterResponse($response);
      return view('index',['response1'=>$response, 'raktas' =>$filteredItems]);          
    }
    
    public function filterResponse(Response $response){
      date_default_timezone_set('UTC');
      $currentTime = $response['forecastCreationTimeUtc'];
      //$NewDate=date('y:m:d', strtotime('+3 days'));
      $afterThreeDays = date('Y-m-d', strtotime($currentTime. ' + 3 days'));
      $afterTwoDays = date('Y-m-d', strtotime($currentTime. ' + 2 days'));
      $afterOneDay = date('Y-m-d', strtotime($currentTime. ' + 1 days'));
      $sameDay = date('Y-m-d', strtotime($currentTime));

     
      $arr = $response['forecastTimestamps'];
      $firstDayArray = array();
      $secondDayArray = array();
      $thirdDayArray = array();
     // print_r($arr);

      foreach($arr as $element) {
      //  if ((date('Y-m-d', strtotime('Y-m-d',$element['forecastTimeUtc']))) > $afterThreeDays) {
         // Carbon::parse($element['forecastTimeUtc'])->format('Y-m-d')
        //  break;
        //}

    if ((Carbon::createFromFormat('Y-m-d',$element['forecastTimeUtc'])) < ($afterOneDay)){
    
    $firstDayArray[] = $element['conditionCode'];
    //$firstDayArray[] = $element['conditionCode'].' '.$element['forecastTimeUtc'];
    }

    if (((Carbon::createFromFormat('Y-m-d',$element['forecastTimeUtc'])) > ($afterOneDay)) and 
    ((Carbon::createFromFormat('Y-m-d',$element['forecastTimeUtc'])) < ($afterThreeDays)))
    
    $secondDayArray[] = $element['conditionCode'];
    $secondDayArray[] = $element['conditionCode'].' --- '.$element['forecastTimeUtc'];
 
 }

   // {{ $element['conditionCode'] }}
    //{{ $element['forecastTimeUtc'] }}


   // return view('index',['arrejus'=>$firstDayArray]);
   //$afterOneDay = '2';
   $data = date('Y-m-d', strtotime('Y-m-d',$element['forecastTimeUtc']));
   //::info($data);
   session()->put('key', 'value');
   session()->flash('success_message', 'This is a test message');
   return $data;
    }


    public function about(Request $request){
      return view('about');
    }
}

