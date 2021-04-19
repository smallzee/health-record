<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 12/21/20
 * Time: 1:18 PM
 */

$error = array();

function base_url($url = ""){
    if (empty($url)){
        return HOME_DIR;
    }else{
        return HOME_DIR.$url;
    }
}

function page_title($page_title = ""){
    if (empty($page_title)){
        return WEB_TITLE;
    }else{
        return $page_title." &dash; ".WEB_TITLE;
    }
}

function title_page($page_title = ""){
    if (empty($page_title)){
        return ucwords(hospital_details(doctor_details('hospital_id'),'name'));
    }else{
        return $page_title." &dash; ".ucwords(hospital_details(doctor_details('hospital_id'),'name'));
    }
}

function image_url($src){
    return base_url('templates/images/'.$src);
}

function set_flash ($msg,$type){
    $_SESSION['flash'] = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>'.$msg.'</div>';
}

function flash(){
    if (isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
}

function redirect($url){
    header("location:$url");
    exit();
}

function is_login(){
    if (!isset($_SESSION['loggedin'])){
        return 0;
    }else{
        return 1;
    }
}

function is_doc_login(){
    if (!isset($_SESSION['is_loggedin'])){
        return 0;
    }else{
        return 1;
    }
}

function hospital_details($id,$value){
    global $db;
    $sql = $db->query("SELECT * FROM hospital WHERE id='$id'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}

function doctor_details($value){
    global $db;
    $username = $_SESSION[DOCTOR_SESSION_HOLDER]['email'];
    $sql = $db->query("SELECT * FROM users WHERE email='$username'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}

function admin_details($value){
    global $db;
    $username = $_SESSION[USER_SESSION_HOLDER]['username'];
    $sql = $db->query("SELECT * FROM admin WHERE username='$username'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}



function admin_info($id,$value){
    global $db;
    $sql = $db->query("SELECT * FROM admin WHERE id='$id'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}

function student_class($id,$value){
    global $db;
    $sql = $db->query("SELECT * FROM class WHERE id='$id'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}

function term($n){
    if ($n == 1){
        $msg = "First Term";
    }elseif($n == 2){
        $msg = "Second Term";
    }else{
        $msg = "Third Term";
    }
    return $msg;
}

function amount_format($amount){
    return "&#8358;".number_format($amount,2);
}

function checkemail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function hostel_type($id,$value){
    global $db;
    $sql = $db->query("SELECT * FROM hostel_type WHERE id='$id'");
    $rs = $sql->fetch(PDO::FETCH_ASSOC);
    return $rs[$value];
}

function get_json($data){
    echo json_encode($data);
    exit();
}