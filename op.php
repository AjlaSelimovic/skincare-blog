<?php
/*operation php */

require_once("rest/dao/AdminsDao.class.php");
$admin_dao = new AdminsDao();

/*Anytime the request is sent, we specify the operation we want to perform */

$type = $_REQUEST['type'];

switch ($type) {

    case 'add':

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $results = $admin_dao->add($username, $password);
        print_r($results);
        break;

    case 'delete':

        $id = $_REQUEST['id_admin'];
        $admin_dao->delete($id);
        break;

    case 'update':

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $id = $_REQUEST['id_admin'];
        $admin_dao->update($username, $password, $id);
        break;

    case 'get':

    default:

        $results = $admin_dao->get_all();
        print_r($results);
        break;
}

?>