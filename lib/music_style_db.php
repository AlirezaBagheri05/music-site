<?php 

function add_tb_music_style_db(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_music_style_db." (
            id int primary key auto_increment,
            txt_color varchar(50) not null,
            ab_color varchar(50) not null,
            ms_color varchar(50) not null,
            link_color varchar(50) not null,
            btn_color varchar(50) not null,
            send_color varchar(50) not null,
            message_color varchar(50) not null,
            shadow_color varchar(50) not null
            )";
     $result = mysqli_query($link,$qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
     mysqli_close($link);    
    
}

function update_tb_music_style_db($table_row,$after){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "ALTER TABLE ".tb_music_style_db." ADD $table_row VARCHAR(30) NOT NULL AFTER $after;
            ";
     $result = mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}


function add_music_style_db($txt_color,$ab_color,$ms_color,$link_color,$btn_color,$send_color,$message_color,$shadow_color){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_music_style_db." (`id`,`txt_color`,`ab_color`,`ms_color`,`link_color`, `btn_color`, `send_color`,`message_color`,`shadow_color`)
            VALUES
           (NULL,'$txt_color','$ab_color','$ms_color','$link_color', '$btn_color', '$send_color','$message_color','$shadow_color')";
    $result = mysqli_query($link, $qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}


function update_music_style_db($txt_color,$ab_color,$ms_color,$link_color,$btn_color,$send_color,$message_color,$shadow_color,$id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_music_style_db." SET `txt_color` = '$txt_color', `ab_color` = '$ab_color', `ms_color` = '$ms_color', `link_color` = '$link_color', `btn_color` = '$btn_color', `send_color` = '$send_color',
     `message_color` = '$message_color', `shadow_color` = '$shadow_color' WHERE `id` = $id";
    $result = mysqli_query($link, $qrd);
    if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}

function delete_music_style_db($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_music_style_db." WHERE `id` = '$id' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);   
}


function get_music_style_db($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_music_style_db." WHERE id = '$id' ";
    $result = mysqli_query($link, $qrd);
    if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    $row = mysqli_fetch_array($result);
    mysqli_close($link); 
    return $row;
}
//add_nav_style('nav_style','background_nav_color','background_nav_btn_color','background_nav_list_color','logo_img','logo_txt','popup_img', 'btn_popup_name','btn_org_name','btn_nav_direction_img','btn_direction_color_ms','btn_direction_color_ar','btn_direction_color_pg');
//update_nav_style('nav_style', '2', '3','4','5','6','7','8','9','10','11','12','13',2);
//add_tb_nav_style('nav_style');
//add_nav_style('nav_style', "background_nav_color", "background_nav_btn_color", "background_nav_list_color", "logo_img","logo_txt","popup_img","btn_popup_name","btn_org_name");
//update_nav_style('nav_style', "background_nav_color", "background_nav_btn_color", "background_nav_list_color", "logo_img","logo_txt","popup_img","btn_popup_name","btn_org_name","blue","gray","green","1");
//update_tb_nav_style('nav_style', 'popup_img', 'logo_txt');
//delete_nav_style('nav_style','1');
//update_tb_nav_style('nav_style', 'btn_nav_direction_img', 'btn_org_name');
//update_tb_nav_style('nav_style', 'bg_cl','btn_direction_color_pg');

//add_tb_music_style_db('music_style_db');

//add_music_style_db('music_style_db', '#fcf8e3', '#b2dba1', '#fcf8e3', '#5bc0de', 'rgba(220,220,220,0.5)','rgb(200,200,200)','#bce8f1','gray');
