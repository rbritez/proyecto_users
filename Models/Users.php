<?php
    include "../Configs/Conexion.php";
    
    class Users{

        public $now;

        public function __construct(){
           $this->now = date('Y-m-d h:i:s');
        }

        public function index(){
            $sql = "SELECT * FROM users WHERE deleted_at is null";
            return queryRun($sql);
        }

        public function store($data){
            $sql = "INSERT INTO users(first_name,last_name,email,username,password,created_at,updated_at)
                    VALUES('$data[first_name]','$data[last_name]','$data[email]','$data[username]','$data[password]','$this->now','$this->now')";
            return queryRun($sql);
        }

        public function show($data){
            $sql = "SELECT first_name,last_name,email,username FROM users WHERE id=$data";
            return queryRunFirst($sql);
        }
        public function update($data,$password){
            $updatePass = '';
            
            if($password){
                $updatePass = ", password = '$data[password]' ";
            }

            $sql = "UPDATE users SET first_name = '$data[first_name]',
                                     last_name = '$data[last_name]',
                                     email = '$data[email]',
                                     username = '$data[username]' 
                                     $updatePass
                                     ,updated_at = '$this->now'
                    WHERE id = '$data[id]'";
            return queryRun($sql);
        }
        public function searchPasword($id){
            $sql = "SELECT password FROM users WHERE id = $id";
            return queryRunFirst($sql);
        }

        public function searchUsername($username,$id = 0){
            $whereID = '';
            if($id != 0){
                $whereID = "AND id != '$id'"; 
            }
            
            $sql = "SELECT username FROM users WHERE username = BINARY '$username' $whereID";
            return queryRunFirst($sql);
        }
        
        public function delete($data){
            $sql = "UPDATE users SET updated_at = '$this->now', deleted_at = '$this->now' WHERE id = $data";
            return queryRun($sql);
        }

        public function login($data){
            $sql = "SELECT * FROM users WHERE username = BINARY '$data'";
            return queryRunFirst($sql);
        }

    }