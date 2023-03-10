# Toss-ID-API

아무래도 막힌거같으니 잘 개조해서 사용하세요!


토스 ID를 활용한 API 시스템

## 설명
토스 ID를 이용하여, 입금확인 시스템을 간편하게 만들 수 있습니다

## 작동방식
1. Cron(cron.php)을 활용하여 사용자가 원하는 시간마다 토스 ID서버에서 데이터를 받아와서 DB에 저장합니다
2. 입금 내역을 확인하고싶을때마다 DB에 토스ID 거래내역을 조회(toss_api.php)합니다

## API 
GET /toss_api.php?column=이름&data=검색할 데이터

### column
DB의 칼럼을 검색하는 부분입니다<br>
id => cashtagTransferId (거래 ID)<br>
method => cashtagTransferMethodType (거래방식)<br>
name => sendName (입금자)<br>
date => transferedTs (거래시간)<br>
amount => amount (거래금액)<br>
msg -> msg (입금자가 남긴 메시지 (토스를 통한 이체만 가능))<br>

### 요청예시

입금자 이름이 "renyu"인 사람이 입금한 내역을 확인할려면<br>
GET /toss_api.php?column=name&data=renyu<br>
또는 <br>
GET /toss_api.php?column=name&data=ren (일치값을 찾는게 아닌 포함값을 찾음)
