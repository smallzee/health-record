<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 12/21/20
 * Time: 1:18 PM
 */

    session_start();
    require_once 'func.php';
    define('Env', 'onlin');

    define("DB_PREFIX", "ht_");

    define("HOME_DIR","http://projects.io/web/health-record/");
    define("HTML_TEMPLATE",HOME_DIR.'templates/');
    define("HTML_LIB",HTML_TEMPLATE."assets/");

    define("USER_SESSION_HOLDER", "admin");
    define("DOCTOR_SESSION_HOLDER", "doc");
    define("WEB_TITLE","Medical");
    define("WEB_SUB_TITLE","HA");

    if (Env == "online") {
        define('DB_HOST', 'localhost');
        define('DB_TABLE', 'verajnse_hostel');
        define('DB_USER', 'verajnse_hostel');
        define('DB_PASSWORD', '&b.7LWmCqXYQ');
    }else{
        define('DB_HOST', 'localhost');
        define('DB_TABLE', 'web_fpe_health_record');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
    }

    try {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_TABLE, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }

    catch (PDOException $e){
        die('<br/><center><font size="15">Could not connect with database</font></center>');
    }