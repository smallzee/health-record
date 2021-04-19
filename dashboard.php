<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-17
 * Time: 13:50
 */

$page_title = "Registered Hospital";
require_once 'config/core.php';
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
                        <th>Hospital Name</th>
                        <th>Address</th>
                        <th>Total Doctors</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Hospital Name</th>
                        <th>Address</th>
                        <th>Total Doctors</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $sql = $db->query("SELECT * FROM hospital  ORDER BY id DESC ");
                        while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?= $sn++ ?></td>
                                <td><?= ucwords($rs['name']) ?></td>
                                <td><?= $rs['address'] ?></td>
                                <td>
                                    <?php
                                        $hospital_id = $rs['id'];
                                        $sql2 = $db->query("SELECT * FROM users WHERE hospital_id='$hospital_id'");
                                        echo $sql2->rowCount();
                                    ?>
                                </td>
                                <td><a href="view.php?id=<?= $rs['id'] ?>" class="btn btn-primary">View</a></td>
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
