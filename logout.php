<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-17
 * Time: 15:02
 */

require_once 'config/core.php';
set_flash("You have logout successfully","info");
unset($_SESSION['loggedin']);
unset($_SESSION[USER_SESSION_HOLDER]);
redirect(base_url());
