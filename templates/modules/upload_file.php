<?php

 
function get_title()
{
    return 'insert';
    
}

function get_content()
{
   
            if ($_FILES["img"]["error"] > 0){
                    echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
                }else{
                    echo "Upload: " . $_FILES["img"]["name"] . "<br>";
                    echo "Type: " . $_FILES["img"]["type"] . "<br>";
                    echo "Size: " . ($_FILES["img"]["size"] / 1024) . " kB<br>";
                    echo "Temp file: " . $_FILES["img"]["tmp_name"] . "<br>";

                    if (file_exists("includes/css/photoshop/" . $_FILES["img"]["name"])){
                        echo $_FILES["img"]["name"] . " already exists. ";
                    }else{
                        move_uploaded_file($_FILES["img"]["tmp_name"],
                        "includes/css/photoshop/". $_FILES["img"]["name"]);
                        echo "Stored in: " . "upload/" . $_FILES["img"]["name"];
                    }
                }
                if ($_FILES["music_path"]["error"] > 0){
                    echo "Return Code: " . $_FILES["music_path"]["error"] . "<br>";
                }else{
                    echo "Upload: " . $_FILES["music_path"]["name"] . "<br>";
                    echo "Type: " . $_FILES["music_path"]["type"] . "<br>";
                    echo "Size: " . ($_FILES["music_path"]["size"] / 1024) . " kB<br>";
                    echo "Temp file: " . $_FILES["music_path"]["tmp_name"] . "<br>";

                    if (file_exists("includes/css/music/" . $_FILES["music_path"]["name"])){
                        echo $_FILES["music_path"]["name"] . " already exists. ";
                    }else{
                        move_uploaded_file($_FILES["music_path"]["tmp_name"],
                        "includes/css/music/". $_FILES["music_path"]["name"]);
                        echo "Stored in: " . "upload/" . $_FILES["music_path"]["name"];
                    }
                }
}