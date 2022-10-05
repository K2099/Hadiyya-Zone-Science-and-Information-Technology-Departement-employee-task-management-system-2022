<?php

require 'authentication.php';
// admin authentication check from Haddiya zone innovation office adminstrator panel

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
$user_role = $_SESSION['user_role'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}


$page_name = "Departments";
include("include/sidebar.php");

$info = "Hello World";
?>

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
            <li>Manage Departments</li>
          </ul>
          <div class="gap"></div>
          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Department Name</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM department_info  ORDER BY dep_id DESC";
                $usersql = "SELECT * FROM tbl_admin ";
                $info = $obj_admin->manage_all_info($sql);
                $userinfo = $obj_admin->manage_all_info($usersql);
                $serial  = 1;
                // $row2 = $info->fetch(PDO::FETCH_ASSOC);
                $num_row = $info->rowCount();
                  if($num_row==0){
                    echo '<tr><td colspan="7">No Data found</td></tr>';
                  }
                while( $row = $info->fetch(PDO::FETCH_ASSOC) ){
                  while( $row2 = $userinfo->fetch(PDO::FETCH_ASSOC)){
                    if( $row['dep_id']==$row2['user_dep_id']){
              ?>
                <tr>
                  <td><?php echo $serial; $serial++; ?></td>
                  <td><?php echo $row['dep_name']; ?></td>
                  <td><?php echo $row['dep_description']; ?></td>
                </tr>
              <?php  }}} ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- finally end department_info code Developer Adam Gebreyohannes-->