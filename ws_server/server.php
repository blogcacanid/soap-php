<?php

    require_once('lib/nusoap.php');
    $ns = "http://localhost/";
    $server = new soap_server;
    $server->configureWSDL('login', $ns);
    $server->wsdl->schemaTargetNamespace = $ns;
    $server->register('login', 
            array('username' => 'xsd:string'),
            array('return'=>'xsd:string'), 
            $ns);
    $server->register('login', 
            array('password' => 'xsd:string'),
            array('return'=>'xsd:string'), 
            $ns);
    
    function login($username,$password){     //$username,password hrs sama dgn nama field dtbase
        if (!$username) {
            return new soap_fault('Client', '', 'Username is required!', '');
        }
        if ($conn = mysql_connect('localhost', 'root', '')) {
            if ($db = mysql_select_db('soap_db')) {
                $passx      = md5($password);
                $result     = mysql_query("SELECT * FROM users WHERE username = '$username' and password='$passx'");
                $num_rows   = mysql_num_rows($result);
                
                while ($row = mysql_fetch_array($result)){
                    $id         = $row['id_users'];
                    $username   = $row['username'];
                }
            } else {
                return new soap_fault('Database Server', '', 'Koneksi ke database gagal!', '');
            }
        } else {
            return new soap_fault('Database Server', '', 'Koneksi ke database gagal!', '');
        }
        if($num_rows > 0){
            return $id;
        }else{
            return 'Login Salah';
        }
    }

    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
    exit();
?>