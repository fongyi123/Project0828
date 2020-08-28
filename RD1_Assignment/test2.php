
<?php
    // // 雨量
    // $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON";  // Your json data url
    // $data = file_get_contents($url);  // PHP get data from url
    // $json = json_decode($data, true);  // Decode json data
    // // 處理取得的 json 資料
    // var_dump($json['records']['locations'][0]['location']);   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON","rb");
            $content = "";
            while (!feof($handle)) {
                $content .= fread($handle, 10000);
            }
            fclose($handle);

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "OPENDATA";
            $port = 8889;

            

            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $content = json_decode($content);
            foreach ($content as $key => $value) {
                $sql = "INSERT INTO locations (id, name, toldescribe, tel, address, picture1, px, py, opentime, changetime) VALUES 
                ('$value->Id', '$value->Name', '$value->Toldescribe', '$value->Tel', '$value->Add', '$value->Picture1', '$value->Px', '$value->Py', '$value->Opentime', '$value->Changetime')";
                if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
            mysqli_close($conn);
        ?>
</body>
</html>