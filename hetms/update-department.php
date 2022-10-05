<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];
if ($user_role != 1) {
    header('Location: task-info.php');
}

$dep_id = $_GET['dep_id'];

if (isset($_POST['update_current_department'])) {

    $obj_admin->update_department_info($_POST, $dep_id);
}

$sql = "SELECT * FROM department_info WHERE dep_id='$dep_id' ";
$info = $obj_admin->manage_all_info($sql);
$row = $info->fetch(PDO::FETCH_ASSOC);

$page_name = "Admin";
include("include/sidebar.php");
?>

<div class="row">
    <div class="col-md-12">
        <div class="well well-custom">
            <ul class="nav nav-tabs nav-justified nav-tabs-custom">
                <li><a href="manage-admin.php">Manage Admin</a></li>
                <li><a href="admin-manage-user.php">Manage Employee</a></li>
                <li><a href="admin-manage-department.php">Manage Department</a></li>
            </ul>
            <div class="gap"></div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="well">
                        <h3 class="text-center bg-primary" style="padding: 7px;">Edit Department</h3><br>


                        <div class="row">
                            <div class="col-md-7">
                                <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label class="control-label text-p-reset">Department Name</label>
                                        <div class="">
                                            <input type="text" value="<?php echo $row['dep_name']; ?>" placeholder="Enter Department Name" name="dep_name" list="expense" class="form-control rounded-0" id="default" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label text-p-reset">Department Description</label>
                                        <div class="">
                                            <input type="text" value="<?php echo $row['dep_description']; ?>" placeholder="Enter Department Description" name="dep_description" class="form-control rounded-0" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-3">
                                            <button type="submit" name="update_current_department" class="btn btn-primary-custom">Update Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php

    include("include/footer.php");

    ?>