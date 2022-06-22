<?php

function create_database(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD);
    $qrd = "create database if not exists ".db_name;
    $result = mysqli_query($link,$qrd);
    mysqli_close($link);
} 

function create_table_user(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "create table ".tb_user." (
            id int primary key auto_increment,
            username varchar(20) not null,
            password varchar(50) not null,
            first_name varchar(30) not null,
            last_name varchar(30) not null
            )";
    $result = mysqli_query($link,$qrd);
    mysqli_close($link);
}

function create_table_pages(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "create table ".tb_pages." (
        id int primary key auto_increment,
        title varchar(100) not null,
        content text not null,
        slug varchar(100) unique not null,
        hidden int not null DEFAULT '0')";
    $Result = mysqli_query($link, $query);
    if($Result){
       echo'true';
     }else{
       echo'false';
     }
    
}

function rename_table($name_table,$new_name_table){
    
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "Rename table $name_table to $new_name_table";
    $result = mysqli_query($link,$qrd);
    mysqli_close($link);
    
}

function drop_database($name_database){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD);
    $qrd = "drop database if exists $name_database";
    $result = mysqli_query($link,$qrd);
    mysqli_close($link);
}

function drop_table($name_table){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "drop table if exists $name_table";
    $result = mysqli_query($link,$qrd);
    mysqli_close($link);
}

//function alter_database($name_database,$new_name_database){
//    
//    $link = mysqli_connect(SERVER_NAME,"root","");
//    $qrd = "alter database $name_database rename $new_name_database";
//    $result = mysqli_query($link,$qrd);
//    mysqli_close($link);
//    
//}

//create_database('dbpa');
//rename_table('dbpa', 'user', 'users');
//drop_table('dbpa', 'users');
//create_database('dbpa');
//create_table_user('users');
//create_table_option('option');
//create_table_pages('pages');
