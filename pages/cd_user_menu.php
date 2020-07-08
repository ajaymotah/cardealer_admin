<script type="text/javascript">
function activate_link(){
  var page_url=location.pathname.split('/').slice(-1)[0]
$('a[href="'+page_url+'"').addClass('active');
}
</script>
<?php
// require_once('includes/page_display.class.php');
// $span_user=$display_page->get_menu_count('tbl_users','user_status_id',2);
if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
$row=$db_operation->find_by_id('tbl_users','user_id',$user_id);
$username=$row['name'];
}
$menu_list='
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Welcome, '.$username.'</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
             <a href="user_dashboard.php" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>Dashboard</p>
             </a>
           </li>

      <li class="nav-item">
        <a href="ajax/do_logout.php" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Log Out
            <!--<span class="right badge badge-danger">New</span>-->
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>';
?>
