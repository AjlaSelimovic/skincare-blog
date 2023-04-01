<?php
require "../vendor/autoload.php";
require "dao/AdminsDao.class.php";

Flight::register('admin_dao', "AdminsDao");

/*This is default route that runs in the browser */
Flight::route("/", function () {
    echo "Hello from / route";
});

Flight::route("GET /admins", function () {
    Flight::json(Flight::admin_dao()->get_all());

});

Flight::route("GET /admins/@id", function ($id) {
    Flight::json(Flight::admin_dao()->get_by_id($id));
});

Flight::route("DELETE /admins/@id", function ($id) {
    Flight::admin_dao()->delete($id);
    Flight::json(['message' => "Admin deleted successfully"]);
});

Flight::route("POST /admin", function () {
    $request = Flight::request()->data->getData();
    Flight::json([
        'message' => "Admin added successfully",
        'data' => Flight::admin_dao()->add($request)
    ]);
});

Flight::route("GET /admin_by_id", function () {
    /*We need to provide id in the url for this method, ex /12 */

    //$id = Flight::request()->query['id'];
    //Flight::json(Flight::admin_dao()->get_by_id($id));

        Flight::json(
          Flight::admin_dao()->get_by_id(
            Flight::request()->query['id']
      )
    );
});

Flight::route("PUT /admin/@id", function ($id) {
    $admin = Flight::request()->data->getData();
    //?id=12 in url
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