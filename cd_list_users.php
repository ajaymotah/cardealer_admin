<?php
include('includes/db_operations.class.php');
include('pages/cd_menu.php');

if(!isset($_SESSION['user_id'])){
  header('location:pages/cd_login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CARDEALER | Car Rentals</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">
  <!--<link rel="stylesheet" href="plugins/datatables/jquery.dataTables.css">-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Validetta-->
  <link rel="stylesheet" href="plugins/validetta/validetta.min.css">
  <!-- img upload css-->
  <link rel="stylesheet" href="custom/upload_img.css">
  <!-- tooltip css-->
  <link rel="stylesheet" href="custom/tooltip.css">
  <!-- loading spinner-->
  <link rel="stylesheet" type="text/css" href="p-loading/dist/css/p-loading.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo-light.png" alt="CARDEALER" width="200" style="opacity: .8">
      <!-- <span class="brand-text font-weight-light">CARDEALER</span> -->
    </a>
    <?php echo $menu_list;?>
    <!--<div class="menu_list"><div>-->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item active">Home</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12">
      <!-- Display Div-->
            <!-- table-->


            <!-- Pending listings-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of All Pending Users</h3>
              </div>
              <!-- /.card-header -->
              <?php
              $user_data=$db_operation->get_user_details(2);
               ?>
              <div class="card-body" id="tbl_pending_users">
                <table id="lst_pendings" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>User Role</th>
                    <th>User Status</th>
                    <th>Payment</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($user_data){
                    foreach ($user_data as $lst_user_data) {?>
                       <tr id="<?php echo "tr_".$lst_user_data['user_id']; ?>">
                          <td><?php echo $lst_user_data['user_id']; ?></td>
                          <td><?php echo $lst_user_data['surname']; ?></td>
                          <td><?php echo $lst_user_data['name']; ?></td>
                          <td><?php echo $lst_user_data['phone']; ?></td>
                          <td><?php echo $lst_user_data['role']; ?></td>
                          <td><?php echo $lst_user_data['user_status']; ?></td>
                          <td>payments</td>
                          <!-- <td><a class="btn btn-success" href="payments.php?id=<?php ?>">Payment</a></td> -->
                          <td><button id="<?php echo $lst_user_data['user_id'];?>" type="button" class="btn btn-success btn_approve_pending" data-toggle="modal" data-target="#modal-approve" table="tbl_users">Approve</button></td>

                          <td><button id="<?php echo $lst_user_data['user_id'];?>" table="tbl_users" type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#modal-delete" table="tbl_users">Delete</button></td>
                        </tr>
                  <?php  }
                }?>
                </tbody>
            </table>
          </div>
              <!-- /.card-body -->
        </div>

              <!-- modal for view all details -->
        <div class="modal fade" id="modal-approve">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Approve New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal_lst">

                </div>
                <p>Are you sure you want to approve this user?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn_modal_approve">Approve</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- End modal for view all details -->
        <!--//End Pending Listings-->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of all Active Users</h3>
          </div>
          <!-- /.card-header -->
          <?php
          $get_active_users=$db_operation->get_user_details(1);
           ?>
          <div class="card-body" id="tbl_listings">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>User ID</th>
                <th>Surname</th>
                <th>name</th>
                <th>Phone</th>
                <th>User Role</th>
                <th>User Status</th>
                <!-- <th>Payment</th> -->
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach ($get_active_users as $lst_active_users) {?>
                   <tr id="<?php echo "tr_".$lst_active_users['user_id']; ?>">
                      <td><?php echo $lst_active_users['user_id']; ?></td>
                      <td><?php echo $lst_active_users['surname']; ?></td>
                      <td><?php echo $lst_active_users['name']; ?></td>
                      <td><?php echo $lst_active_users['phone']; ?></td>
                      <td><?php echo $lst_active_users['role']; ?></td>
                      <td><?php echo $lst_active_users['user_status']; ?></td>
                      <td><a class="btn btn-warning" href="edit_listing.php?id=<?php ?>">Edit</a></td>
                      <td><button id="<?php echo $lst_active_users['user_id'];?>" type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#modal-delete" table="tbl_users">Delete</button></td>
                    </tr>
              <?php  }  ?>
            </tbody>
          </table>
          </div>
          <!-- /.card-body -->
        </div>

            <!--// end table-->
      <!--// Display Div-->
      <!--- Modal form-->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger btn_modal_delete">Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add New User</h3>
        </div>
<!-- form-->
<form id="frmAddUsers" name="frmAddUsers" method="post">

        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <label for="slt_user_type">User Type</label>
              <div class="input-group mb-3">
                <select class="form-control" name="slt_user_role_type" id="slt_user_role_type">
                  <option value="" selected disabled hidden>Select user Type</option>
                  <?php
                            $get_user_roles=$db_operation->fetch_records('tbl_user_roles');

                            foreach ($get_user_roles as $lst_user_roles) {
                              echo'<option value="'.$lst_user_roles['user_role_id'].'">'.$lst_user_roles['role'].'</option>';
                            }
                           ?>
                </select>
            </div>
            </div>
            <div id="phone_search_result">

            </div>
          </div>
            <div class="row">
            <div class="col-md-3">
              <label for="txt_phone">Phone Number</label>
              <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "8" name="txt_phone" id="txt_phone" class="form-control" data-validetta="required">
              </div>
            <div class="col-md-3">
              <label for="txt_surname">Surname</label>
              <input type="text" name="txt_surname" id="txt_surname" class="form-control" data-validetta="required">
            </div>
            <div class="col-md-3">
              <label for="txt_surname">Name</label>
              <input type="text" name="txt_name" id="txt_name" class="form-control" data-validetta="required">
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <label for="txt_pin">Pin</label>
              <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "4" name="txt_pin" id="txt_pin" class="form-control" data-validetta="required,number,minLength[4],maxLength[4]">
            </div>

            <div class="col-3">
              <label for="txt_re_pin">Re Enter Pin</label>
              <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number" maxlength = "4" name="txt_re_pin" id="txt_re_pin" class="form-control" data-validetta="required, required,number,minLength[4],maxLength[4],equalTo[txt_pin]">
            </div>
            <div class="col-3">
              <label for="txt_email">Email</label>
              <input type = "email" name="txt_email" id="txt_email" class="form-control" data-validetta="required,email">
            </div>
          </div>
<p></p>

            <div class="row">

                <div class="col-md-6" style="padding-top:15px">
                  <button id="btn_save_user" name="btn_save_user" type="button" class="btn btn-success"> Save </button>
                  <button id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger"> Cancel </button></br>
                </div>

            </div>


          <p></p>
      </form>
        </div>
        <!-- /.card-body -->
      </div>

            <!-- TO DO List -->

          </section>
          <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="footer_list"></div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Validetta -->
<script src="plugins/validetta/validetta.min.js"></script>
<!-- P-Loading JS -->
<script type="text/javascript" src="p-loading/dist/js/p-loading.min.js"></script>
<script src="custom/custom.js"></script>
<script>

$(function (){
  //$('#test').DataTable();
  $('#lst_pendings').DataTable({
  "responsive": true,
  "paging": true,
  "lengthChange": false,
  "searching": false,
  "info": true,
  "autoWidth": false,
  "ordering":true,
  "order":[[0,"desc"]],
});
    $('#example2').DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "info": true,
    "autoWidth": false,
    "ordering":true,
    "order":[[0,"desc"]],
  });
});

//Toastr Function
$(function() {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
});

$(document).ready(function(){
activate_link();
$('.footer_list').load('pages/cd_footer.html');
//show pending listing details on modal
$('.td_pending').click(function () {
  var listing_id=$(this).attr('id');
  $.ajax({
    type:"POST",
    url:"ajax/get_all_pending_details.php",
    data:{listing_id:listing_id},
    success:function (data) {
      $('.modal_lst').html(data);
      //console.log(data);
      if(data==1){
        $('.btn_close').trigger("click");
        //$('#example2').DataTable();
        toastr.warning('Listing has been deleted!!!')
      }
    }
  });

});

//delete listing function
$('#example2,#lst_pendings').on('click','.btn_delete',function(){
  var id= $(this).attr('id');
  var table=$(this).attr('table');
  $('.btn_modal_delete').attr('id',id);
  $('.btn_modal_delete').attr('table',table);
});
$('.btn_modal_delete').click(function () {
    var id= $(this).attr("id");
    var table= $(this).attr("table");
    //alert(listing_id);
    $.ajax({
      type:"POST",
      url:"ajax/delete_record.php",
      data:{id:id,table:table,field:'user_id'},
      success:function (data) {
        //console.log(data);
        if(data==1){

          $('.btn_close').trigger("click");
          $('#example2 #tr_'+id).hide();
          $('#lst_pendings #tr_'+id).hide();

          toastr.warning('Listing has been deleted!!!')
        }
      }
    });
    //$("tr_"+listing_id).hide();
});
//Approve btn functions
$('#lst_pendings').on('click','.btn_approve_pending',function () {
  var user_id= $(this).attr('id');
$('.btn_modal_approve').attr('id',user_id);
$('.btn_modal_approve').attr('table','tbl_users');
})

//Approve modal btn click
$('.btn_modal_approve').click(function () {
    var user_id= $(this).attr('id');
    var table=$(this).attr('table');
    //alert(user_id);
    $.ajax({
      type:"POST",
      url:"ajax/update_record.php",
      data:{where_field:user_id,where_value:'user_id',table:table,set_field:'user_status_id',set_value:'1'},
      success:function (data) {
        console.log(data);
        if(data==1){
          $('.btn_close').trigger("click");
          //$('#example2').DataTable();
          Swal.fire({
       type: 'success',
       title: 'User has been successfully set Active'
     }),
     $('#lst_pendings #tr_'+user_id).hide();
     $("#example2").load(location.href + " #example2");

     // post to Facebook Page - NEW User Joined
     // $.ajax({
     //   type:"POST",
     //   url:"facebook_config/postpage.php",
     //   data:{listing_id:listing_id},
     //   success:function (posted) {
     //     console.log(posted);
     //   }
     // });
        }
      }
    });
    //$("tr_"+listing_id).hide();
});

//find user details by Phone number if already exists
$('#txt_phone').keyup(function () {
  var lst_phone=$(this).val();
  if(lst_phone!='' && lst_phone.length>=8){
  $.ajax({
    type:"POST",
    url:"ajax/find_user_phone_exists.php",
    data:{txt_phone:lst_phone},
    success:function (data) {
      console.log(data);
      if(data==false){
        $('#phone_search_result').html('Phone number not found');
      }
      else {
        $('#phone_search_result').html(data);
      }
    }
  });//end ajax
  }

  //$('#phone_search_result').html(lst_phone);
});

//save new user as pending
$('#btn_save_user').click(function () {

  $('#frmAddUsers').validetta({
    display : 'inline',
    errorTemplateClass : 'validetta-inline',
    realTime:true,

       onValid : function( event ) {
            event.preventDefault();
            var frm_add_user_data={
              user_role_id:$('#slt_user_role_type').val(),
              user_status_id:2,
              phone:$('#txt_phone').val(),
              surname:$('#txt_surname').val(),
              name:$('#txt_name').val(),
              pin:$('#txt_pin').val(),
              email:$('#txt_email').val(),
              table:'tbl_users'
            }
            $.ajax({
              type:"POST",
              url:"ajax/insert_record.php",
              data:frm_add_user_data,
              success:function (data) {
                //console.log(data);
                Swal.fire({
             type: 'success',
             title: 'User has been saved'
           }),
           //relaods the div data !!! :)
           $("#lst_pendings").load(location.href + " #lst_pendings");

              }
            });
        }
  })

});

//
});// end Document Ready()


</script>
</body>
</html>
