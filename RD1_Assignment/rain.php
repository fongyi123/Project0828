<?php
require_once("connDB.php");
    if (isset($_POST['btn'])){
      $_SESSION["id"] = $_POST['city'];
    }
    
    
    //累積雨量
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&elementName=HOUR_24&parameterName=CITY";

    $data = file_get_contents($url);  // PHP get data from url
    $json4 = json_decode($data, true);  // Decode json data
    // var_dump($json4);
    $location = $json4['records']['location'];
    $locationName = $json4['records']['location'][0]['locationName'];
    $obsTime = $json4['records']['location'][0]['time']['obsTime'];
    $elementName = $json4['records']['location'][0]['weatherElement'][0]['elementName'];
    $elementValue = $json4['records']['location'][0]['weatherElement'][0]['elementValue'];
    $parameterName = $json4['records']['location'][0]['parameter'][0]['parameterName'];
    $parameterValue = $json4['records']['location'][0]['parameter'][0]['parameterValue'];

    // var_dump($parameterValue);
    echo "<br>累積雨量<br>";
    // echo "<br>".$elementName . "<br>";

          foreach($location as $two)
          {
                echo "<br>".$two['locationName'] . "<br>";
                echo "<br>".$two['time']['obsTime'] . "<br>";   

                foreach($location[0]['weatherElement'] as $three)
                {
  
                    echo "<br>".$three['elementName'] . "<br>";   
                    echo "<br>".$three['elementValue'] . "<br>";

                }
                foreach($location[0]['parameter'] as $three)
                {
  
                    echo "<br>".$three['parameterName'] . "<br>";   
                    

                }
                foreach($location[0]['parameter'] as $three)
                {
  
                    echo "<br>".$three['parameterValue'] . "<br>";   
                    

                }
      }

    // $records = $json['records'];
    
      
   /*insert in db but you will have big quantity of queryes*/
                
    // $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
    
    
    
    
?>