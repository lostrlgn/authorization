<?php

    $file_write = fn(string|array $data) => file_put_contents(FILE_DB, json_encode($data));
    
    $file_load = function() use ($file_write): array {
        $data = [];
        if (file_exists(FILE_DB)) {
            if ($fileData = file_get_contents(FILE_DB)) {
                $data = json_decode($fileData, true);
            }            
        } else {            
            $file_write($data);            
        }
        
        return $data;
    };

    $token_create = function(array $data) {
        while (true) {
            $token = bin2hex(random_bytes(25));
            if (! array_filter($data, fn($val) => $val['token'] == $token)) {
                break;
            } 
        }

        return $token;
    };

    $add_user = fn(array &$data, string $login, string $password, string $age) => 
        $data[$login] = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => null,
            'expire' => null, 
            'age' => $age,           
        ];
    
    $user_search = fn($data, $token) =>
    array_filter($data, 
        fn($val) => $val['token'] == $token
    );


    $user_update = function(string $login, array $user) use($file_load, $file_write) {
        $result = false;
        if ($data = $file_load()) {
            $data[$login] = $user;            
            $result = (bool)$file_write($data);
        }
        
        return $result;
    };

    $set_user_session = function($login, $age) {
        $_SESSION['user'] = [
            'login' => $login,
            'age' => $age,
        ];
    };

    $sign_in = function(string $login, string $password) use($file_load, $user_update, $token_create, $set_user_session) {        
        if ($login && $password) {           
            if (($data = $file_load()) && isset($data[$login])) {
                $user = $data[$login];                
                if (password_verify($password, $user['password'])) {
                    $user['token'] = $token_create($data);
                    $user['expire'] = time() + TIME_EXPIRE;
                    $user_update($login, $user);

                    setcookie('token', $user['token'], $user['expire']);

                    $set_user_session($login, $user['age']);
                }
            }
        }

    };

    
    $register = function() use ($add_user, $file_write, $file_load, $sign_in, $set_user_session) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $set_user_session($login, $age);
        $result = null;        
        if ($login && $password) {
            if ($data = $file_load()) {
                if (isset($data[$login])) {
                    //user exist
                    // $result = "error=user: $login is exist";
                }
            }
            
            if (! $result) {
                $add_user($data, $login, $password, $age);
                $file_write($data);
                $result = $sign_in($login, $password, $age);
            }
        }

        // return $result;
    };
    

    $logout = function(string $token) use($file_load, $user_update, $user_search) {
        if ($token && ($data = $file_load())) {
            if ($user = $user_search($data, $token)) {
                $login = array_keys($user)[0]; 
                $user = [...$user[$login]];
                $user['token'] = null;
                $user['expire'] = null;
                $user_update($login, $user);
            }
        }

        return null;
    };
