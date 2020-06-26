<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Validetta  -->
    <link rel="stylesheet" href="../plugins/validetta/validetta.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form id="exm" method="POST">
        <div>
            <label>Username :</label>
            <input type="text" name="txt_phone" data-validetta="required,remote[check_username]">
        </div>
        <div>
            <label>Password :</label>
            <input type="text" name="pass" data-validetta="required">
        </div>
        <button type="submit" id="btn">Submit</button>
        <button type="reset">Reset</button>
    </form>


    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Validetta -->
    <script src="../plugins/validetta/validetta.min.js"></script>
    <script>
$(document).ready(function () {
  $('#btn').click(function()
  {
$('#exm').validetta({
    realTime : true,
    onValid : function( event ){
        event.preventDefault(); // if you dont break submit and if form doesnt have error, page will post
        alert('Success');
    },
    validators: {
        remote : {
            check_username : {
                type : 'POST',
                url : '../ajax/find_user_phone_exists.php',
                dataType : 'json'
            }
        }
    }
});
});
})


    </script>
  </body>
</html>
