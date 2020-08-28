<?php

    if (isset($_POST['btn'])){
      $_SESSION["id"] = $_POST['city'];
    }
        
    //當前天氣預報
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=".urlencode($_POST["city"])."&sort=time";
    


    $data = file_get_contents($url);  // PHP get data from url
    $json3 = json_decode($data, true);  // Decode json data
    $records = $json3['records'];
    $datasetDescription = $json3['records']['datasetDescription'];
    $location = $json3['records']['location'];
    $locationName = $json3['records']['location'][0]['locationName'];
    $elementName = $json3['records']['location'][0]['weatherElement'][0]['elementName'];
    $startTime = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['startTime'];
    $endTime = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['endTime'];
    $parameter = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['parameter']['parameterName'];
    // var_dump($parameter);

           echo "<br>".$datasetDescription . "<br>";
  
           foreach($location as $two)
           {
                echo "<br>".$two['locationName'] . "<br>";
  
                foreach($location[0]['weatherElement'] as $three)
                {
  
                    echo "<br>".$three['elementName'] . "<br>";   
                    echo "<br>".$three['time'][0]['startTime'] ."<br>";
                    echo "<br>".$three['time'][0]['endTime'] ."<br>";
                    echo "<br>".$three['time'][0]['parameter']['parameterName'] ."<br>";

                }
           }

   /*insert in db but you will have big quantity of queryes*/
                
  //   $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
  //   mysqli_query($link,$sql);
  //   mysqli_select_db($link, "OPENDATA");
    
?>