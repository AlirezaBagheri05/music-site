<?php 

function add_tb_footer_style(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_footer_style." (
            id int primary key auto_increment,
            bg_img varchar(100) not null,
            bg_br_cr_color varchar(50) not null,
            bg_br_line_color varchar(50) not null,
            bg_color varchar(50) not null,
            bg_line varchar(50) not null,
            bg_img_name varchar(100) not null,
            bg_logo_img varchar(100) not null,
            bg_txt text not null,
            bg_report varchar(100) not null
            )";
     $result = mysqli_query($link,$qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
     mysqli_close($link);    
    
}

function update_tb_footer_style($table_name,$table_row,$after){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "ALTER TABLE $table_name ADD $table_row VARCHAR(30) NOT NULL AFTER $after;
            ";
     $result = mysqli_query($link,$qrd);
     mysqli_close($link);    
    
}


function add_footer_style($bg_img,$bg_br_cr_color,$bg_br_line_color,$bg_color,$bg_line,$bg_img_name,$bg_logo_img,$bg_txt,$bg_report){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "INSERT INTO ".tb_footer_style." (`id`, `bg_img`, `bg_br_cr_color`, `bg_br_line_color`, `bg_color`, `bg_line`, `bg_img_name`,`bg_logo_img`,`bg_txt`,`bg_report`)
            VALUES
           (NULL, '$bg_img', '$bg_br_cr_color', '$bg_br_line_color', '$bg_color', '$bg_line', '$bg_img_name','$bg_logo_img','$bg_txt','$bg_report')";
    $result = mysqli_query($link, $qrd);
     if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}


function update_footer_style($bg_img,$bg_br_cr_color,$bg_br_line_color,$bg_color,$bg_line,$bg_img_name,$bg_logo_img,$bg_txt,$bg_report,$id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "UPDATE ".tb_footer_style." SET `bg_img` = '$bg_img', `bg_br_cr_color` = '$bg_br_cr_color', `bg_br_line_color` = '$bg_br_line_color', `bg_color` = '$bg_color', `bg_line` = '$bg_line',
     `bg_img_name` = '$bg_img_name', `bg_logo_img` = '$bg_logo_img', `bg_txt` = '$bg_txt', `bg_report` = '$bg_report' WHERE `id` = $id";
    $result = mysqli_query($link, $qrd);
    if (!$result) {
            printf("Error: %s\n", mysqli_error($link));
            exit();
        }
    mysqli_close($link);    
}

function delete_footer_style($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "DELETE FROM ".tb_footer_style." WHERE `id` = '$id' ";
    $result = mysqli_query($link, $qrd);
    mysqli_close($link);   
}

function get_footer_style($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "SELECT * FROM ".tb_footer_style." WHERE id = '$id' ";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    mysqli_close($link); 
    return $row;
}
//add_footer_style('footer_style','bg_img','bg_br_cr_color','bg_br_line_color','bg_color','bg_line','bg_img_name','bg_logo_img','bg_txt','bg_report');
//$txt = "i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo i am alireza bagheri and it is my first site that i make it and now i am very happy and now i am listing a music from tataloo ";
//update_footer_style('footer_style',"photoshop/pictuer_1.jpg",'#46b8da','#46b8da','rgba(230,230,230,1)','black','Musica','includes/css/photoshop/logo-1.png',$txt, 'محتوای این صفحه برای سایت موزیکال هست و هر گونه کپی برداری از ان پیگیری قانونی دارد.',1);
//add_tb_footer_style('footer_style');
//add_nav_style('nav_style', "background_nav_color", "background_nav_btn_color", "background_nav_list_color", "logo_img","logo_txt","popup_img","btn_popup_name","btn_org_name");
//update_nav_style('nav_style', "background_nav_color", "background_nav_btn_color", "background_nav_list_color", "logo_img","logo_txt","popup_img","btn_popup_name","btn_org_name","blue","gray","green","1");
//update_tb_nav_style('nav_style', 'popup_img', 'logo_txt');
//delete_nav_style('nav_style','1');
//update_tb_nav_style('nav_style', 'btn_nav_direction_img', 'btn_org_name');
