<?php
    // ------
    session_start();
    
    if (isset($_POST['btn'])){
      $_SESSION["id"] = $_POST['city'];
      echo $_POST['city'];
      // echo $_SESSION["id"];
      $x = $_POST["city"];
    }
    $city = array ("01"=>"台北市","02"=>"新北市");
    var_dump($city["01"]);
    echo $x;

  //   $link = @mysqli_connect("localhost", "root", "root",null,8889) or die(mysqli_connect_error());
  //   $result = mysqli_query($link, "set names utf8");
  //   mysqli_select_db($link, "OPENDATA");



  //   //天氣預報 
    // $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON";  // Your json data url
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=" . urlencode($city["$x"]) . "&elementName=WeatherDescription&sort=time";
    // $locationNameid = urlencode("台中市");
    // echo $url;


    $data = file_get_contents($url);  // PHP get data from url
    $json = json_decode($data, true);  // Decode json data
    echo $json;
  //   echo($locationNameid);
  // //  $datasetDescription = $contenct['datasetDescription'];
  // //  $locationName = $connect['locationName'];
  // //  $elementName = $connect['elementName'];
  // //  $description = $connect['description'];
  // //  $startTime = $connect['startTime'];
  // //  $endTime = $connect['endTime'];
  // //  $dataTime = $connect['dataTime'];
  // //  $value = $connect['value'];

  //   // $records = $json['records'];
    $locations = $json['records']['locations'];
    echo $locations ;
    // $datasetDescription = $json['records']['locations'][0]['datasetDescription'];
  //   // $location = $json['records']['locations'][0]['location'];
  //   // $locationName = $json['records']['locations'][0]['location'][0]['locationName'];
  //   // $elementName = $json['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName'];
  //   // $description = $json['records']['locations'][0]['location'][0]['weatherElement'][0]['description'];
  //   // $startTime = $json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime'];
  //   // $endTime = $json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime'];
  //   // $value = $json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value'];

  // //  $query = "insert into weather(datasetDescription, locationName, elementName, description, startTime, endTime, dataTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
  // $sql = "SELECT * FROM weather";
  
  //   // 2. 執行 SQL 敘述
    
  //   // foreach($locations as $one)
  //   // {
  //   //      echo $one['datasetDescription'] . "\n";

  //   //      foreach($location as $two)
  //   //      {
  //   //           echo $two['locationName'] . "\n";

  //   //           foreach($location[0]['weatherElement'] as $three)
  //   //           {

  //   //               echo $three['elementName'] . "\n";

  //   //               foreach($location[0]['weatherElement'] as $four)
  //   //               {

  //   //                   echo $four['description'] . "\n";

  //   //                   foreach($location[0]['weatherElement'][0]['time'] as $five)
  //   //                   {

  //   //                       echo $five['startTime'] . "\n";

  //   //                       foreach($location[0]['weatherElement'][0]['time'] as $six)
  //   //                       {

  //   //                           echo $six['endTime'] . "\n";

  //   //                           foreach($location[0]['weatherElement'][0]['time'][0]['elementValue'] as $seven)
  //   //                           {

  //   //                               echo $seven['value'] . "\n";


                                 

  //   //                           }

  //   //                       }

  //   //                   }

  //   //               }

  //   //           }
  //   //      }
  //   // }      

  //   echo "<br>".$datasetDescription."<br>";
  //   echo "<br>".$locationName."<br>";
  //   echo "<br>".$elementName."<br>";
  //   echo "<br>".$description."<br>";
  //   echo "<br>".$startTime."<br>";
  //   echo "<br>".$endTime."<br>";
  //   echo "<br>".$value."<br>";
  //     echo '</td></tr>';
  //     // print json_encode($json);
    
      
  
  
  //             /*insert in db but you will have big quantity of queryes*/
      

  //     // }
  //   // echo '</table>';
  
              
  //   $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
  //   mysqli_query($link,$sql);
  //   mysqli_select_db($link, "OPENDATA");
            
    // 3. 處理查詢結果
    // while ($row = mysqli_fetch_assoc($result))
    // {
      // echo "datasetDescription:{$row['datasetDescription']}<br>";
    //   echo "locationName:{$row['locationName']}<br>";
    //   echo "elementName:{$row['elementName']}<br>";
    //   echo "description:{$row['description']}<br>";
    //   echo "startTime:{$row['startTime']}<br>";
    //   echo "endTime:{$row['endTime']}<br>";
    //   echo "value:{$row['value']}<br>";
  
    
   
    
   



    // 4. 結束連線
    // mysqli_close($link);
    
    // 處理取得的 json 資料
    


  //     echo "dataTime:{$row['dataTime']}<br>";

    
    
    //  $ins_qry = 'INSERT INTO json_table(jsonvalues) values ("'.$json.'")';
    //  $exec_qry = mysqli_query($link,$ins_qry);
    // $connect->close();

    

    // $host="localhost";
    // $user="root";
    // $pass="root";
    // $db="OPENDATA";
    // $port=8889;
    // // mysql_query("SET NAMES 'utf8'");
    // // mysql_select_db($dbname);
    // $connect= new mysqli($host,$user,$pass,$db,$port) or die("ERROR:could not connect to the database!!!");
    // var_dump($json);
    // var_dump($json['records']['locations']);
    // var_dump($json['records']['locations'][0]['datasetDescription']);
    // var_dump($json['records']['locations'][0]['location'][0]['locationName']);
    // var_dump($json['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName']);
    // var_dump($json['records']['locations'][0]['location'][0]['weatherElement'][0]['description']);
    // var_dump($json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime']);
    // var_dump($json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime']);
    // var_dump($json['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value']);

    // $query = "SELECT * FROM weather";

    // $result = mysql_query("SELECT * FROM weather"); 
    // while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    //   　printf ("datasetDescription: %s  locationName: %s", $datasetDescription, $locationName);
    // }
  // $result = mysqli_query($link, $sql);
	
	//加入此判斷式
	// if(!$result)
	// {
	// 	echo ("Error: ".mysqli_error($link));
	// 	exit();
  // }
  //     while ($row = mysqli_fetch_array ($result))
  // {
    // $datasetDescription=$row['datasetDescription'];
    // $locationName=$row['locationName'];
    // $locationName=$row['elementName'];
    // $locationName=$row['description'];
    // $locationName=$row['startTime'];
    // $locationName=$row['endTime'];
    // $locationName=$row['value'];
    // echo "<br>".$datasetDescription."<br>";
    // echo "<br>".$locationName."<br>";
    // echo "<br>".$elementName."<br>";
    // echo "<br>".$description."<br>";
    // echo "<br>".$startTime."<br>";
    // echo "<br>".$endTime."<br>";
    // echo "<br>".$value."<br>";
  // $commandText = "select * from weather";
    // $result = mysqli_query($link, $data);
    
    // echo 'Weather <br>';
    // echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";
    // foreach($json as $datasetDescription) {
    //   echo '</td><td>';
    //   print_r($datasetDescription);
    //   echo '</td><td>';
    //   print_r($locationName);
    //   echo '</td></tr>';
    //   print_r($elementName);
    //   echo '</td></tr>';
    //   print_r($description);
    //   echo '</td></tr>';
    //   print_r($startTime);
    //   echo '</td></tr>';
    //   print_r($endTime);
    //   echo '</td></tr>';
    //   print_r($value);
  // }    
    
?>