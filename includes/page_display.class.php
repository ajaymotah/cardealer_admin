<?php
require_once('db_operations.class.php');

class PageDisplay extends DataOperation
{
  public function get_menu_count($table,$field,$id)
  {
    $count=$this->get_count_tbl($table,$field,$id);
    $span='';
    if($count){
      $span='<span class="badge badge-info right">'.$count.'</span>';
    }
    return $span;
  }

}//end class

$display_page=new PageDisplay();

 ?>
