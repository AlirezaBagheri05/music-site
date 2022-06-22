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
//<img src="includes/css/photoshop/Photoshop-CC-2020-1280x640.jpg" alt=""/>
      
            $artist_user = $_GET['name'];
            echo $artist_user.'<br>';
            $row = get_artist("$artist_user");
            $artist_img = $row['artist_img'];
            $artist_img1 = str_replace('includes/css/photoshop/', '', $artist_img);
            echo $artist_img1.'<br>';
            $musics = get_music_all($artist_user);
            foreach ($musics as $value) {
                $music_user = $value['music_user'];
                $row = get_music("$music_user");
                $music_img = $row['music_img'];
                $music_img1 = str_replace('includes/css/photoshop/', '', $music_img);
                echo $music_img1.'<br>';
                if (!unlink($music_img))
                      {
                      echo ("Error deleting $music_img").'<br>';
                      }
                    else
                      {
                      echo ("Deleted $music_img").'<br>';
                      }
                $music_path = $row['music_path'];
                $music_path1 = str_replace('includes/css/music/', '', $music_path);
                echo $music_path1.'<br>';
                if (!unlink($music_path))
                      {
                      echo ("Error deleting $music_path").'<br>';
                      }
                    else
                      {
                      echo ("Deleted $music_path").'<br>';
                      }

                      delete_music_name("$music_user");
            };
            if (!unlink($artist_img))
                  {
                  echo ("Error deleting $artist_img").'<br>';
                  }
                else
                  {
                  echo ("Deleted $artist_img").'<br>';
                  }
                  delete_artist("$artist_user");
         
//            $FileHandle = fopen($name, 'w') or die("can't open file");
//            fclose($FileHandle);
//
//            unlink($name);
//            echo $name.' is deleted';
       
    
}
