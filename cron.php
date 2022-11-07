<?php
require_once ('config.php');


$get_data_ = file_get_contents("https://api-gateway.toss.im:11099/api-public/v3/cashtag/transfer-feed/received/list?inputWord=$toss_id");
$get_data = json_decode($get_data_, true);

if($get_data['resultType'] !== "SUCCESS"){
    echo "토스ID 데이터를 못불러왔어요!!";
    exit;
}

foreach ($get_data['success']['data'] as $row) {
    $cashtagTransferId = $row['cashtagTransferId']; // 거래 ID
    $cashtagTransferMethodType = $row['cashtagTransferMethodType']; // 거래 방식
    $sendName = $row['senderDisplayName']; // 보낸사람
    $transferedTs = $row['transferedTs']; // 거래시간
    $amount = $row['amount']; // 거래금액
    $msg = $row['msg']; // 메세지
    if(empty($msg)) $msg = "null"; // 메세지 값이 없을시
    toss_sql_query("INSERT INTO `$table_name` (`cashtagTransferId`, `cashtagTransferMethodType`, `sendName`, `transferedTs`, `amount`, `msg`) 
                                    VALUES ('$cashtagTransferId', '$cashtagTransferMethodType', '$sendName', '$transferedTs', '$amount', '$msg');");
    echo "DB에 등록중!! ($cashtagTransferId)\\n";
}