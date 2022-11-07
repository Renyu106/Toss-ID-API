<?php
require_once ('config.php');

header('Content-Type: application/json; charset=utf-8');

$search_column = $_GET['column'];
$search_data = $_GET['data'];

if($search_column == "id"){ // cashtagTransferId
    $search_column = "cashtagTransferId";
}else if($search_column == "method"){ // cashtagTransferMethodType
    $search_column = "cashtagTransferMethodType";
}else if($search_column == "name"){ // sendName
    $search_column = "sendName";
}else if($search_column == "date"){ // transferedTs
    $search_column = "transferedTs";
}else if($amount == "amount"){ // amount
    $search_column = "amount";
}else if($amount == "msg"){ // msg
    $search_column = "msg";
}

if(empty($search_column) || empty($search_data)){
    $array = array(
        'status' => 'error',
        "msg" => "데이터를 입력해주세요!! (column, data)"
    );
    echo json_encode($array);
    exit;
}

$toss = toss_sql_query("SELECT * FROM `$table_name` WHERE `$search_column` LIKE '%$search_data%';");

if(empty($toss['cashtagTransferId'])){
    $array = array(
        'status' => 'error',
        "msg" => "데이터가 없어요!!"
    );
    echo json_encode($array);
    exit;
}


$array = array(
    'status' => 'success',
    "msg" => "데이터를 불러왔어요!!",
    "data" => array(
        "cashtagTransferId" => $toss['cashtagTransferId'], // 거래 ID
        "sendName" => $toss['sendName'], // 보내는 사람
        "amount" => $toss['amount'], // 거래 금액
        "cashtagTransferMethodType" => $toss['cashtagTransferMethodType'], // 거래 방식
        "transferedTs" => $toss['transferedTs'], // 거래 시간
    )
);

echo json_encode($array);