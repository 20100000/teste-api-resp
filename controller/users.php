<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 31/03/2020
 * Time: 16:54
 */

include_once "class/Users.php";

$users = new Users();
$response = false;
$method = $_SERVER['REQUEST_METHOD'];
$data = null;
$header = getallheaders();

if($method === 'POST'){
    $request_body = file_get_contents('php://input');
    $obj = json_decode($request_body);

    if(empty($url[1])) {
        $data = $users->newUser($obj->name, $obj->email, $obj->password);
        if($data == 0){
            $data = 'Usuávio  já existe';
        }
    } else if(isset($url[1]) && $url[1] && isset($url[2]) && $url[2] === 'drink') {
        $id = $url[1];

        $authorize = $users->authorizeUser($header['Authorization']);
        if($authorize){
            $data = $users->insertDrink($id);
        }else {
            $data = 'Authorization invalido';
        }
    }

} else if ($method === 'GET'){
    $authorize = $users->authorizeUser($header['Authorization']);
    if($authorize) {
        if (isset($url[1]) && $url[1]) {
            $data = $users->getUserId($url[1]);
        } else {
            $data = $users->showUsers();
        }
    }else{
        $data = 'Authorization invalido';
    }
} else if($method === "PUT"){
    $authorize = $users->authorizeUser($header['Authorization']);
    if($authorize) {
        if (isset($url[1]) && $url[1]) {
            $id = $url[1];

            $request_body = file_get_contents('php://input');
            $obj = json_decode($request_body);

            $data = $users->updateUser($id, $obj->name, $obj->email, $obj->password);
        } else {
            echo json_encode(array('success' => $response, 'data' => 'falta id do usuario'));
            exit();
        }
    }else{
        $data = 'Authorization invalido';
    }
} else if ($method === 'DELETE'){
    $authorize = $users->authorizeUser($header['Authorization']);

    if($authorize){
        if(isset($url[1]) && $url[1]){
            $data = $users->deleteUser($url[1]);
        }else{
            echo json_encode(array('success' => $response, 'data'=> 'falta id do usuario'));
            exit();
        }
    }else{
        $data = 'Authorization invalido';
    }

}

if($data && $data != 'Authorization invalido' && $data != 'Usuávio  já existe'){
    $response = true;
}
echo json_encode(array('success' => $response, 'data'=> $data));