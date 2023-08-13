<?php
for ($i = 1; $i <= 1; $i++)
{

$token = array("access_token" => "a695a57b717c0b40d1d4ca7e9d3cadd1");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "www.bolanusantara.com/api/v1/trivia/check");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
$data_string = json_encode($token);
//Send blindly the json-encoded string.
//The server, IMO, expects the body of the HTTP request to be in JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
curl_setopt($ch, CURLOPT_HTTPHEADER,     
	array(
	'Host: www.bolanusantara.com',
	'accept: application/json, text/plain, */*',
	'x-publickey: bfe1c381ad00dae0f4c5b46f87a7f86ae186fd91',
	'x-hashkey: f3c78e62a63964b9c8be8747d302a7a2',
	'content-type: application/json;charset=utf-8',
	'cookie: XSRF-TOKEN=eyJpdiI6IlU1azg3Z3NRYUZnaW5LbWZTSzgwUnc9PSIsInZhbHVlIjoiR211TG5JTkQyeVhRTzhlenpBaFJ0UU5XUFAzSkxzYlZmS2FCa2hoSEV5WkNtcFlEZ1pzd0t3d1VmclhXUndJcVNucGkxWkdDbHFsNEptR1ZoSEM2VWc9PSIsIm1hYyI6ImMxZDVkMjAxZWJmMjAxMmUxOGIyZjg5MmFkOTgzZGJlYjFlYmFjMzZkZjdjYjZhODk0MzgxNWY2N2JiZGQ0MjkifQ%3D%3D; bola_nusantara_session=eyJpdiI6IlRMeGpQSDhTbFNKdnkyMFFEU3RGVWc9PSIsInZhbHVlIjoiTXI3Y1hWcWhtYTRuXC9DK3VHcjBodU56T2VYWlcrenl6bld4bkZxT1l2Mk5cL1N4WE10RVNNV041SnRKWUtqazB2Zmg4YjhaZGJOaGN4dFBRNGVqekQzZz09IiwibWFjIjoiNzAwYjY2YTYyMTE4MDg5YzFhNDRjZmU4N2VhODY2NzI0ZjQzNGExYzU2ODVkYTU4OTliZWMyMmRmYjE0NTYyZCJ9',
	'user-agent: okhttp/3.12.1'
	)); 
	
$response=curl_exec($ch);
echo $response;

curl_close($ch);

preg_match('~","id":(.*?)}~', $response, $output);
echo $output[1]; // id

$idtrivia = array("trivia_user_request_id" => $output[1],
"access_token" => "a695a57b717c0b40d1d4ca7e9d3cadd1");

for ($i = 1; $i <= 5; $i++)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "www.bolanusantara.com/api/v1/trivia/get-question");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
$data_string = json_encode($idtrivia);
//Send blindly the json-encoded string.
//The server, IMO, expects the body of the HTTP request to be in JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
curl_setopt($ch, CURLOPT_HTTPHEADER,     
	array(
	'Host: www.bolanusantara.com',
	'accept: application/json, text/plain, */*',
	'x-publickey: bfe1c381ad00dae0f4c5b46f87a7f86ae186fd91',
	'x-hashkey: f3c78e62a63964b9c8be8747d302a7a2',
	'content-type: application/json;charset=utf-8',
	'cookie: XSRF-TOKEN=eyJpdiI6IlU1azg3Z3NRYUZnaW5LbWZTSzgwUnc9PSIsInZhbHVlIjoiR211TG5JTkQyeVhRTzhlenpBaFJ0UU5XUFAzSkxzYlZmS2FCa2hoSEV5WkNtcFlEZ1pzd0t3d1VmclhXUndJcVNucGkxWkdDbHFsNEptR1ZoSEM2VWc9PSIsIm1hYyI6ImMxZDVkMjAxZWJmMjAxMmUxOGIyZjg5MmFkOTgzZGJlYjFlYmFjMzZkZjdjYjZhODk0MzgxNWY2N2JiZGQ0MjkifQ%3D%3D; bola_nusantara_session=eyJpdiI6IlRMeGpQSDhTbFNKdnkyMFFEU3RGVWc9PSIsInZhbHVlIjoiTXI3Y1hWcWhtYTRuXC9DK3VHcjBodU56T2VYWlcrenl6bld4bkZxT1l2Mk5cL1N4WE10RVNNV041SnRKWUtqazB2Zmg4YjhaZGJOaGN4dFBRNGVqekQzZz09IiwibWFjIjoiNzAwYjY2YTYyMTE4MDg5YzFhNDRjZmU4N2VhODY2NzI0ZjQzNGExYzU2ODVkYTU4OTliZWMyMmRmYjE0NTYyZCJ9',
	'user-agent: okhttp/3.12.1'
	)); 
	
$response=curl_exec($ch);
echo $response;

curl_close($ch);

preg_match('~id":(.*?),"attachment~', $response, $output2);
echo $output2[1]; // id
preg_match('~right_answer":"(.*?)","type~', $response, $output3);
echo $output3[1]; // id



$jawab = array("trivia_user_request_id" => $output[1],
"trivia_question_id" => $output2[1],
"answer" => "".$output3[1]."",
"access_token" => "a695a57b717c0b40d1d4ca7e9d3cadd1");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "www.bolanusantara.com/api/v1/trivia/answer-question");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
$data_string = json_encode($jawab);
//Send blindly the json-encoded string.
//The server, IMO, expects the body of the HTTP request to be in JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
curl_setopt($ch, CURLOPT_HTTPHEADER,     
	array(
	'Host: www.bolanusantara.com',
	'accept: application/json, text/plain, */*',
	'x-publickey: bfe1c381ad00dae0f4c5b46f87a7f86ae186fd91',
	'x-hashkey: f3c78e62a63964b9c8be8747d302a7a2',
	'content-type: application/json;charset=utf-8',
	'cookie: XSRF-TOKEN=eyJpdiI6IlU1azg3Z3NRYUZnaW5LbWZTSzgwUnc9PSIsInZhbHVlIjoiR211TG5JTkQyeVhRTzhlenpBaFJ0UU5XUFAzSkxzYlZmS2FCa2hoSEV5WkNtcFlEZ1pzd0t3d1VmclhXUndJcVNucGkxWkdDbHFsNEptR1ZoSEM2VWc9PSIsIm1hYyI6ImMxZDVkMjAxZWJmMjAxMmUxOGIyZjg5MmFkOTgzZGJlYjFlYmFjMzZkZjdjYjZhODk0MzgxNWY2N2JiZGQ0MjkifQ%3D%3D; bola_nusantara_session=eyJpdiI6IlRMeGpQSDhTbFNKdnkyMFFEU3RGVWc9PSIsInZhbHVlIjoiTXI3Y1hWcWhtYTRuXC9DK3VHcjBodU56T2VYWlcrenl6bld4bkZxT1l2Mk5cL1N4WE10RVNNV041SnRKWUtqazB2Zmg4YjhaZGJOaGN4dFBRNGVqekQzZz09IiwibWFjIjoiNzAwYjY2YTYyMTE4MDg5YzFhNDRjZmU4N2VhODY2NzI0ZjQzNGExYzU2ODVkYTU4OTliZWMyMmRmYjE0NTYyZCJ9',
	'user-agent: okhttp/3.12.1'
	)); 
	
$response=curl_exec($ch);
echo $response;

curl_close($ch);

}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "www.bolanusantara.com/api/v1/trivia/get-request");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
$data_string = json_encode($idtrivia);
//Send blindly the json-encoded string.
//The server, IMO, expects the body of the HTTP request to be in JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
curl_setopt($ch, CURLOPT_HTTPHEADER,     
	array(
	'Host: www.bolanusantara.com',
	'accept: application/json, text/plain, */*',
	'x-publickey: bfe1c381ad00dae0f4c5b46f87a7f86ae186fd91',
	'x-hashkey: f3c78e62a63964b9c8be8747d302a7a2',
	'content-type: application/json;charset=utf-8',
	'cookie: XSRF-TOKEN=eyJpdiI6IlU1azg3Z3NRYUZnaW5LbWZTSzgwUnc9PSIsInZhbHVlIjoiR211TG5JTkQyeVhRTzhlenpBaFJ0UU5XUFAzSkxzYlZmS2FCa2hoSEV5WkNtcFlEZ1pzd0t3d1VmclhXUndJcVNucGkxWkdDbHFsNEptR1ZoSEM2VWc9PSIsIm1hYyI6ImMxZDVkMjAxZWJmMjAxMmUxOGIyZjg5MmFkOTgzZGJlYjFlYmFjMzZkZjdjYjZhODk0MzgxNWY2N2JiZGQ0MjkifQ%3D%3D; bola_nusantara_session=eyJpdiI6IlRMeGpQSDhTbFNKdnkyMFFEU3RGVWc9PSIsInZhbHVlIjoiTXI3Y1hWcWhtYTRuXC9DK3VHcjBodU56T2VYWlcrenl6bld4bkZxT1l2Mk5cL1N4WE10RVNNV041SnRKWUtqazB2Zmg4YjhaZGJOaGN4dFBRNGVqekQzZz09IiwibWFjIjoiNzAwYjY2YTYyMTE4MDg5YzFhNDRjZmU4N2VhODY2NzI0ZjQzNGExYzU2ODVkYTU4OTliZWMyMmRmYjE0NTYyZCJ9',
	'user-agent: okhttp/3.12.1'
	)); 
	
$response=curl_exec($ch);
echo $response;

curl_close($ch);

}


?>