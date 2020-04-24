<?php
include('pages/cd_menu.php');
include('includes/db_operations.class.php');
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
            <h1 class="m-0 text-dark">Car Rentals</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $sales_listing_count=$db_operation->get_count_tbl("tbl_listings","listing_type_id",1);
                 ?>
                <h3><?php echo $sales_listing_count; ?></h3>

                <p>Total Sales Listings</p>
              </div>
              <div class="icon">
                <i class="fa fa-car"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $rental_listing_count=$db_operation->get_count_tbl("tbl_listings","listing_type_id",4);
                 ?>
                <h3><?php echo $rental_listing_count; ?></h3>

                <p>Total Car Rentals</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $active_users_count=$db_operation->get_count_tbl("tbl_users","user_status_id",1);
                 ?>
                <h3><?php echo $active_users_count; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $pending_listing_count=$db_operation->get_count_tbl("tbl_listings","listing_status_id",3);
                 ?>
                <h3><?php echo $pending_listing_count; ?></h3>

                <p>Pending Listings</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12">
      <!-- Display Div-->
            <!-- table-->


            <!-- Pending listings-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Pending Car Rentals </h3>
              </div>
              <!-- /.card-header -->
              <?php
              $get_pending_listings=$db_operation->get_all_pending_listings(4);
               ?>
              <div class="card-body" id="tbl_listings">
                <table id="lst_pendings" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Listing ID</th>
                    <th>User ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Images</th>
                    <th>Date Posted</th>
                    <th>Sale Price</th>
                    <th>Approve</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($get_pending_listings as $lst_pending_cars) {?>
                       <tr id="<?php echo "tr_".$lst_pending_cars['listing_id']; ?>">
                          <td><a class="td_pending" id ="<?php echo $lst_pending_cars['listing_id']; ?>" href="#"data-toggle="modal" data-target="#modal_view_details"><?php echo $lst_pending_cars['listing_id']; ?></a></td>
                          <td><a class="td_user_id" id="<?php echo $lst_pending_cars['user_id']; ?>" href="#"><?php echo $lst_pending_cars['user_id']; ?></a></td>
                          <td><?php echo $lst_pending_cars['make']; ?></td>
                          <td><?php echo $lst_pending_cars['model']; ?></td>
                          <td><?php
                            $img_listing_id=$lst_pending_cars['listing_id'];
                            $lst_images=$db_operation->get_images($img_listing_id);
                            foreach ($lst_images as $key=>$arr_images) {?>

                              <img src="<?php echo $img_link.$arr_images;?>" width="100" height="100"/>
                          <?php  }?>



                          </td>
                          <td><?php echo $lst_pending_cars['date_posted']; ?></td>
                          <td><?php echo $lst_pending_cars['sale_price']; ?></td>

                          <!--<td><button id="btn_details" type="button" class="btn btn-success btn_approve_pending" data-toggle="modal" data-target="#modal-user-details">Details</button></td>-->
                          <td><button id="<?php echo $lst_pending_cars['listing_id'];?>" type="button" class="btn btn-success btn_approve_pending" data-toggle="modal" data-target="#modal-approve">Approve</button></td>
                          <td><button id="<?php echo $lst_pending_cars['listing_id'];?>" type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#modal-delete">Delete</button></td>
                        </tr>
                  <?php  }  ?>
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
                <h4 class="modal-title">Approve Listing</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal_lst">

                </div>
                <p>Are you sure you want to approve the listing?</p>
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
                <h3 class="card-title">List of all Car Rentals</h3>
              </div>
              <!-- /.card-header -->
              <?php
              $get_cars=$db_operation->get_all_rental_listings();
               ?>
              <div class="card-body" id="tbl_listings">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Listing ID</th>
                    <th>User ID</th>
                    <th>Make</th>
                    <th>Image</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($get_cars as $lst_cars) {?>
                       <tr id="<?php echo "tr_".$lst_cars['listing_id']; ?>">
                          <td><?php echo $lst_cars['listing_id']; ?></td>
                          <td><a href=""><?php echo $lst_cars['user_id']; ?></a></td>
                          <td><?php echo $lst_cars['make']; ?></td>
                          <td><img src="<?php echo $remote_img_link.$lst_cars['listing_image_url'];?>" width="100" height="100"/></td>
                          <td><?php echo $lst_cars['date_posted']; ?></td>
                          <td><?php echo $lst_cars['listing_status']; ?></td>
                          <td><a class="btn btn-success" href="payments.php?id=<?php ?>">Payment</a></td>
                          <td><a class="btn btn-warning" href="edit_listing.php?id=<?php ?>">Edit</a></td>

                          <td><button id="<?php echo $lst_cars['listing_id'];?>" type="button" class="btn btn-danger btn_delete" data-toggle="modal" data-target="#modal-delete">Delete</button></td>
                        </tr>
                  <?php  }  ?>
                </tbody>
              <!--<tfoot>
                <tr>
                  <th>Listing ID</th>
                  <th>user_id</th>
                  <th>Make</th>
                  <th>Model</th>
                  <th>Image</th>
                  <th>Date Posted</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>-->
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
              <h4 class="modal-title">Delete Listing</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete the listing?</p>
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
          <h3 class="card-title">Add Car Rental Listings</h3>
        </div>
<!-- form-->
<form id="frmAddListing" name="frmAddListing" method="post">

        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <label for="slt_listing_type">Listing Type</label>
              <div class="input-group mb-3">
              <select class="form-control" name="slt_listing_type" id="slt_listing_type">
              <option value="4">Car Rentals</option>
              </select>
            </div>
            </div>

            <div class="col-md-3">
              <label for="slt_listing_type">Region</label>
              <div class="input-group mb-3">
              <select class="form-control" name="slt_region" id="slt_region">
              <option value="" selected disabled hidden>Select Region</option>
              <?php
                        $arr_regions=$db_operation->fetch_records('tbl_regions');

                        foreach (  $arr_regions as $opt_regions) {
                          echo'<option value="'.$opt_regions['region_id'].'">'.$opt_regions['region'].'</option>';
                        }
                       ?>
              </select>
            </div>
            </div>
            <div class="col-md-3">
              <label for="slt_location">Location</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  <select class="form-control" id="slt_location" name="slt_location" data-validetta="required">
                <option value="" selected disabled hidden>Select Location</option>
                <?php
                  $arr_location=$db_operation->fetch_records('tbl_locations');
                  foreach ($arr_location as $opt_location) {
                    echo'<option value="'.$opt_location['location_id'].'">'.$opt_location['locations'].'</option>';
                  }
                 ?>
              </select>
                </div>
            </div>
          </div>



          <div class="row">
            <div class="col-md-3">
              <label for="slt_condition">Condition</label>
              <select class="form-control" name="slt_condition" id="slt_condition">
                <option value="" selected disabled hidden>Select Condition</option>
                <?php
                          $arr_conditions=$db_operation->fetch_records('tbl_vehicle_conditions');

                          foreach ($arr_conditions as $opt_conditions) {
                            echo'<option value="'.$opt_conditions['vehicle_condition_id'].'">'.$opt_conditions['vehicle_condition'].'</option>';
                          }
                         ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="slt_make">Make</label>
              <select class="form-control" name="slt_make" id="slt_make" data-validetta="required">
                <option value="" selected disabled hidden>Select Make</option>
                <?php
                         $arr_makes=$db_operation->fetch_records('tbl_car_makes');
                         foreach ($arr_makes as $opt_makes) {
                           echo'<option value="'.$opt_makes['make_id'].'">'.$opt_makes['make'].'</option>';
                         }
                        ?>
              </select>
            </div>
            <div class="col-md-3">
              <label for="slt_model">Model</label>
              <div class="select_model col-3-xs-1">
                <!-- <select class="" name="">
                  <option value=""selected disabled hidden>First select make</option>
                </select> -->
                      </div>
            </div>
            <div class="col-md-3">
              <label for="slt_year">Year</label>
              <select class="form-control" name="slt_year" id="slt_year" data-validetta="required">
                <option value="" selected disabled hidden>Select Year</option>
                <?php
                          $arr_year=$db_operation->GetCarYear();
                          foreach ($arr_year as $opt_year) {
                            echo'<option value="'.$opt_year.'">'.$opt_year.'</option>';
                          }
                         ?>
              </select>
            </div>
          </div>
<p></p>
          <div class="row">
            <div class="col-md-3">
              <label for="txt_mileage">Mileage</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                  </div>
                  <input class="form-control" placeholder="Mileage" type="number" name="txt_mileage">
                </div>
            </div>
            <div class="col-md-3">
              <label for="txt_engine">Engine CC</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-closed-captioning"></i></span>
                  </div>
                  <input class="form-control" placeholder="Engine CC" type="number" name="txt_engine">
                </div>
            </div>
            <div class="col-md-3">
              <label for="slt_fuel">fuel</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-gas-pump"></i></span>
                </div>
                      <select class="form-control" id="slt_fuel" name="slt_fuel" data-validetta="required">
                        <option value="" selected="" disabled="" hidden="">Select Fuel</option>
                        <?php
                     $arr_fuel=$db_operation->fetch_records('tbl_fuel');
                     foreach ($arr_fuel as $opt_fuel) {
                       echo'<option value="'.$opt_fuel['fuel_id'].'">'.$opt_fuel['fuel'].'</option>';
                     }
                    ?>
                      </select>
                    </div>
            </div>
            <div class="col-md-3">
              <label for="slt_transmission">Transmission</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                </div>
                      <select class="form-control" id="slt_transmission" name="slt_transmission" data-validetta="required">
                        <option value="" selected="" disabled="" hidden="">Select Transmission</option>
                        <?php
                            $arr_transmission=$db_operation->fetch_records('tbl_transmission');
                            foreach ($arr_transmission as $opt_transmission) {
                              echo'<option value="'.$opt_transmission['transmission_id'].'">'.$opt_transmission['transmission'].'</option>';
                            }
                           ?>
                      </select>
                    </div>
            </div>
          </div>

          <p></p>
                    <div class="row">

                      <div class="col-md-3">
                        <label for="txt_price">Price (MUR) / Per Day<div class="show_price"></div></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input class="form-control" placeholder="Price (Rs)" type="number" name="txt_price" id="txt_price" data-validetta="required">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <label for="txt_name">Username</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                                <input type="text" class="form-control" placeholder="User name" name="txt_name" id="txt_name">
                              </div>
                      </div>
                      <div class="col-md-3">
                        <label for="txt_phone">Mobile Number</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                          </div>
                              <input type="number" class="form-control" placeholder="Phone Number" name="txt_phone" id="txt_phone">
                              </div>
                      </div>
                    </div>
                      </form>

                    <!-- upload image row-->
                    <form class="frmUploadImg" enctype="multipart/form-data" method="post">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="file[]">Upload Image</label>
                                    <div id="filediv">
                                      <input name="file[]" type="file" class="file" id="img0" accept="image/*"/>
                                    </div>
                                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                                    <p></p>
                                    <span class="text-muted">Only .jpg, .png files allowed - Max Size 5MB - Total 5 Pictures allowed</span>
                                    <span id="error_multiple_files"></span>
                                    <div id="img_count" count="0"></div>

                    <div class="image_preview"></div>
                          </div>
                          <div class="show_image_preview"></div>
                                </div>
                              </div>

                    <!-- //.Upload image row-->
                    <div class="row">

                        <div class="col-md-6" style="padding-top:15px">
                          <button id="btn_save_listing" name="btn_save_listing" type="button" class="btn btn-success"> Save </button>
                          <button id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger"> Cancel </button></br>
                        </div>

                    </div>
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

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

$(document).ready(function(){
//Loading script//
//$('html').ploading({action: 'show'});
//create_table();


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
$('.btn_delete').click(function () {
  var listing_id= $(this).attr('id');
  $('#tr_'+listing_id).hide();

  //alert(listing_id);
  $('.btn_modal_delete').attr('id',listing_id);
});
$('.btn_modal_delete').click(function () {
    var listing_id= $(this).attr("id");
    //alert(listing_id);
    $.ajax({
      type:"POST",
      url:"ajax/delete_listing.php",
      data:{listing_id:listing_id},
      success:function (data) {
        console.log(data);
        if(data==1){
          $('.btn_close').trigger("click");
          //$('#example2').DataTable();
          toastr.warning('Listing has been deleted!!!')
        }
      }
    });
    //$("tr_"+listing_id).hide();
});
//Approve btn functions
$('.btn_approve_pending').click(function () {
  var listing_id= $(this).attr('id');
  $('#tr_'+listing_id).hide();
  $('.btn_modal_approve').attr('id',listing_id);
})
//Approve modal btn click
$('.btn_modal_approve').click(function () {
    var listing_id= $(this).attr("id");
    //alert(listing_id);
    $.ajax({
      type:"POST",
      url:"ajax/approve_listing.php",
      data:{listing_id:listing_id},
      success:function (data) {
        //console.log(data);
        if(data==1){
          $('.btn_close').trigger("click");
          //$('#example2').DataTable();
          Swal.fire({
       type: 'success',
       title: 'Listing has been successfully put on live'
     })

     // post to Facebook Page
     $.ajax({
       type:"POST",
       url:"facebook_config/postpage.php",
       data:{listing_id:listing_id},
       success:function (posted) {
         console.log(posted);

       }
     });





        }
      }
    });
    //$("tr_"+listing_id).hide();
});





//Add listing functions
$('#slt_make').change(function () {
  $car_make_id=$('#slt_make').val();
  $.ajax({
          type: "POST",
          url: "ajax/get_model.php",
          data:{make_id:$car_make_id},
          success: function(msg) {
            $('.select_model').html(msg)
            //console.log(msg);
          },
          error: function() {console.log();}
        });
});
$("#slt_year").change(function () {
  $("#row_2").removeAttr("hidden");
});

$("#slt_transmission").change(function () {
  $("#row_3").removeAttr("hidden");
});
$("#txt_price").keyup(function () {
  var txt_price=$(this).val();
  var show_price = addCommas(txt_price);
  $(".show_price").text(show_price);
});


//image upload function
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
var img_count=$('#img_count').attr('count');
var error_message=0;
var max_img_size=<?php echo $max_img_file_size; ?>;
var max_img=<?php echo $max_file_upload; ?>;

$('#add_more').click(function() {

$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
class: 'file',
id:'img'+img_count,
accept:'image/*'
})));
});

var img_count=$('#img_count').attr('count');
var error_images='';

// Following function will executes on change event of file input to select different file.
$('body').on('change', '.file', function() {
//Validate image extension
var name= $('#img'+img_count).prop("files")[0]['name'];
var ext = name.split('.').pop().toLowerCase();

if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
{
 error_images += ' Invalid file type';
 alert(error_images);
}
//Validate image size
var f =  $('#img'+img_count).prop("files")[0];
var fsize = f.size||f.fileSize;
//alert(fsize);
 if(fsize > max_img_size)
 {
  error_images +=" You are allowed to upload more than "+max_img_size/1000000+" MB";
  alert(error_images);
 }
 //Validate max image uploaded
if(img_count>max_img-1)
{
error_images +=" You are allowed to upload only "+max_img+" images";
  alert(error_images);
}



if (this.files && this.files[0] && error_images=="") {
img_count ++; // Incrementing global variable by 1.
$('#img_count').attr('count',img_count);
var z = img_count - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='img_preview" + img_count + "' class='img_preview'><img id='previewimg" + img_count + "' src=''/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#img_preview" + img_count).append($("<img/>", {
id: 'img',
src: 'dist/img/x.png',
alt: 'delete'
}).click(function() {
$(this).parent().parent().remove();
img_count=img_count-1;
$('#img_count').attr('count',img_count);
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + img_count).attr('src', e.target.result);
};

$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});


$('#btn_save_listing').click(function (e) {
//save form data to DB
//alert('asdasd');
var frm_save_listing= new FormData($('#frmAddListing')[0]);
$.ajax({
  type:"post",
  url:"ajax/save_rental_listing.php",
  data:frm_save_listing,
  cache: false,
  contentType: false,
  processData: false,

  success:function(listing_id){
    console.log(listing_id);
    //var listing_id=1;
    var formData = new FormData($('.frmUploadImg')[0]);
      $.ajax({
          type:"post",
          url:"ajax/upload_img.php?id="+listing_id,
          data:formData,
          cache: false,
        contentType: false,
        processData: false,
          beforeSend:function () {
            console.log("Saving");
          },
          success:function(img_arr){
            console.log(img_arr);
            Swal.fire({
         type: 'success',
         title: 'Listing has been saved'
       })
            console.log(img_arr);
          }
        })
      }
  })
});
//modal to show user details
$(".td_user_id").mouseover(function()
  {
    var id=$(this).attr('id');
    $.ajax({



    });
    alert(id);
  });

});// end Document Ready()//

</script>
</body>
</html>
