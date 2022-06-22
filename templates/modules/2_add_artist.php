<?php
 function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'صفحه ویرایش';
    
}

function get_content(){
       if(isset($_POST['submit'])){
           
           if(isset($_POST['name']))
           {
           $name = $_POST['name'];
           } else {
            exit();
           }
           if(isset($_POST['user']))
           {
           $user = $_POST['user'];
           } else {
            exit();
           }
           if(!empty($_POST['img_name']))
           {
           $img = $_POST['img_name'];
           $img = 'includes/css/photoshop/'.$img;
           } else {
           $img = 'includes/css/photoshop/pictuer_1.jpg';
           }
           if(!empty($_POST['sad'])){
               $sad_ms = $_POST['sad'] ;
           }else {
               $sad_ms = '';
           }
           if(!empty($_POST['happy'])){
               $happy_ms = $_POST['happy'];
           }else {
               $happy_ms = '';
           }
           if(!empty($_POST['rap'])){
               $rap_ms = $_POST['rap'];
           } else {
               $rap_ms = '';
           }
           if(!empty($_POST['dram'])){
           $dram_ms = $_POST['dram'];
           }else {
               $dram_ms = '';
           }
           
           $like = 1;
           add_artist($user, $name, $like, $img);
           add_music_style($user, $sad_ms, $happy_ms, $rap_ms, $dram_ms);
           
           if ($_FILES["img"]["error"] > 0){
                    echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
                }else{
                    if (file_exists("includes/css/photoshop/" . $_FILES["img"]["name"])){
                        echo $_FILES["img"]["name"] . " already exists. ";
                    }else{
                        move_uploaded_file($_FILES["img"]["tmp_name"],
                        "includes/css/photoshop/". $_FILES["img"]["name"]);
                        echo "Stored in: " . "upload/" . $_FILES["img"]["name"];
                    }
                }
           
       }
       
       
       ?>
         
    
<div id="org_add_page">
    <div align="center">
        <h1 class="h1 " id="title-name">ایجادخواننده جدید </h1>
    </div>
        <div align='center'>
            <div id="box-table">
                <form id="form_table_1" method="POST"  enctype="multipart/form-data">
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1 " for="name"><p style="font-size:30px;">artist name</p></lable>
                            <input class="form-control" type="text" name="name" id='name'/>
                        </div>
                    </div><br />
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1" for="user"><p style="font-size:30px;">user name</p></lable>
                            <input class="form-control"   type="text" name="user" id='user' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img"><p style="font-size:30px;">img</p></lable>
                            <input class="choose_img" value="choose_img" type="file" name="img" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img_name"><p style="font-size:30px;">img name</p></lable>
                            <input value="img_name" type="text" name="img_name" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1"><p style="font-size:30px;">style</p></lable>
                            <label class="mb-1"><p style="font-size:30px;">sad</p></lable>
                            <input class="form-control" value="sad" type="checkbox" name="sad" id='sad' />
                            <label class="mb-1"><p style="font-size:30px;">happy</p></lable>
                            <input class="form-control" value="happy" type="checkbox" name="happy" id='happy' />
                            <label class="mb-1"><p style="font-size:30px;">rap</p></lable>
                            <input class="form-control" value="rap" type="checkbox" name="rap" id='rap' />
                            <label class="mb-1"><p style="font-size:30px;">dram</p></lable>
                            <input class="form-control" value="dram" type="checkbox" name="dram" id='dram' />
                        </div>
                    </div>
                    <div id="submitd">
                        <div id='divsubmit'>
                            <input class="btn btn-info"  type="submit" value="submit" name="submit" id='submit' />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
             
       <?PHP
}
