<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 2021-04-19
 * Time: 12:12
 */

$page_title = "Transfer Patient To Another Hospital";
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

            <form action="" method="post">
                <div class="form-group">
                    <label for="">All Patients</label>
                    <select name="patient" id="" class="form-control">
                        <option value="" disabled selected>Select</option>
                        <?php
                            $sql = $db->query("SELECT * FROM patients WHERE hospital_id='$hospital_id' ORDER BY id DESC");
                            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <option value="<?= $rs['id'] ?>"><?= $rs['card_no'] ?> (<?= ucwords($rs['fname']) ?>) </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Hospital Name</label>
                    <select name="hospital_id" class="form-control" required id="">
                        <option value="" disabled selected>Select</option>
                        <?php
                            $sql = $db->query("SELECT * FROM hospital WHERE id !='$hospital_id'");
                            while ($rs = $sql->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <option value="<?= $rs['id'] ?>"><?= ucwords($rs['name']) ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="transfer" value="Transfer" id="">
                </div>
            </form>

        </div>
    </div>
</div>

<?php require_once 'libs/foot.php'?>
