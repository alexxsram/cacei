<?php
$HOST = 'mysql:host=localhost; dbname=cvmaestros_db';
$USER = 'cvmaestros';
$PASS ='H52ZhcNUD' ;
    try{
        $base = new PDO ($HOST, $USER, $PASS);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET UTF8");
    }catch(Exception $e){
        die('Error: '. $e->GetMessage());
    }
?>
