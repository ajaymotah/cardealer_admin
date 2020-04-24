<?php
require('../includes/db_operations.class.php');
$slt_role=$db_operation->fetchAll('tbl_user_roles');
foreach ($slt_role as $key => $value) {
  unset($slt_role[0]);
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CARDEALER | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Validetta  -->
  <link rel="stylesheet" href="../plugins/validetta/validetta.min.css">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.html"><img src="../dist/img/logo-dark.png" width="250" alt=""></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="post" id="frmAddUser">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" id="txt_username" name="txt_username" data-validetta="required">
          <div class="input-group-append input-group-text">
              <span class="fas fa-user"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="txt_email" name="txt_email" data-validetta="required,email">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" placeholder="Mobile Number" maxlength="8" id="txt_phone" name="txt_phone" data-validetta="required,number,minLength[8],maxLength[8]">
          <div class="input-group-append input-group-text">
              <span class="fas fa-mobile"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" type="number" class="form-control" placeholder="Type a 4 Digit PIN" data-validetta="required,number,minLength[4],maxLength[4]" id="txt_pin" name="txt_pin">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" type="number" class="form-control" placeholder="Retype PIN" data-validetta="required,number,minLength[4],maxLength[4],equalTo[txt_pin]" id="txt_re_pin" name="txt_re_pin">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <select class="form-control" id="slt_role" name="slt_role" data-validetta="required">
            <option value="" val="">Select a role</option>
            <?php
              foreach($slt_role as $opt_role){
                //unset($opt_role[0]);
                echo'<option value="'.$opt_role['user_role_id'].'" val="'.$opt_role['user_role_id'].'">'.$opt_role['role'].'</option>';
              }

             ?>
          </select>

          <div class="input-group-append input-group-text">
              <span class="fas fa-user"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!--<div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="btn_register" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <a href="cd_login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Validetta -->
<script src="../plugins/validetta/validetta.min.js"></script>
<script type="text/javascript">

  $(document).ready(function () {
    //save new user as pending
    $('#btn_register').click(function () {
      //stopImmediatePropagation();
        $('#frmAddUser').validetta({
        realTime:true,
        bubblePosition: 'bottom',
        bubbleGapTop: 1,
        bubbleGapLeft: -10,
        //display : 'inline',
        //errorTemplateClass : 'validetta-inline',


           onValid : function( event ) {
              event.preventDefault();
                var frm_add_user_data={
                  user_role_id:$('#slt_role').val(),
                  user_status_id:2,
                  phone:$('#txt_phone').val(),
                  name:$('#txt_username').val(),
                  email:$('#txt_email'),
                  pin:$('#txt_pin').val(),
                  email:$('#txt_email').val(),
                  table:'tbl_users'
                };
              //  console.log("Called");
                $.ajax({
                  type:"POST",
                  url:"../ajax/insert_record.php",
                  data:frm_add_user_data,
                  success:function (data) {
                    console.log(data);
                    $('#frmAddUser').trigger("reset");
                    if(data==1){
                    window.location="thank-you.php";
                  }

                  }
                });
            }
      })//validetta

    });


  });//end document ready
</script>
</body>
</html>
