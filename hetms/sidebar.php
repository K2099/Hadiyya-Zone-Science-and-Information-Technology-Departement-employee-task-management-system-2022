  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <?php if(empty($_SESSION['login_avatar'])): ?>
        <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 38px;height:50px"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0,1).substr($_SESSION['login_lastname'], 0,1)) ?></span>
        <?php else: ?>
          <span class="image">
            <img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" style="width: 38px;height:38px" class="img-circle elevation-2" alt="User Image">
          </span>
        <?php endif; ?>
        <span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_lastname']) ?></span>

      </a>
      <div class="dropdown-menu" style="">
        <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">Manage Account</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
      </div>
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>    
        <?php if($_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Documents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_document" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=document_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>  
        <?php else: ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-is-tree nav-edit_document nav-view_document">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Documents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_document" class="nav-link nav-new_document tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=document_list" class="nav-link nav-document_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>  
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
  </script>
  <!-- finally end task-detail code Developer Adam Gebreyohannes-->