<?php

function add_tb_music_style(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_music_style."(
            id int primary key auto_increment,
            artist_user varchar(30) not null,
            sad_ms varchar(30) not null,
            happy_ms varchar(30) not null,
            rap_ms varchar(30) not null,
            dram_ms varchar(30) not null
            )";
     mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}

function add_music_style($artist_user,$sad_ms,$happy_ms,$rap_ms,$dram_ms){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_music_style." 
     (`id`, `artist_user`, `sad_ms` , `happy_ms` , `rap_ms` , `dram_ms`)VALUES
     (NULL ,'$artist_user','$sad_ms','$happy_ms','$rap_ms','$dram_ms')";
     mysqli_query($link, $qrd);
     mysqli_close($link);    
}
         
         
function update_music_style($music_style_user,$music_style_Name,$id){
        $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
        $qrd = "UPDATE ".tb_music_style." SET `music_style_user` = '$music_style_user',
        `music_style_name` = '$music_style_Name' WHERE `id` = '$id'";
        mysqli_query($link, $qrd);
        mysqli_close($link);    
}
function update_music_style_by_artist($sad_ms,$happy_ms,$rap_ms,$dram_ms,$artist_user){
        $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
        $qrd = "UPDATE ".tb_music_style." SET `sad_ms` = '$sad_ms', `happy_ms` = '$happy_ms',
           `rap_ms` = '$rap_ms', `dram_ms` = '$dram_ms' WHERE `artist_user` = '$artist_user'";
        mysqli_query($link, $qrd);
        mysqli_close($link);    
}

 
function delete_music_style($music_style_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_music_style." WHERE `music_style_user` = '$music_style_user'";
    mysqli_query($link,$qrd);
    mysqli_close($link);   
}

function delete_music_style_user($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_music_style." WHERE `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    if($result){
        echo 'true'.'<br />';
    }else{
        echo 'false'.'<br />';
    }
    mysqli_close($link);   
}

function get_music_style($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music_style." WHERE `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

