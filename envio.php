<?php

// define o token de autenticação
$token = "asdfasdfasdfasdfasdfasdf123123123123";

// define a chave de conexão com a API
$key = "W-API_Asdfasdfasdf";

//define host da api
$host = "https://apix.serverapi.dev/message/sendText?connectionKey";

// obtém o número de telefone e a mensagem a partir dos dados do formulário
$phone_number = $_GET["contact"];
$message = $_GET["message"];

// configura as opções da requisição GET ou POST
$post_data = array(
    "phoneNumber" =>  $phone_number,
    "message" => $message,
    "delayMessage" => "1000"
);

// inicializa a sessão cURL
$curl = curl_init();

// configura as opções da sessão cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => "{$host}={$key}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($post_data),
    CURLOPT_HTTPHEADER => array("Authorization: Bearer " . $token)
));

// executa a requisição cURL e armazena a resposta
$response = curl_exec($curl);

// verifica se houve algum erro na requisição
if (curl_errno($curl)) {
    echo "Erro ao enviar mensagem: " . curl_error($curl);
} else {
    echo "Mensagem enviada com sucesso! ";
}

// fecha a sessão cURL
curl_close($curl);

?>
