<?php
require_once ('config.php');

header('Content-Type: application/json; charset=utf-8');

$search_column = $_GET['column'] ?? '';
$search_data = $_GET['data'] ?? '';

$valid_columns = array(
    'id' => 'cashtagTransferId',
    'method' => 'cashtagTransferMethodType',
    'name' => 'sendName',
    'date' => 'transferedTs',
    'amount' => 'amount',
    'msg' => 'msg',
);

if (!isset($valid_columns[$search_column])) {
    $array = array(
        'status' => 'error',
        'msg' => '검색 대상 column이 올바르지 않습니다.',
    );
    echo json_encode($array);
    exit;
}

$search_column = $valid_columns[$search_column];

if(empty($search_column) || empty($search_data)){
    $array = array(
        'status' => 'error',
        'msg' => '데이터를 입력해주세요!! (column, data)',
    );
    echo json_encode($array);
    exit;
}

$toss = toss_sql_query("SELECT * FROM `$table_name` WHERE `$search_column` LIKE :search_data;", array(':search_data' => "%$search_data%"));

if(empty($toss)){
    $array = array(
        'status' => 'error',
        'msg' => '데이터가 없어요!!',
    );
    echo json_encode($array);
    exit;
}

$data = array(
    'cashtagTransferId' => $toss['cashtagTransferId'], // 거래 ID
    'sendName' => $toss['sendName'], // 보내는 사람
    'amount' => $toss['amount'], // 거래 금액
    'cashtagTransferMethodType' => $toss['cashtagTransferMethodType'], // 거래 방식
    'transferedTs' => $toss['transferedTs'], // 거래 시간
);

$array = array(
    'status' => 'success',
    'msg' => '데이터를 불러왔어요!!',
    'data' => $data,
);

echo json_encode($array);
