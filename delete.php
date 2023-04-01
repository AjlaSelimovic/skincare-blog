<?php

//for importing the class into index.php:
//because .class.php are ment to be imported not executed

require_once("rest/dao/AdminDao.class.php");


$id = $_REQUEST['id_admin'];

$dao = new AdminsDao();
$dao->delete($id);

echo 'Admin deleted';
?>