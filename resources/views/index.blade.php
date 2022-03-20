@extends ('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">

<h2 class="text-center" style="color:#ffa751">Awsome Weather App</h2>
    <div class="row mt-5 ms-5">


    <form action="{{ route('search') }}" method="POST">
        @csrf
        <div class="form-group text-center mb-3">
            <input type="text" name="city" class="form-control" style="width: 50%; margin:5px auto" placeholder="Please type a city..." required/>
            <button type="submit" class="btn btn-primary">search</button>
        </div>
    </form>
    <?php 
    $comparsions = 0;
    ?>
    
        <div class="col-lg-4 col-md-4 col-sm-12 text-center mb-3" style="margin: 0 auto;">
            <div class="card" style="width: 25rem; background:#ff9800; margin:0 auto;">
                <!-- <img style="width:50px; margin:5px auto;" src="<?php // echo "http://openweathermap.org/img/wn/". $element['weather']['0']['icon'].".png" ;?>"/> -->
                <div class="card-body" style="color:white">
                <div class="card-title">{{ $response1->status() }}</div>
                
                             <?php 
    

    ?>
             <div class="card-title"></div> 
    <div class="card-title">{{ isset($raktass) ? $raktas : ''}}</div>
     
                        
      
                </div>
            </div>
        </div>
        
        <?php 
    //$arr = json_encode($response1['forecastTimestamps']);
    // print_r($arrejus)
   // echo $arrejus;
   //print_r($raktas);
    ?>


        <br>
        <br>
        
      
    
       

       
   

    




    </div>
</div>

<?php
//echo $sameDay. ' --- ' .$afterOneDay. ' --- ' .$afterTwoDays. ' --- '.$afterThreeDays ;
//echo '<br><br>';
//$arr_freq = array_count_values($firstDayArray);
         
//arsort($arr_freq); //sorrting array. By default it sorts in descending order of values.
//$new_arr = array_keys($arr_freq);
//echo "First most frequent string is:"." ".$new_arr[0];
        //echo '<br><br>';
      // print_r($firstDayArray);

        // echo '<br><br>';
        //  $arr_freq2 = array_count_values($secondDayArray);
         
        //  arsort($arr_freq2);
        //  $new_arr2 = array_keys($arr_freq2);
        //  echo "First most frequent string is:"." ".$new_arr2[1];
           //      echo '<br><br>';
           //       print_r($secondDayArray);
        ?>

@endsection 