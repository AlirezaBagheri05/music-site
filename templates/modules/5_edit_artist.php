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
           $artist_name = $_POST['name'];
           } else {
            exit();
           }
           if(isset($_POST['user']))
           {
           $artist_user = $_POST['user'];
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
           $row = get_artist($artist_user);
           if ($_FILES["img"]["error"] > 0){
                    echo "did not change img artist . <br>";
                }else{
                    if (file_exists("includes/css/photoshop/" . $_FILES["img"]["name"])){
                        echo $_FILES["img"]["name"] . " already exists. ";
                        $file_name = $_FILES["img"]["name"];
                        $path =  $row['artist_img'];
                        $music_music1 = str_replace("includes/css/photoshop/",'', $path);
                        if($file_name != $music_music1){
                            $path =  $row['artist_img'];
                        if (!unlink($path))
                            {
                            echo ("Error deleting $path").'<br>';
                            }
                          else
                            {
                            echo ("Deleted $path").'<br>';
                            }
                        }
                    }else{
                        $artist = get_artist($artist_user);
                        $img1 = $artist['artist_img'];
                        if (!unlink($img1))
                            {
                            echo ("Error deleting $img1").'<br>';
                            }
                          else
                            {
                            echo ("Deleted $img1").'<br>';
                            }
                        move_uploaded_file($_FILES["img"]["tmp_name"],
                        "includes/css/photoshop/". $_FILES["img"]["name"]);
                        echo "Stored in: " . "upload/" . $_FILES["img"]["name"];
                    }
                }
           
           update_artist_by_user("$artist_name", "$img", "$artist_user");
           update_music_style_by_artist($sad_ms, $happy_ms, $rap_ms, $dram_ms, $artist_user);
           
       }
       if(!empty($_GET['name'])){
           $artist_user = $_GET['name'];
           $row = get_artist("$artist_user");
           $artist_name = $row['artist_name'];
           $artist_user = $row['artist_user'];
           $artist_img = $row['artist_img'];
           $artist_img1 = str_replace('includes/css/photoshop/', '', $artist_img);
           $style = get_music_style($artist_user);
           
       }
       
       ?>
         
    
<div id="org_add_page">
    <div align="center">
        <h1 class="h1 " id="title-name">ARTIST <?PHP echo $artist_name;?></h1>
    </div>
        <div align='center'>
            <div id="box-table">
                <form id="form_table_1" method="POST"  enctype="multipart/form-data">
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1 " for="name"><p style="font-size:30px;">artist name</p></lable>
                            <input class="form-control" type="text" value="<?PHP echo $artist_name;?>" name="name" id='name'/>
                        </div>
                    </div><br />
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1" for="user"><p style="font-size:30px;">user name</p></lable>
                            <input class="form-control" type="text" value="<?PHP echo $artist_user;?>" name="user" id='user'  readonly />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img"><p style="font-size:30px;">img</p></lable>
                            <input class="choose_img"  type="file" name="img" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img_name"><p style="font-size:30px;">img name</p></lable>
                            <input type="text" value="<?PHP echo $artist_img1;?>" name="img_name" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1"><p style="font-size:30px;">style</p></lable>
                            <label class="mb-1"><p style="font-size:30px;">sad</p></lable>
                            <input class="form-control" value="sad" type="checkbox" <?PHP if(!empty($style['sad_ms'])){echo 'checked';} ?> checked="checked"  name="sad" id='sad' />
                            <label class="mb-1"><p style="font-size:30px;">happy</p></lable>
                            <input class="form-control" value="happy" type="checkbox" <?PHP if(!empty($style['happy_ms'])){echo 'checked';} ?> name="happy" id='happy' />
                            <label class="mb-1"><p style="font-size:30px;">rap</p></lable>
                            <input class="form-control" value="rap" type="checkbox" <?PHP if(!empty($style['rap_ms'])){echo 'checked';} ?> name="rap" id='rap' />
                            <label class="mb-1"><p style="font-size:30px;">dram</p></lable>
                            <input class="form-control" value="dram"  type="checkbox" <?PHP if(!empty($style['dram_ms'])){echo 'checked';} ?> name="dram" id='dram' />
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
