<?php

use Configs\Messages;

session_start();
require_once "../Models/Users.php";
require_once "../Configs/Messages.php";

$user = new Users();
$userId = isset($_POST["id"]) ? $_POST["id"] : "";
$firstName = isset($_POST["first_name"])? $_POST["first_name"] : "";
$lastName = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : ""; 
$password = isset($_POST["password"])? $_POST["password"] : "";
$password_lost = isset($_POST["password_lost"])? $_POST["password_lost"] : "";

switch ($_GET["option"]) {
    case 'index':
        $result = $user->index();
        $data = [];
        while ($reg= $result->fetch_object()) {
            $data[] = array(
                'id'           => $reg->id,
                'name'         => $reg->first_name .' '. $reg->last_name,
                'username'     => $reg->username,
                'email'        => $reg->email,
                'create_date'  => date("d/m/Y", strtotime($reg->created_at))
            );
        }
        echo json_encode($data);
    break;
    case 'storeOrUpdate':
        $newPassword = null;
        if(empty($userId)){
            $data = [
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email,
                'username'   => $username,
                'password'   => password_hash($password,PASSWORD_DEFAULT),
            ];
            $result = $user->store($data);
            echo json_encode(['status' => $result]);
            return true;
        }else{
            $resPassword = empty(!$password) ? true : false ;
            
            $data = [
                'id'         => $userId,
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email,
                'username'   => $username,
                'password'   => empty(!$password)? password_hash($password,PASSWORD_DEFAULT) : null,
            ];
            reloadSession($data);
            $result = $user->update($data,$resPassword);
            echo json_encode(['status' => $result]);
        }
       
    break;
    case 'show':
        $result = $user->show($userId);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(0);
        }
    break;
    case 'validateUsername':
        $result = $user->searchUsername($username,$userId);
        if(empty($result) && $username !== $result['username']){
            echo json_encode(['status' => 1]);
        }else{
            echo json_encode(['status' => 0]);
        }
        break;
    case 'validatePassword':
        $result = $user->searchPasword($userId);
        $validate = password_verify($password_lost,$result['password']);
        if(!$validate){
            echo json_encode(['status' => 0]);
        }else{
            echo json_encode(['status' => 1]);
        }
        break;
    case 'delete':
        $result = $user->delete($userId);
        echo json_encode(['status' => $result]);
    break;
    case 'login';
        $result = $user->login($username);

        if(!$result){
            echo json_encode(['status' => 400,'message' => Messages::MESSAGE_USER_INFO_NO_EXIST]);
            return true;
        }
        
        if($result['deleted_at'] != null){
            echo json_encode(['status' => 400,'message' => Messages::MESSAGE_USER_INFO_LOW]);
            return true;
        }

        $validate = password_verify($password,$result['password']);
        if(!$validate){
            echo json_encode(['status' => 400,'message' => Messages::MESSAGE_PASSWORD_ERROR]);
            return true;
        }
        
        $data = [
            'id'         => $result['id'],
            'first_name' => $result['first_name'],
            'last_name'  => $result['last_name'],
            'email'      => $result['email'],
            'username'   => $result['username'],
        ];
        createSession($data);
        echo json_encode($data);
        
        break;
    case 'logout':
        session_unset();
        session_destroy();
        header("Location: ../../../index.php");
        break;
}

function createSession($data){
    $_SESSION['id']         = $data['id'];
    $_SESSION['first_name'] = $data['first_name'];
    $_SESSION['last_name']  = $data['last_name'];
    $_SESSION['email']      = $data['email'];
    $_SESSION['username']   = $data['username'];
}

function reloadSession($data){
    if($_SESSION['id'] == $data['id']){
        session_unset();
        $_SESSION['id']         = $data['id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name']  = $data['last_name'];
        $_SESSION['email']      = $data['email'];
        $_SESSION['username']   = $data['username'];
    }
}