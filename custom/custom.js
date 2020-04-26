//Custom Variables
var currency="MUR";
var country="Mauritius";
var country_code = ("+230");
var php_link="http://cardealer.webdevsolutions.biz/php/admin/";
var img_link="http://cardealer.webdevsolutions.biz/admin/uploaded_images/";
var image_limit=5;
//==set max listing for normal users==//
var max_user_listings=5;
//menu itemSelector
var menu_items="cd_menu.html";
var footer_items="cd_footer.html";


function activate_link(){
  var page_url=location.pathname.split('/').slice(-1)[0]
$('a[href="'+page_url+'"').addClass('active');
}




//menu
//list menu items
