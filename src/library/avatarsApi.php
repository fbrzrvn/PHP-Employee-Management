<?php

$curl =curl_init();
$url = 'https://uifaces.co/api?limit=5' . (isset($_GET['gender']) ? ($_GET['gender']== 'man' ? '&gender[]=male' : '&gender[]=female'): '');
curl_setopt_array($curl,array(
  CURLOPT_URL=> $url,
  CURLOPT_RETURNTRANSFER=>true,
  CURLOPT_ENCODING=>'',
  CURLOPT_MAXREDIRS=>10,
  CURLOPT_TIMEOUT=>0,
  CURLOPT_FOLLOWLOCATION=>true,
  CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST=>'GET',
  CURLOPT_HTTPHEADER=>array(
  'X-API-KEY: 9B934601-B7AF48A5-A5378686-95A45DBE',
  'Accept: application/json\'',
  'Cache-Control: no-cache',
  'Cookie: PHPSESSID=5hgq38u2hp8rmi9ac11d5rni43'
  ),
));

$response =curl_exec($curl);

curl_close($curl);


