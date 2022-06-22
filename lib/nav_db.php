<?php 

function add_tb_nav_style(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_nav_style." (
            id int primary key auto_increment,
            background_nav_color varchar(50) not null,
            background_nav_btn_color varchar(50) not null,
            background_nav_list_color varchar(50) not null,
            logo_img varchar(100) not null,
            logo_txt varchar(30) not null,
            popup_img varchar(100) not null,
            btn_popup_name varchar(30) not null,
            btn_org_name varchar(30) not null,
            btn_nav_direction_img varchar(100) not null,
            btn_direction_color_ms varchar(100) not null,
            btn_direction_color_ar varchar(100) not null,
            btn_direction_color_pg varchar(100) not null,
            bg_cl varchar(50) not null,
            img_org varchar(50) not null
            )";
     $result = mysqli_query($link,$qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
     mysqli_close($link);    
    
}

function update_tb_nav_style($table_row,$after){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "ALTER TABLE ".tb_nav_style."  ADD $table_row VARCHAR(30) NOT NULL AFTER $after;
            ";
     $result = mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}


function add_nav_style($background_nav_color,$background_nav_btn_color,$background_nav_list_color,$logo_img,$logo_txt,$popup_img,$btn_popup_name,$btn_org_name,$btn_nav_direction_img,$btn_direction_color_ms,$btn_direction_color_ar,$btn_direction_color_pg,$bg_cl,$img_org){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_nav_style."  (`id`, `background_nav_color`, `background_nav_btn_color`, `background_nav_list_color`, `logo_img`, `logo_txt`, `popup_img`,`btn_popup_name`,`btn_org_name`,`btn_nav_direction_img`,`btn_direction_color_ms`,`btn_direction_color_ar`,`btn_direction_color_pg`,`bg_cl`,`img_org`)
            VALUES
           (NULL, '$background_nav_color', '$background_nav_btn_color', '$background_nav_list_color', '$logo_img', '$logo_txt', '$popup_img','$btn_popup_name','$btn_org_name','$btn_nav_direction_img','$btn_direction_color_ms','$btn_direction_color_ar','$btn_direction_color_pg','$bg_cl','$img_org')";
    $result = mysqli_query($link, $qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}


function update_nav_style($background_nav_color,$background_nav_btn_color,$background_nav_list_color,$logo_img,$logo_txt,$popup_img,$btn_popup_name,$btn_org_name,$btn_nav_direction_img,$btn_direction_color_ms,$btn_direction_color_ar,$btn_direction_color_pg,$img_org,$id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_nav_style."  SET `background_nav_color` = '$background_nav_color', `background_nav_btn_color` = '$background_nav_btn_color', `background_nav_list_color` = '$background_nav_list_color', `logo_img` = '$logo_img', `logo_txt` = '$logo_txt', `popup_img` = '$popup_img',
     `btn_popup_name` = '$btn_popup_name', `btn_org_name` = '$btn_org_name', `btn_nav_direction_img` = '$btn_nav_direction_img', `btn_direction_color_ms` = '$btn_direction_color_ms', `btn_direction_color_ar` = '$btn_direction_color_ar', `btn_direction_color_pg` = '$btn_direction_color_pg', `img_org` = '$img_org' WHERE `id` = $id";
    $result = mysqli_query($link, $qrd);
    if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}

function delete_nav_style($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_nav_style."  WHERE `id` = '$id' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);   
}

function get_nav_style($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_nav_style." WHERE id = '$id' ";
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
