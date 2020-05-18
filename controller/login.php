<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 31/03/2020
 * Time: 17:09
 */

include_once "class/Users.php";

$users = new Users();
$response = false;
$method = $_SERVER['REQUEST_METHOD'];

if($method === 'POST') {
    $request_body = file_get_contents('php://input');
    $obj = json_decode($request_body);

    $data = $users->loginUser($obj->email, $obj->password);
    if($data){
        $response = true;
    } else {
        $data = "Usuário ou senha inválido";
    }

    echo json_encode(array('success' => $response, 'data'=> $data ));
}else{
    echo json_encode(array('success' => false, 'data'=> 'method incorreto'));
}