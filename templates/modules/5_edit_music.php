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
           
           $music_name = $_POST['name'];
           $music_user = $_POST['user'];
           $img = $_POST['img_name'];
           $music_img = 'includes/css/photoshop/'.$img;
           $music_style = $_POST['style'] ;
           $music_date = $_POST['music_date'];
           $music_text = $_POST['music_txt'];
           $music_conver = $_POST['music_conver'];
           $link = $_POST['music_name'];
           $music_link = SITE_URL.'includes/css/music/'.$link;
           $music_path = 'includes/css/music/'.$link;
           $music_arreng = $_POST['music_arreng'];
           $music_artwk = $_POST['music_artwk'];
           $music_numdl = 0;
           $music_like = 5;
           $row = get_music($music_user);
           $id = $row['id'];
           $artist_user = $row['artist_user'];
           $artist_Name = $row['artist_name'];
           if ($_FILES["img"]["error"] > 0){
                    echo "did not change image <br />";
                }else{
                    if (file_exists("includes/css/photoshop/".$_FILES["img"]["name"])){
                        echo $_FILES["img"]["name"] . " already exists. <br />";
                        $file_name = $_FILES["img"]["name"];
                        $path =  $row['music_img'];
                        $music_music1 = str_replace("includes/css/photoshop/",'', $path);
                        if($file_name != $music_music1){
                            $path =  $row['music_img'];
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
                        $img_music = $row['music_img'];
                        if (!unlink($img_music))
                            {
                            echo ("Error deleting $img_music").'<br>';
                            }
                          else
                            {
                            echo ("Deleted $img_music").'<br>';
                            }
                        move_uploaded_file($_FILES["img"]["tmp_name"],
                        "includes/css/photoshop/".$_FILES["img"]["name"]);
                        echo "Stored in: " . "upload/".$_FILES["img"]["name"].'<br>';
                    }
                }
                if ($_FILES["music_path"]["error"] > 0){
                    echo "did not change music <br />";
                }else{
                    if (file_exists("includes/css/music/".$_FILES["music_path"]["name"])){
                        echo $_FILES["music_path"]["name"]." already exists. ". "<br>";
                        $file_name = $_FILES["music_path"]["name"];
                        $path =  $row['music_path'];
                        $music_path1 = str_replace("includes/css/music/",'', $path);
                        if($file_name != $music_path1){
                            $path =  $row['music_path'];
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
                        $path =  $row['music_path'];
                        if (!unlink($path))
                            {
                            echo ("Error deleting $path").'<br>';
                            }
                          else
                            {
                            echo ("Deleted $path").'<br>';
                            }
                        move_uploaded_file($_FILES["music_path"]["tmp_name"],
                        "includes/css/music/".$_FILES["music_path"]["name"]);
                        echo "Stored in: " . "upload/" . $_FILES["music_path"]["name"].'<br>';
                    }
                }
                
           update_music($artist_user, $artist_Name, $music_user, $music_name, $music_style, $music_date, $music_text, $music_conver, $music_like, $music_link, $music_path, $music_numdl, $music_arreng, $music_artwk, $music_img, $id);
       }
       if(isset($_GET['name'])){
           $name = $_GET['name'];
           $row = get_music("$name");
           $music_name = $row['music_name'];
           $music_user = $row['music_user'];
           $img_name = $row['music_img'];
           $img_name1 = str_replace('includes/css/photoshop/', '', $img_name);
           $music_text = $row['music_text'];
           $music_conver = $row['music_conver'];
           $music_path = $row['music_path'];
           $music_path1 = str_replace('includes/css/music/','',$music_path);
           $music_arreng = $row['music_arreng'];
           $music_artwk = $row['music_artwk'];
           $music_date = $row['music_date'];
           $music_style = $row['music_style'];
       }
       
       ?>
         
    
<div id="org_add_page">
    <div align="center">
        <h1 class="h1 " id="title-name"><?PHP if(!empty($music_name)){ echo $music_name;} ?></h1>
    </div>
        <div align='center'>
            <div id="box-table">
                <form id="form_table_1" method="POST"  enctype="multipart/form-data">
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1 " for="name"><p style="font-size:30px;">music name</p></lable>
                            <input class="form-control" value="<?PHP echo $music_name; ?>" type="text" name="name" id='name'/>
                        </div>
                    </div><br />
                    <div class="titled">
                        <div class='divtitle'>
                            <label class="mb-1" for="user"><p style="font-size:30px;">music user</p></lable>
                            <input class="form-control" value="<?PHP echo $music_user; ?>"  type="text" name="user" readonly id='user' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img"><p style="font-size:30px;">img</p></lable>
                            <input class="choose_img" value="img"  type="file" name="img" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="img_name"><p style="font-size:30px;">img name</p></lable>
                            <input type="text" value="<?PHP echo $img_name1; ?>" name="img_name" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <select class="form-control" name="style" id="style">
                                <option value="sad_ms" <?PHP if($music_style == 'sad_ms'){echo 'selected';} ?> >sad</option>
                                <option value="happy_ms" <?PHP if($music_style == 'happy_ms'){echo 'selected';} ?> >happy</option>
                                <option value="rap_ms" <?PHP if($music_style == 'rap_ms'){echo 'selected';} ?> >rap</option>
                                <option value="dram_ms" <?PHP if($music_style == 'dram_ms'){echo 'selected';} ?> >dram</option>
                            </select>
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent' >
                            <label class="mb-1" for="music_txt"><p style="font-size:30px;">music txt</p></lable>
                            <textarea class="music_text form-control"  name="music_txt" rows="5" cols="50"  ><?PHP echo $music_text; ?></textarea>
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent' >
                            <label class="mb-1" for="music_conver"><p style="font-size:30px;">music conversation</p></lable>
                            <textarea class="music_text form-control"  name="music_conver" rows="5" cols="50"  ><?PHP echo $music_conver; ?></textarea>
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="music_path"><p style="font-size:30px;">music file</p></lable>
                            <input class="choose_img form-control" value="music_path" type="file" name="music_path" id='img' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="music_name"><p style="font-size:30px;">music name</p></lable>
                            <input class="choose_img form-control" value="<?PHP echo $music_path1; ?>" value="music_name" type="text" name="music_name" id='music_link' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="music_arreng"><p style="font-size:30px;">music arreng</p></lable>
                            <input class="form-control" type="text" value="<?PHP echo $music_arreng; ?>" name="music_arreng" id='music_arreng' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="music_artwk"><p style="font-size:30px;">music artwk</p></lable>
                            <input class="form-control" type="text" value="<?PHP echo $music_artwk; ?>" name="music_artwk" id='music_artwk' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <label class="mb-1" for="music_date"><p style="font-size:30px;">music date</p></lable>
                            <input class="form-control" type="date" value="<?PHP echo $music_date; ?>" name="music_date" id='music_date' />
                        </div>
                    </div>
                    <div class="titled">
                        <div id='divcontent'>
                            <input class="form-control" value="<?PHP if(!empty($artist_name)){ echo $artist_name;} ?>" type="hidden" name="artist_name" />
                            <input class="form-control" value="<?PHP if(!empty($name)){ echo $name;} ?>" type="hidden" name="artist_user" />
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
