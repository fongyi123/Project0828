<?php
require_once("connDB.php");
if (isset($_POST['btn'])){
    $_SESSION["id"] = $_POST['city'];
  }
  

//未來一週天氣預報 
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=".urlencode($_POST["city"])."&elementName=WeatherDescription&sort=time";
// $locationNameid = urlencode("台中市");
$data = file_get_contents($url);  // PHP get data from url
$json2 = json_decode($data, true);  // Decode json data
    // global $locations,$datasetDescription,$location,$locationName,$elementName,$description,$startTime,$endTime,$value;
    $locations = $json2['records']['locations'];
    $datasetDescription = $json2['records']['locations'][0]['datasetDescription'];
    $location = $json2['records']['locations'][0]['location'];
    $locationName = $json2['records']['locations'][0]['location'][0]['locationName'];
    $elementName = $json2['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName'];
    $description = $json2['records']['locations'][0]['location'][0]['weatherElement'][0]['description'];
    $startTime = $json2['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime'];
    $endTime = $json2['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime'];
    $value = $json2['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value'];
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
                                $link = @mysqli_connect("localhost", "root", "root","OPENDATA",8889) or die(mysqli_connect_error());
                                $result = mysqli_query($link, "set names utf8");
                                $sql ="INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
                            
                                mysqli_query($link,$sql);
                            }
                              
                        }
  
                    }
  
                }
           }
      }  
      // mysqli_query($link,$sql);
      // mysqli_select_db($link, "OPENDATA");
  
      // //  結束連線
      // mysqli_close($link);
  
      /*insert in db but you will have big quantity of queryes*/
                
    



    //   var_dump($json1);
    // var_dump($json1['records']['locations']);
    // var_dump($json1['records']['locations'][0]['datasetDescription']);
    // var_dump($json1['records']['locations'][0]['location'][0]['locationName']);
    // var_dump($json1['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName']);
    // var_dump($json1['records']['locations'][0]['location'][0]['weatherElement'][0]['description']);
    // var_dump($json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime']);
    // var_dump($json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime']);
    // var_dump($json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value']);

    //   foreach($locations as $one) {
    //     echo "<br>";
    //     print_r($datasetDescription);
    //     echo "<br>";
       
    //         echo "<br>";
    //         print_r($locationName);
    //         echo "<br>";
    //         print_r($elementName);
    //         echo "<br>";
    //         print_r($description);
    //         echo "<br>";
    //         print_r($startTime);
    //         echo "<br>";
    //         print_r($endTime);
    //         echo "<br>";
    //         print_r($value);
    //         echo "<br>";
    //     }
    //   }        
        // echo "<br>".$datasetDescription."<br>";
        // echo "<br>".$locationName."<br>";
        // echo "<br>".$elementName."<br>";
        // echo "<br>".$description."<br>";
        // echo "<br>".$startTime."<br>";
        // echo "<br>".$endTime."<br>";
        // echo "<br>".$value."<br>";

      ?>