<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAR DEALER | Log in</title>
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
  <!-- Validetta-->
  <link rel="stylesheet" href="../plugins/validetta/validetta.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.html"><img src="../dist/img/logo-dark.png" width="250" alt=""></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" id="frm_login" action="">
        <div class="input-group mb-3">
           <input class="form-control" placeholder="Enter your mobile no" name="txtPhone" maxlength="8" data-validetta="required,number,minLength[8],maxLength[8]">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" name="txtPin" placeholder="PIN" maxlength="4" data-validetta="required,number,minLength[4],maxLength[4]">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="btn_login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- Social Media
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="examples/register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- custom script-->
<script src="../plugins/validetta/validetta.min.js"></script>
<!-- custom script-->
<script src="../custom/custom.js"></script>
<script type="text/javascript">

function check_session() {
  var user_id=window.sessionStorage.getItem("user_id");
  if(user_id){
  window.location.href="../../index.html";
  //console.log(user_id);
    }
  }

  $(document).ready(function(){
  //check_session();
$('#btn_login').click(function () {
  $('#frm_login').validetta({
    bubblePosition: 'bottom',
    realTime:true,
        bubbleGapTop: 10,
        bubbleGapLeft: 150,
       onValid : function( event ) {
             event.preventDefault();
            $.ajax({
              type:"POST",
              url:php_link+"admin_login.php",
              data:$('#frm_login').serialize(),
              crossDomain:true,
              cache:false,
              success:function (data) {
                $('#frm_login')[0].reset();
                //alert(data);
                if(data==0){
                  alert("Phone/PIN Incorrect, try Again");

                }
                else{
                  //alert(data);
                  $.ajax({
                    type:"POST",
                    url:php_link+"admin_login.php",
                    data:$('#frm_login').serialize(),
                    crossDomain:true,
                    cache:false,
                    success:function (data) {
                      window.location.href="../../index.html";
                    }
                  })
                }

                //alert(data);
                // store session
                //window.sessionStorage.setItem("user_id",data);
                //redirect to cd_admin.HTML5
                  //var test=window.sessionStorage.getItem("user_id");
                //  window.location.href="index.html";
              },
            })
         },
        onError : function( event ){
            //alert(event+"Loggin Failed - Please see with App Admin");
         }
     });
})





});//end Document ready
</script>

</body>
</html>