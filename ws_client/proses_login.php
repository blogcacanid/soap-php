<?php
    require_once('lib/nusoap.php');

    $usernamex = $_POST['username'];
    $passwordx = $_POST['password'];
    
    $wsdl = "http://127.0.0.1/ws_server/server.php?wsdl";
    $client = new nusoap_client($wsdl,true);
    // Call the SOAP method
    $param = array(
        'username'  => $usernamex,
        'password'  => $passwordx
    );

    $result = $client->call('login', $param);
    if($result == 'Login Salah'){
        echo $result;
    }else{
        echo 'id: '.$result;
        echo 'login sukses';
    }

    echo '<h2>Request</h2>';
    echo '<pre>'.htmlspecialchars($client->request, ENT_QUOTES).'</pre>';
    echo '<h2>Response</h2>';
    echo '<pre>'.htmlspecialchars($client->response, ENT_QUOTES).'</pre>';
?>