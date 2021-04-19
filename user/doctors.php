<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 09:03
 */

$page_title = "All Doctors";
require_once '../config/core.php';
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

            <div class="table-responsive">
                <table class="table table-bordered" id="example1">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Created At</th>
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
                                    <td><?= $rs['email'] ?></td>
                                    <td><?= $rs['phone'] ?></td>
                                    <td><?= $rs['gender'] ?></td>
                                    <td><?= $rs['address'] ?></td>
                                    <td><?= $rs['created_at'] ?></td>
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
