<?php

class  search{
	function __construct(){
		echo "tryy";
	}
	function food($text){
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://edamam-recipe-search.p.rapidapi.com/search?q=$text",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"X-RapidAPI-Host: edamam-recipe-search.p.rapidapi.com",
				"X-RapidAPI-Key: af65e2a038msh6da9c55ee1f6960p1ded06jsn453d2d93981e"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		$store=json_decode($response,true);
		return $store;
	}

}
?>