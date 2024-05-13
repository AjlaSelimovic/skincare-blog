<?php
use Firebase\JWT\JWT;

// Function to check JWT token
function checkJWT() {
    $headers = getallheaders();
    $jwt = isset($headers['Authorization']) ? $headers['Authorization'] : null;

    if (!$jwt) {
        Flight::json(["error" => "Unauthorized. JWT token missing."], 401);
        return false;
    }

    try {
        $decoded = JWT::decode($jwt, "HS256", array('HS256'));
        return true;
    } catch (Exception $e) {
        // Token verification failed, return unauthorized error
        Flight::json(["error" => "Unauthorized. Invalid JWT token."], 401);
        return false;
    }
}

Flight::route('/*', function(){
    $request = Flight::request();
    $route = $request->url;
    if ($route === '/users/register' || $route === '/users/login') {
        return true; // Allow access to /users/register and /users/login without JWT
    } else {
        return checkJWT();
    }
});

/**
 * @OA\Post(
 *      path="/users/register",
 *      tags={"Users"},
 *      summary="Register a new user",
 *      operationId="registerUser",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="username",
 *                      type="string"
 *                  ),
 *                  @OA\Property(
 *                      property="password",
 *                      type="string"
 *                  ),
 *                  @OA\Property(
 *                      property="email",
 *                      type="string",
 *                      format="email"
 *                  )
 *              ),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string"
 *              )
 *          )
 *      )
 * )
 */
Flight::route('POST /users/register', function(){
    $data= Flight::request()->data->getData();
    Flight::userService()->register($data);
    Flight::json(["message"=> "You are registered"]);
});

/**
 * @OA\Post(
 *      path="/users/login",
 *      tags={"Users"},
 *      summary="Login",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="email",
 *                      type="string",
 *                      format="email"
 *                  ),
 *                  @OA\Property(
 *                      property="password",
 *                      type="string"
 *                  )
 *              ),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="token",
 *                  type="string"
 *              )
 *          )
 *      )
 * )
 */

 Flight::route('POST /users/login', function(){
    $data = Flight::request()->data->getData();
    try {
        $token = Flight::userService()->login($data);
    } catch (Exception $e) {
        Flight::json(["message" => $e->getMessage()], 404);
    }
});

/**
 * @OA\Get(
 *      path="/users/confirm/{token}",
 *      tags={"Users"},
 *      summary="Confirm user registration",
 *      @OA\Parameter(
 *          name="token",
 *          in="path",
 *          description="Registration token",
 *          required=true,
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Token is valid"
 *      )
 * )
 */
Flight::route('GET /users/confirm/{token}', function($token){
    Flight::userService()->confirm($token);
    Flight::json(["message" => "Token is valid"]);
});

/**
 * @OA\Get(
 *      path="/users/{id}",
 *      tags={"Users"},
 *      summary="Get user by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="User ID",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation"
 *      )
 * )
 */
Flight::route('GET /users/{id}', function($id){
    Flight::json(Flight::userService()->get_by_id($id));
});

?>

