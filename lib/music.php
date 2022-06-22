<?php

function add_tb_music(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_music." (
            id int primary key auto_increment,
            artist_user varchar(30) not null,
            artist_name varchar(30) not null,
            music_user varchar(30) not null,
            music_name varchar(30) not null,
            music_style varchar(30) not null,
            music_date date not null,
            music_text text not null,
            music_conver text not null,
            music_like varchar(50) not null,
            music_link varchar(100) not null,
            music_path varchar(50) not null,
            music_numdl varchar(50) not null,
            music_arreng varchar(30) not null,
            music_artwk varchar(30) not null,
            music_img varchar(30) not null
            )";
     mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}

//function update_tb_artist($table_row,$after){
//    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
//    $qrd = "ALTER TABLE ".tb_artist." ADD $table_row VARCHAR(30) NOT NULL AFTER $after;
//            ";
//     $result = mysqli_query($link,$qrd);
//     mysqli_close($link);    
//    
//}

function add_music(
        $artist_user,$artist_Name,$music_user,$music_name,
        $music_style,$music_date,$music_text,$music_conver,$music_like,$music_link,
        $music_path,$music_numdl,$music_arreng,$music_artwk,$music_img
        ){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_music." 
     (`id`, `artist_user`, `artist_name`, `music_user`, `music_name`, `music_style`, `music_date`, `music_text`,
     `music_conver`, `music_like`, `music_link`, `music_path`, `music_numdl`, `music_arreng`, `music_artwk` , `music_img`)
     VALUES (NULL ,'$artist_user','$artist_Name','$music_user','$music_name','$music_style','$music_date',
     '$music_text','$music_conver','$music_like','$music_link','$music_path','$music_numdl','$music_arreng','$music_artwk','$music_img')";
     mysqli_query($link, $qrd);
     mysqli_close($link);    
         }
         
         
function update_music($artist_user,$artist_Name,$music_user,$music_name,
        $music_style,$music_date,$music_text,$music_conver,$music_like,$music_link,
        $music_path,$music_numdl,$music_arreng,$music_artwk,$music_img,$id){
        $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
        $qrd = "UPDATE ".tb_music." SET `artist_user` = '$artist_user',
        `artist_name` = '$artist_Name', `music_user` = '$music_user',`music_name` = '$music_name',
        `music_style` = '$music_style', `music_date` = '$music_date',
        `music_text` = '$music_text', `music_conver` = '$music_conver',
        `music_like` = '$music_like', `music_link` = '$music_link',
        `music_path` = '$music_path', `music_numdl` = '$music_numdl',
        `music_arreng` = '$music_arreng', `music_artwk` = '$music_artwk', `music_img` = '$music_img'
         WHERE `id` = '$id'";
        mysqli_query($link, $qrd);
        mysqli_close($link);    
}


function delete_music($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_music." WHERE `artist_user` = '$artist_user'";
    $result = mysqli_query($link,$qrd);
    if($result){
        echo 'deleted artist '.$artist_user.' music!'.'<br />';
    } else {
         echo 'not deleted artist '.$artist_user.' music!'.'<br />';
    }
    mysqli_close($link);   
}
function delete_music_name($music_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_music." WHERE `music_user` = '$music_user'";
    $result = mysqli_query($link,$qrd);
    if($result){
        echo 'deleted music '.$music_user.'. <br />';
    } else {
         echo 'Errore deleted  music '.$music_user.'. <br />';
    }
    mysqli_close($link);   
}



function get_music($music_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music." WHERE `music_user` = '$music_user' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);
    $row = mysqli_fetch_array($result);
    return $row;
}

function get_music_all($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music." WHERE `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    $musics = array();
    while($row = mysqli_fetch_array($result)){
        $musics[]= $row;
    }
    return $musics;
    mysqli_close($link);
}

function get_music_all_home(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music;
    $result = mysqli_query($link, $qrd);
    $musics = array();
    while($row = mysqli_fetch_array($result)){
        $musics[]= $row;
    }
    return $musics;
    mysqli_close($link);
}
function get_music_all_like($music_like){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music." WHERE `music_like` = '$music_like' ";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    return $musics;
    mysqli_close($link);
}
function get_music_id($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music." WHERE `id` = '$id' ";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    return $musics;
    mysqli_close($link);
}
function get_artist_id($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist." WHERE `id` = '$id' ";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    return $musics;
    mysqli_close($link);
}
function get_music_by_art_name($artist_user,$music_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music." WHERE `artist_user` = '$artist_user' AND `music_user` = '$music_user'";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    return $musics;
    mysqli_close($link);
}
function update_music_like($music_like,$id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_music." SET `music_like` = '$music_like' WHERE `id` = $id";
    return mysqli_query($link, $qrd);
    mysqli_close($link);    
}
function update_music_like_by_like($music_like,$id,$artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_music." SET `music_like` = '$music_like' WHERE `id` = '$id'  AND `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);    
}
function get_artist_all(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist;
    $result = mysqli_query($link, $qrd);
    $musics = array();
    while($row = mysqli_fetch_assoc($result)){
        $musics[]= $row['artist_like'];
    }
    return $musics;
    mysqli_close($link);
}

function get_artist_all_like($artist_like){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist." WHERE `artist_like` = '$artist_like' ";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    return $musics;
    mysqli_close($link);
}
function update_artist_like_by_like($artist_like,$id,$artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_artist." SET `artist_like` = '$artist_like' WHERE `id` = '$id'  AND `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);    
}
//add_tb_music('music');
function check_artist_like($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist." WHERE `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    $musics = mysqli_fetch_array($result);
    if(null == $musics['artist_like']){
        return false;
    } else {
        return true;
    }
    mysqli_close($link);
}
function get_artist_user(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist;
    $result = mysqli_query($link, $qrd);
    $musics = array();
    while($row = mysqli_fetch_assoc($result)){
        $musics[]= $row;
    }
    return $musics;
    mysqli_close($link);
}
