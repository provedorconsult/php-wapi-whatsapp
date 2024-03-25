<?php

// define o token de autenticação
$token = "asdfasdfasdfasdf123123123";

// define a chave de conexão com a API
$key = "W-API_asdfasdfasdfasdf";

//define host da api
$host = "https://apix.serverapi.dev/group/getallgroups?connectionKey=".$key;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $host,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array("Authorization: Bearer " . $token)
));

$response = curl_exec($curl);
//echo "<ul>";
		$array = explode('}]}', $response);
		foreach ($array as $grupo){
			echo "<ul>";
			$detalhe_grupo = explode(':{', $grupo,2);
			foreach ($detalhe_grupo as $detalhe){
				echo "<li> ";
					echo "<ul>";
					$subitem = explode(',', $detalhe,-1) ;
					foreach ($subitem as $item) {
						echo "<li>";
						echo $item;				
					}
				echo "</ul>";
			}

			echo "</ul>";

		}

?>
