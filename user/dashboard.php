<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-17
 * Time: 15:13
 */

$page_title = "Dashboard";
require_once '../config/core.php';
require_once 'libs/head.php';
?>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
        <span class="info-box-icon"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
            <span class="info-box-text mt-10">All Patients</span>
            <span class="info-box-number">

            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="info-box bg-blue-gradient">
        <span class="info-box-icon"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
            <span class="info-box-text mt-10">All Doctors</span>
            <span class="info-box-number">

            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Registered Patients</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="example3">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Registered Doctors</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="example3">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $sql = $db->query("SELECT * FROM users WHERE hospital_id='$hospital_id'");
                        while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $rs['fname'] ?></td>
                                <td><?=$rs['email'] ?></td>
                                <td><?= $rs['phone'] ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'libs/foot.php';?>
