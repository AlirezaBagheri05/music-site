<?php

function add_tb_artist($table_name){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table $table_name(
            id int primary key auto_increment,
            artist_user varchar(30) not null,
            artist_name varchar(30) not null,
            artist_like varchar(30) not null,
            artist_img text not null
            )";
     $result = mysqli_query($link,$qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
     mysqli_close($link);    
    
}

function update_tb_artist($table_name,$table_row,$after){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "ALTER TABLE $table_name ADD $table_row VARCHAR(30) NOT NULL AFTER $after;
            ";
     $result = mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}


function add_artist($artist_user,$artist_Name,$artist_like,$artist_img){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_artist." (`id`, `artist_user`, `artist_name`, `artist_like`, `artist_img`) VALUES (NULL, '$artist_user', '$artist_Name', '$artist_like', '$artist_img')";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);    
}


function update_artist($table_name,$artist_user,$artist_Name,$artist_img,$id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE `$table_name` SET `artist_user` = '$artist_user', `artist_name` = '$artist_Name', `artist_img` = '$artist_img' WHERE `id` = $id";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);    
}
function update_artist_by_user($artist_Name,$artist_img,$artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_artist." SET `artist_name` = '$artist_Name', `artist_img` = '$artist_img' WHERE `artist_user` = '$artist_user'";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);    
}

function delete_artist($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_artist." WHERE `artist_user` = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);   
}

function get_artist($artist_user){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_artist."  WHERE artist_user = '$artist_user' ";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    mysqli_close($link); 
    return $row;
}

//add_tb_artist('artist');
