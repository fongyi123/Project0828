<?php    
    if (isset($_POST['btn'])){
      $_SESSION["id"] = $_POST['city'];
    }
    //未來兩天天氣預報 
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=".urlencode($_POST["city"])."&elementName=WeatherDescription&sort=time";
   
    $data = file_get_contents($url);  // PHP get data from url
    $json1 = json_decode($data, true);  // Decode json data
    // var_dump($json1);
    
    $locations = $json1['records']['locations'];
    $datasetDescription = $json1['records']['locations'][0]['datasetDescription'];
    $location = $json1['records']['locations'][0]['location'];
    $locationName = $json1['records']['locations'][0]['location'][0]['locationName'];
    $elementName = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName'];
    $description = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['description'];
    $startTime = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime'];
    $endTime = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime'];
    $value = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value'];
    
    foreach($locations as $one)
      {
           echo "<br>".$one['datasetDescription'] . "<br>";
  
           foreach($location as $two)
           {
                echo "<br>".$two['locationName'] . "<br>";
  
                foreach($location[0]['weatherElement'] as $three)
                {
  
                    echo "<br>".$three['elementName'] . "<br>";
  
                    foreach($location[0]['weatherElement'] as $four)
                    {
  
                        echo "<br>".$four['description'] . "<br>";
  
                        foreach($location[0]['weatherElement'][0]['time'] as $five)
                        {
  
                            echo "<br>".$five['startTime'] ."<br>";
                            echo "<br>".$five['endTime'] ."<br>";
                         
                            foreach($location[0]['weatherElement'][0]['time'][0]['elementValue'] as $seven)
                            {
  
                                echo "<br>".$seven['value'] . "<br>";
                                // $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
                                
                            }
                              
                        }
  
                    }
  
                }
           }
      }  
   /*insert in db but you will have big quantity of queryes*/
                
  //   $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
  //   mysqli_query($link,$sql);
  //   mysqli_select_db($link, "OPENDATA");

    //  結束連線
    // mysqli_close($link);
   
?>