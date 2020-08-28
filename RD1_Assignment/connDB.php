<?php

    $link = @mysqli_connect("localhost", "root", "root","OPENDATA",8889) or die(mysqli_connect_error());
    $result = mysqli_query($link, "set names utf8");
    // mysqli_select_db($link, "OPENDATA");


    //  結束連線
    mysqli_close($link);

?>