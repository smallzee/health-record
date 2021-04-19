<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 09:56
 */

$page_title = "Add New Doctors";
require_once '../config/core.php';
if (isset($_POST['add'])){
    $data = $_POST;

    $fname = $data['fname'];
    $email = $data['email'];
    $phone = $data['phone'];
    $gender = $data['gender'];
    $address = $data['address'];


    $sql1 = $db->query("SELECT * FROM users WHERE email='$email'");
    if ($sql1->rowCount() >= 1){
        $error[] = "Email address has already been registered";
    }


    if (strlen($email) < 8 or strlen($email) > 100){
        $error[] = "Email address should be between 8 - 100 characters";
    }

    if (strlen($phone) != 11 or !is_numeric($phone)){
        $error[] = "Invalid phone number entered";
    }

    $error_count = count($error);
    if ($error_count == 0){


        $hospital_id = doctor_details('hospital_id');

        $db->query("INSERT INTO users (hospital_id,fname,email,gender,address,phone)VALUES ('$hospital_id','$fname','$email','$gender','$address','$phone')");

        set_flash("Doctor account has been created successfully","info");

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

            <?php flash(); ?>

            <form action="" method="post">

                <h5 class="page-header">Doctor Information</h5>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="fname" class="form-control" required placeholder="Full Name" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" required placeholder="Email Address" name="email" id="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" required placeholder="Phone Number" name="phone" id="">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control" required id="">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Residential Address</label>
                            <textarea name="address" class="form-control" required style="resize: none" placeholder="Residential Address"></textarea>
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

<?php require_once 'libs/foot.php'?>
