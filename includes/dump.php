
//max image upload
var max_img=1;
$(document).ready(function () {
  //on Select Make
  $('#slt_make').change(function () {
    $car_make_id=$('#slt_make').val();
    $.ajax({
            type: "POST",
            url: "ajax/get_model.php",
            data:{make_id:$car_make_id},
			      success: function(msg) {
              $('.select_model').html(msg)
              //alert(msg)
            },
            error: function() {console.log();}
          });
  });
//image upload function
$('#upload_file').change(function(){
  var error_images = '';
  var form_data = new FormData(FrmAddImg);
  var files = $('#upload_file')[0].files;
  //number up file to upload
  //$img_length=5;
  if(max_img > 5)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
     var name = document.getElementById("upload_file").files[i].name;
     $('.image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='100' height='100' id='"+URL.createObjectURL(event.target.files[i])+"'><br>");
     //$test=URL.createObjectURL(event.target.files[i]);
     form_data.append("set_temp_link",1);
     form_data.append('img_name',name);
     //form_data.append("img_index",max_img);
     $("#img"+max_img).attr('name',name);
     //set tmp_name to div through ajax
     $.ajax({
      url:"ajax/set_img_link.php",
      method:"POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
         $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
        },
      success:function(data)
      {
        $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');

           $('#img'+max_img).attr('tmp_name','../uploaded_images/'+data);
           max_img++;
      }
    });
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("upload_file").files[i]);
    var f = document.getElementById("upload_file").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('upload_file').files[i]);
    }
   }
  }
  if(error_images == '')
  {
        //upload image here
  }
  else
  {
   $('#upload_file').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });

    //save button Click
  $('#btn_save_listing').click(function(){
    //alert(upload_files);
    var path_to_image=[];
    var FrmAddListing=$('#FrmAddListing')[0];
    var data= new FormData(FrmAddListing);
    //get temp_name from divs
    $img1=$('#img1').attr('tmp_name');
    $img2=$('#img2').attr('tmp_name');
    $img3=$('#img3').attr('tmp_name');
    $img4=$('#img4').attr('tmp_name');
    $img5=$('#img5').attr('tmp_name');
    //alert($img1);
    data.append('img1',$img1);
    data.append('img2',$img2);
    data.append('img3',$img3);
    data.append('img4',$img4);
    data.append('img5',$img5);
    $.ajax({
            type: "POST",
            url: "ajax/add_listing.php",
            data:data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(msg) {
              console.log(msg);
            alert('Saved');
            },
            error: function() {console.log();}
          });

  });
});
