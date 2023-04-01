<?php

require_once("rest/dao/AdminsDao.class.php");
$admin_dao = new AdminsDao();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$results = $admin_dao->add($admin);
/* When in insert method are these two parameters at the beginning of the lecture*/
print_r($results);

?>