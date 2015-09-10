<?php
    $service_url = './tm/v1/login';
$u = $_POST['user'];
$p = $_POST['pass'];
       $curl = curl_init($service_url);

       $curl_post_data = array(
            "email" => $u,
            "password" => $p,
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
$valu = json_decode($curl_response, true);
    if($valu['error'] == false){
    	echo "Successfull login.Here are Your details";
    
    echo $curl_response;
    }
    else{
    	echo "Error logging in.try again.";
    }
?>