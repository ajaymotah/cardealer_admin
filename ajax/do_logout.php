<?php
include('../includes/db_operations.class.php');
if($logout=$db_operation->session_logout())
{
  ?>
  <script type="text/javascript">
location.href="../pages/cd_logout.php";
  </script>
  <?php
}

 ?>
