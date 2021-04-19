<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 11:19
 */

require_once '../config/core.php';
unset($_SESSION['is_loggedin']);
unset($_SESSION[DOCTOR_SESSION_HOLDER]);
set_flash("You have logout successfully","info");
redirect(base_url('user'));