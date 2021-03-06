<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 09:59
 */

$page_title = "All Patients";
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
                        <th>Card No.</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Card No.</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $sql = $db->query("SELECT * FROM patients WHERE hospital_id='$hospital_id'");
                        while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= $rs['card_no'] ?></td>
                                <td><?= $rs['fname'] ?></td>
                                <td><?= (!empty($rs['email'])) ? $rs['email'] : 'N/A'?></td>
                                <td><?= $rs['phone'] ?></td>
                                <td><?= $rs['gender'] ?></td>
                                <td><?= $rs['birth'] ?></td>
                                <td>
                                    <?php
                                        $b = explode("-",$rs['birth'])[0];
                                        echo  date('Y') - $b;
                                    ?>
                                </td>
                                <td><?= $rs['address'] ?></td>
                                <td><?= $rs['created_at'] ?></td>
                                <td><a href="view.php?id=<?= $rs['id'] ?>" class="btn btn-primary btn-sm">View</a></td>
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


<?php require_once 'libs/foot.php'?>
