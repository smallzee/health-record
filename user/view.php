<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 12:01
 */

require_once '../config/core.php';
if (isset($_GET['id'])){
    $patient_id = $_GET['id'];

    $sql = $db->query("SELECT * FROM patients WHERE id='$patient_id'");
    $data = $sql->fetch(PDO::FETCH_ASSOC);

}
$page_title = "Patient Information";
require_once 'libs/head.php';
?>

<section class="content">
    <div class="row">

        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue-gradient">
                    <h3 class="widget-user-username"><?= ucwords($data['fname']) ?></h3>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="<?= image_url('icon.jpeg') ?>" style="width: 80px; height: 80px;" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $data['gender'] ?></h5>
                                <span class="description-text">Gender</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $data['phone'] ?></h5>
                                <span class="description-text">Phone Number</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><?= $data['email']  ?></h5>
                                <span class="description-text">Email Address</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Patient Information</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Patient Records</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Transfer Records</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <tr>
                                    <td>Card No</td>
                                    <td><?= $data['card_no'] ?></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?= $data['fname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email Address</td>
                                    <td><?= (!empty($data['email'])) ? $data['email'] : 'N/A' ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><?= $data['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?= $data['gender'] ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?= $data['address'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2">


                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
</section>

<?php require_once 'libs/foot.php'?>
