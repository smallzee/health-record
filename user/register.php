<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-17
 * Time: 15:18
 */

$page_title = "Patient Registration";
require_once '../config/core.php';

if (isset($_POST['birth'])){
   $data = $_POST;
   $fname = $data['fname'];
   $email = $data['email'];
   $gender = $data['gender'];
   $birth = $data['birth'];
   $address = $data['address'];
   $phone = $data['phone'];

   $hospital_id = doctor_details('hospital_id');

   if (strlen($fname) < 3 or strlen($fname) > 100){
       $error[] = "Full name should be between 3 - 100 characters";
   }

   if (isset($email)){
       if (strlen($email) < 10 or strlen($email) > 150){
           $error[] = "Email address should between 10 - 150 characters";
       }
   }

   if (strlen($phone) != 11 or !is_numeric($phone)){
       $error[] = "Invalid phone number entered";
   }

   $error_count = count($error);
   if ($error_count == 0){


       $card_no = "";

   }else{
       $msg = ($error_count == 1) ? 'An error occurred' : 'Some error(s) occurred';
       foreach ($error as $value){
           $msg.='<p>'.$value.'</p>';
       }
       set_flash($msg,'danger');
   }
}

require_once 'libs/head.php';
?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <!-- START panel-->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $page_title ?></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">

            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" required name="fname" placeholder="Full Name" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email Address (optional)</label>
                            <input type="email" class="form-control" name="email" placeholder="Email Addrsss (optional)" id="">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" required placeholder="Phone Number" name="phone" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" required class="form-control" id="">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <input type="date" class="form-control" required name="birth" id="">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" required style="resize: none" id="" placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit" name="add" id="">
                </div>
            </form>

        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
