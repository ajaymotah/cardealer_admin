<?php
include('pages/cd_menu.php');
include('includes/db_operations.class.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CARDEALER | Dashboard</title>
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
  <link rel="stylesheet" href="plugins/datatables/jquery.dataTables.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Validetta-->
  <link rel="stylesheet" href="plugins/validetta/validetta.min.css">
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
    <a href="index.html" class="brand-link">
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
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
          <section class="col">
      <!-- Display Div-->
            <!-- table-->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of all cars on Sale</h3>
              </div>
              <!-- /.card-header -->
              <?php
              $get_cars=$db_operation->get_all_sales_listings();
               ?>
              <div class="card-body" id="tbl_listings">
                <table id="example2" class="display" width="100%">
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
                          <td><img src="<?php echo $img_link.$lst_cars['listing_image_url'];?>" width="100" height="100"/></td>
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
          <h3 class="card-title">Add New Car Listings</h3>
        </div>
<!-- form-->
<form id="frmAddListing" name="frmAddListing" method="post">

        <div class="card-body">
          <div class="row">
            <div class="col-3">
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
            <div class="col-3">
              <label for="slt_make">Make</label>
              <select class="form-control" name="slt_make" id="slt_make">
                <option value="" selected disabled hidden>Select Make</option>
                <?php
                         $arr_makes=$db_operation->fetch_records('tbl_car_makes');
                         foreach ($arr_makes as $opt_makes) {
                           echo'<option value="'.$opt_makes['make_id'].'">'.$opt_makes['make'].'</option>';
                         }
                        ?>
              </select>
            </div>
            <div class="col-3">
              <label for="slt_model">Model</label>
              <div class="select_model">
                <select class="" name="">
                  <option value=""selected disabled hidden>First select make</option>
                </select>
                      </div>
            </div>
            <div class="col-3">
              <label for="slt_year">Year</label>
              <select class="form-control" name="slt_year" id="slt_year">
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
            <div class="col-3">
              <label for="txt_mileage">Mileage</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                  </div>
                  <input class="form-control" placeholder="Mileage" type="number" name="txt_mileage">
                </div>
            </div>
            <div class="col-3">
              <label for="txt_engine">Engine CC</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-closed-captioning"></i></span>
                  </div>
                  <input class="form-control" placeholder="Engine CC" type="number" name="txt_engine">
                </div>
            </div>
            <div class="col-3">
              <label for="slt_fuel">fuel</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-gas-pump"></i></span>
                </div>
                      <select class="form-control" id="slt_fuel" name="slt_fuel">
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
            <div class="col-3">
              <label for="slt_transmission">Transmission</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                </div>
                      <select class="form-control" id="slt_transmission" name="slt_transmission">
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
                      <div class="col-3">
                        <label for="slt_location">Location</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <select class="form-control" id="slt_location" name="slt_location">
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
                      <div class="col-3">
                        <label for="txt_price">Price (MUR)<div class="show_price"></div></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input class="form-control" placeholder="Price (Rs)" type="number" name="txt_price" id="txt_price">
                          </div>
                      </div>
                      <div class="col-3">
                        <label for="txt_name">Username</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                                <input type="text" class="form-control" placeholder="User name" name="txt_name" id="txt_name">
                              </div>
                      </div>
                      <div class="col-3">
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
                    <form class="frmUploadImg" enctype="multipart/form-data" method="post" accept="image/*">

                    <p></p>
                              <div class="row">
                                <div class="col-5">

                                  <div class="form-group">
                                    <label for="upload_file">Upload Image</label>
                                    <input type="file" id="upload_file" name ="upload_file[]" multiple/>
                                    <span class="text-muted">Only .jpg, .png files allowed - Max Size 5MB - Total 5 Pictures allowed</span>
                                    <span id="error_multiple_files"></span>
                                    <div id="img_count" count="0"></div>

                                    <div id="img1"></div>
                                    <div id="img2"></div>
                                    <div id="img3"></div>
                                    <div id="img4"></div>
                                    <div id="img5"></div>
                    <div class="image_preview"></div>
                          </div>
                          <div class="show_image_preview"></div>
                                </div>
                              </div>

                    <!-- //.Upload image row-->
                    <div class="row">
                      <div class="col-5">
                        <div class="col-5" style="padding-top:15px">
                          <button id="btn_save_listing" name="btn_save_listing" type="button" class="btn btn-success"> Save </button>
                          <button id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger"> Cancel </button></br>
                        </div>
                      </div>
                    </div>
                </form>
        </div>
        <!-- /.card-body -->
      </div>

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2">
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
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
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
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
<script src="custom/custom.js"></script>
<script>
function create_table()
{
    $('#example2').DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "info": true,
    "autoWidth": false,
    "ordering":true
  });
}

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
$('.footer_list').load('pages/cd_footer.html');
create_table();
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
        if(data==1){
          $('.btn_close').trigger("click");
          //$('#example2').DataTable();
          toastr.warning('Listing has been deleted!!!')
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
  $('#upload_file').change(function(){
    var error_images="";
    var name= document.getElementById("upload_file").files[0].name;
    var max_img=<?php echo $max_file_upload; ?>;
    var img_max_size=<?php echo $max_img_file_size; ?>;
    var img_count=$('#img_count').attr('count');
    var ext = name.split('.').pop().toLowerCase();
    var fileUpload = $(this).get(0);
    var files = fileUpload.files;
//alert(files.length);
      //console.log(img_count);
    if(img_count+1>max_img){
      error_images+="You are allowed to upload only max "+max_img+" images";
      $(this).val("");
      //error_images.=
    }

    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
      //console.log(ext);
     error_images += ' Invalid file type';
     //$(this).val("");
    }

    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("upload_file").files[img_count]);
    var f = document.getElementById("upload_file").files[img_count];
    var fsize = f.size||f.fileSize;
    if(fsize > img_max_size)
    {
     error_images +=" You are allowed to upload more than "+img_max_size/1000000+" MB";
    }
alert(error_images);

  if(error_images==""){
    var frmUploadImg=$('.frmUploadImg')[0];
    //$('.image_preview').append("<img src='"+URL.createObjectURL(event.target.files[img_count])+"' width='100' height='100' id='"+URL.createObjectURL(event.target.files[img_count])+"'><br>");
    //var fileUpload = $(this).get(0);
    //var user_id=window.sessionStorage.getItem("user_id");
                        //var files = fileUpload.files;
                        //var max_img=5;
                        if (files.length != 0) {
                            var data = new FormData(frmUploadImg);
                              for (var i = 0; i < files.length ; i++) {
                                data.append("img", files[img_count]);
                                //data.append("user_id",user_id);
                           }
                            $.ajax({
                                contentType: false,
                                processData: false,
                                crossDomain: true,
                                type: 'POST',
                                data: data,
                                url:'ajax/set_img_link.php',
                                beforeSend:function(){
                                  $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
                                  },
                                success: function (response) {
                                  console.log(response);
                                  $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
                                  $('.show_image_preview').append(response);
                                  var img_count=$('#img_count').attr('count');
                                  img_count++;
                                  $('#img_count').attr('count',img_count);
                                  //$('#img'+max_img).attr('src',data);
                                    //console.log(img_count);
                                    //location.href = 'xxx/Index/';
                                }
                            });
                        }
            }
});


});// end Document Ready()

</script>


</body>
</html>
