<?php

$number = $_POST['getNumber'];
$nameFile = $_POST['nameFile'];
$urlFile = $_POST['contentUrl'];

$ch = curl_init();

curl_setopt_array($ch, array(
	CURLOPT_URL => 'https://v4.chatpro.com.br/chatpro-qpebpshq56/api/v1/send_message_file_from_url' ,
	CURLOPT_RETURNTRANSFER => true ,
	CURLOPT_CUSTOMREQUEST => "POST" ,
	CURLOPT_POSTFIELDS => "{ \"caption\": \"$nameFile\", \"number\": \"$number\", \"url\": \"$urlFile\"}" ,
	CURLOPT_HTTPHEADER => array (
		"Authorization: eop82iy1mdf4ohbez2wlmea7n21y4d",
		"cache_control: no-cache"
	))
);

$responseFile = curl_exec($ch);

curl_close($ch);

$dataFile = json_decode($responseFile, true);

print_r($dataFile['message']);

?>