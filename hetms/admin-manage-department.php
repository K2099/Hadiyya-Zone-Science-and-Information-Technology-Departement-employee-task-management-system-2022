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

if(isset($_GET['delete_department'])){
    $action_id = $_GET['dep_id'];
  
    $sql = "DELETE FROM department_info WHERE dep_id = $action_id";
    $delete_task = $obj_admin->db->prepare($sql);
    $delete_task->execute();

    $task_sql = "DELETE FROM tbl_admin WHERE user_dep_id = $action_id";
    $delete_task = $obj_admin->db->prepare($task_sql);
    $delete_task->execute();

    $sent_po = "admin-manage-department.php";
    $obj_admin->delete_data_by_this_method($sql,$action_id,$sent_po);
  }

$page_name="Admin";
include("include/sidebar.php");

if(isset($_POST['add_new_department'])){
    $error = $obj_admin->add_new_department($_POST);
  }

?>

<!--modal for department add-->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title text-center">Add Department Info</h2>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <?php if(isset($error)){ ?>
                <h5 class="alert alert-danger"><?php echo $error; ?></h5>
                <?php } ?>
              <form role="form" action="" method="post" autocomplete="off">
                <div class="form-horizontal">

                  <div class="form-group">
                    <label class="control-label text-p-reset">Department Name</label>
                    <div class="">
                      <input type="text" placeholder="Enter Department Name" name="dep_name" list="expense" class="form-control input-custom" id="default" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label text-p-reset">Department description</label>
                    <div class="">
                      <input type="text" placeholder="Enter Department description" name="dep_description" class="form-control input-custom" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_new_department" class="btn btn-primary btn-sm rounded-0">Add Department</button>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-default btn-sm rounded-0" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                  
                </div>
              </form> 
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



<!--modal for employee add-->


<div class="row">
      <div class="col-md-12">
        <div class="row">
            
        <div class="well well-custom">
          <?php if(isset($error)){ ?>
          <script type="text/javascript">
            $('#myModal').modal('show');
          </script>
          <?php } ?>
            <?php if($user_role == 1){ ?>
                <div class="btn-group">
                  <button class="btn btn-primary-custom btn-menu" data-toggle="modal" data-target="#myModal">Add New Department</button>
                </div>
              <?php } ?>
          <ul class="nav nav-tabs nav-justified nav-tabs-custom">
            <li><a href="manage-admin.php">Manage Admin</a></li>
            <li><a href="admin-manage-user.php">Manage Employee</a></li>
            <li class="active"><a href="admin-manage-department.php">Manage Departments</a></li>
          </ul>
          <div class="gap"></div>
          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Department Name</th>
                  <th>Description</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM department_info ORDER BY dep_id DESC";
                $info = $obj_admin->manage_all_info($sql);
                $serial  = 1;
                $num_row = $info->rowCount();
                  if($num_row==0){
                    echo '<tr><td colspan="7">No Data found</td></tr>';
                  }
                while( $row = $info->fetch(PDO::FETCH_ASSOC) ){
              ?>
                <tr>
                  <td><?php echo $serial; $serial++; ?></td>
                  <td><?php echo $row['dep_name']; ?></td>
                  <td><?php echo $row['dep_description']; ?></td>
                  <td><a title="Update Department" href="update-department.php?dep_id=<?php echo $row['dep_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                  <a title="Delete" href="?delete_department=delete_department&dep_id=<?php echo $row['dep_id']; ?>" onclick=" return check_delete();"><span class="glyphicon glyphicon-trash"></span></a></td>
                
                </tr>
                
              <?php  } ?>


                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- finally end sidebar code Developer Adam Gebreyohannes-->
