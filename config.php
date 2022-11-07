<?php
    $conn = mysqli_connect('##DB_HOST##', '##DB_ID##', '##DB_PW##', '##DB_NAME##');
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
    