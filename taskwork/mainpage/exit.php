<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/29
 * Time: 16:14
 */
session_start();
unset($_SESSION["id"]) ;
header("Refresh:0;url=http://localhost:63342/taskwork/login/login.html");
