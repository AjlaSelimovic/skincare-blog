<?php
/* We want to create the connection, so we will call AdminDao.class*/
/*We are importin the file by this require_once */

require_once("rest/dao/AdminsDao.class.php");

/*We are creating the object of this AdminsDao.class */
/*Object is calling the constructor, and constructor is juct connection */
$student_dao = new AdminsDao();

/* We want the results for get_all method, here we will get it*/
/* We don't have the results now, error is*/
$results = $admin_dao->get_all();
print_r($results);

?>