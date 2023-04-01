<?php
require "../vendor/autoload.php";
require "dao/AdminsDao.class.php";

Flight::register('admin_dao', "AdminsDao");

Flight::route("/", function () {
    echo "Hello from / route";
});

Flight::route("GET /admins", function () {
    //echo "Hello from /admins route";
    //$admin_dao = new AdminsDao();
    //$results = Flight::admin_dao()->get_all();
    //print_r($results);

    Flight::json(Flight::admin_dao()->get_all());
});

Flight::route("GET /admins_by_id", function () {
    Flight::json(Flight::admin_dao()->get_by_id(Flight::request()->query['id_admin']));
});

Flight::route("GET /admins/@id_admin", function ($id) {
    //echo "Hello from /admins route";
    //$admin_dao = new AdminsDao();
    //$results = $admin_dao->get_by_id($id);
    //print_r($results);
    Flight::json(Flight::admin_dao()->get_by_id($id));
});

Flight::route("DELETE /admins/@id_admin", function ($id) {
    //echo "Hello from /admins route";
    //$admin_dao = new AdminsDao();

    Flight::admin_dao()->delete($id);
    Flight::json(['message' => "Admin deleted successfully"]);
});

Flight::route("POST /admin", function () {

    //echo "Hello from /admins route";
    //$admin_dao = new AdminsDao();

    $request = Flight::request()->data->getData();
    //$response = $admin_dao->add($request);

    Flight::json([
        'message' => "Admin added successfully",
        'data' => Flight::admin_dao()->add($request)
    ]);
});

Flight::route("PUT /admin/@id_admin", function ($id) {

    //echo "Hello from /admins route";
    //$admin_dao = new AdminsDao();

    $admin = Flight::request()->data->getData();

    //$response = $admin_dao->update($admin, $id);
    Flight::json([

        'message' => "Admin edited successfully",
        'data' => Flight::admin_dao()->update($admin, $id)
    ]);
});

Flight::route("GET /admins/@username", function ($username) {
    echo "Hello from /admins route with username= " . $username;
});

Flight::route("GET /admins/@username/@password", function ($username, $password) {
    echo "Hello from /admins route with username = " . $username . " and password = " . $password;
});

Flight::start();
?>