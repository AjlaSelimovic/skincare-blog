<?php 

require_once dirname(__FILE__).'/BaseService.php';
require_once dirname(__FILE__).'/../dao/UserDao.class.php';

use \Firebase\JWT\JWT;

class UserService extends BaseService {

    public function __construct(){
        $this->userDao = new UserDao();
    }

    public function register($user){
        
        $user = $this->userDao->add([
            "username" => $user["username"],
            "email" => $user["email"],
            "password" => md5($user["password"]),
        ]);
    }
    public function login($user){
        $db_user = $this->userDao->get_user_by_email($user['email']);
    
        if (!isset($db_user['id'])) throw new Exception("user doesn't exists", 400);
            
        if ($db_user['password'] != md5($user['password'])) throw new Exception("Invalid password", 400);

          $jwt = JWT::encode(["id" => $db_user["id"], 
                            "email" => $db_user["email"], 
                            "name" => $db_user["name"]],
                            "JWT SECRET", "HS256" );  
                            
        return ["token" => $jwt];


    }
    public function confirm($token){
        $user = $this->userDao->get_user_by_token($token);

        if (!isset($user["id"])) throw Exception("Invalid Token");
    }
}
?>