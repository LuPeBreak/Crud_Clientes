<?php 
function recaptcha($key){
    require __DIR__."/../../Config.php";
    $secret=$recaptcha_secret;
    
    $api_request=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$key");
    $response=json_decode($api_request,true);

    return $response["success"];
}
    
    

?>
