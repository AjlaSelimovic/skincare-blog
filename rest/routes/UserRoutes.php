<?php 

Flight::route('POST /users/register', function(){
    $data= Flight::request()->data->getData();
    Flight::userService()->register($data);
    Flight::json(["message"=> "You are registrated"]);

});

Flight::route('POST /users/login', function(){
    $data = Flight::request()->data->getData();
    try {
        $token = Flight::userService()->login($data);
    } catch (Exception $e) {
        Flight::json(["message" => $e->getMessage()], 404);
    }
});


Flight::route('GET /users/confirm/@token', function($token){
    Flight::userService()->confirm($token);
    Flight::json(["message" => "Token is valid"]);
});


Flight::route('GET /users/@id', function($id){
    Flight::json(Flight::userService()->get_by_id($id));
});

?>