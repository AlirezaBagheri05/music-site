<?php

//error_reporting(0);

//COUNT//COUNT//COUNT//COUNT//COUNT

function count_user(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "select * from ".tb_user;
    $result = mysqli_query($link, $query);
    return mysqli_num_rows($result);
    mysqli_close($link);
}

//initialize//initialize//initialize

function initialize_user(){
    $count1 = count_user();
    
    if($count1 == 0){
        add_user(null,"admin","admin","admin","admin");
        mysqli_close($link);
    }
}

//GET//GET//GET//GET//GET//GET//GET

function get_user($username){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_user." where username = '$username'";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    return $row;
    mysqli_close($link);
}

function get_user_id($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_user." where id = '$id'";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    return $row;
    mysqli_close($link);
}
//EXISTS//EXISTS//EXISTS//EXISTS

function exists_user($username){
    $row = get_user($username);
    if(isset($row['id']))
    {
        echo '<br />it is exists:<br />';
    } else {
        echo '<br />it is not exists!<br />';
    }
    return isset($row['id']);
     
}
function exists_user_id($id){
    $row = get_user_id($id);
    if(isset($row['id']))
    {
        echo '<br />it is exists:<br />';
    } else {
        echo '<br />it is not exists!<br />';
    }
    return isset($row['id']);
     
}

//ADD//ADD//ADD//ADD//ADD//ADD//ADD

function add_user($id = null,$username,$password,$first_name,$last_name){
    global $row;
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_user." where id = '$id'" ;
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    if(!isset($row['id'])){
         echo 'its NOT exists';
         $sha1_pass = sha1($password);
         $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
         $qrd = "insert into ".tb_user." (username,password,first_name,last_name)values('$username','$sha1_pass','$first_name','$last_name')";
         $result = mysqli_query($link, $qrd);
         if($result)
        {
            echo '<BR />that add truuu!!';
        } else {
            echo '<BR />thats add false!!';
        }
        
    } else {
          echo 'its exists';
          $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
          $password_pass = $row['password'];
          if($password_pass == $password){
              $sha1_pass = $password;
          }else{
              $sha1_pass = sha1($password);
          }
          $qrd = "update ".tb_user." set "
                  . "username ='$username', password ='$sha1_pass',first_name = '$first_name',last_name='$last_name' where  id = '$id'";
            $result = mysqli_query($link, $qrd);
            if($result)
            {
               echo '<BR />that update truuu!!';
            } else {
               echo '<BR />thats update false!!';
            }
    }
   
   
  mysqli_close($link);
    
     
}

//UPDATE//UPDATE//UPDATE//UPDATE//UPDATE

function update_user($username, $password, $first_name, $last_name){
    add_user($username, $password, $first_name, $last_name);
}

//DELETE//DELETE//DELETE//DELETE//DELETE

function delete_user($username){
    $exists = exists_user($username);
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "delete from ".tb_user." where username = '$username' ";
    $result = mysqli_query($link,$query);
    if($exists)
        {
            echo '<BR />that delete true!!<BR />';
        } else {
            echo '<BR />that delete false!!<BR />';
        }
    mysqli_close($link);
}
function delete_user_id($id){
    $exists = exists_user_id($id);
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "delete from ".tb_user." where id = '$id' ";
    $result = mysqli_query($link,$query);
    if($exists)
        {
            echo '<BR />that delete true!!<BR />';
        } else {
            echo '<BR />that delete false!!<BR />';
        }
    mysqli_close($link);
}


//for example//for example//for example


//echo count_user('dbpa', 'option');
//add_user('dbpa', 'users', 'alipo11aer', 'admin','ali', 'bagheri');
//delete_user('dbpa', 'users', 'alipo11aer');
//$row = get_user('dbpa', 'users', 'alipoaer');
//echo "<table>";
//    echo "<tr>";
//    echo "<td>".$row['username']."</td>";
//    echo "<td>".$row['password']."</td>";
//    echo "<td>".$row['first_name']."</td>";
//    echo "<td>".$row['last_name']."</td>";
//    echo "</tr>";
//echo "</table>";
//if(exists_user('dbpa', 'users', 'alipoaer')){echo 'truuu';}else{echo 'falsss';};

//delete_user('dbpa','users', 'alipoakger');

//update_user('dbpa', 'users', 'alipoakger', '3461', 'alireza', 'bagheri roochi');
    
//add_user('dbpa', 'users','admin', 'admin', 'admin', 'admin');
