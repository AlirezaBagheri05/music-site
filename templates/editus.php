<?php

 function authentication_required()
 {
     return true ;
 }
 
function get_title()
{
    return 'صفحه ویرایش';
    
}

function get_content()
{
              $password = array();
              if(isset($_GET['id']))
                {   
                    global $password;
                    $id = $_GET['id'];
                    $connect = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
                    $sqre = "select * from users where id=$id";
                    $result1 = mysqli_query($connect, $sqre);
                    while($row1 = mysqli_fetch_array($result1)){
                    $username = $row1['username'];
                    $password[2] = $row1['password'];
                    $first_name = $row1['first_name'];
                    $last_name = $row1['last_name'];
                    $id= $row1['id'];
                    } 
                  }elseif(isset($_POST['username'])){
                    $id = $_POST['id'];
                    $connect = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
                    $sqre = "select * from users where id=$id";
                    $result1 = mysqli_query($connect, $sqre);
                    $row1 = mysqli_fetch_array($result1);
                    $passwordb = $row1['password'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    
                 
                    if($password == $passwordb){
                        $sha1 = $password;
                       
                    } else {
                        $sha1 = sha1($password);
                        
                    }
                    $connect = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
                    $sqr = "update users set username='$username' , password='$sha1' , first_name='$first_name' , last_name ='$last_name' where id=$id";

                    $result = mysqli_query($connect, $sqr);
                    mysqli_close($connect);
                    header('Location: show');
                    die();
                  }
       ?>
        <div align="center">
          <div style="width:600px;">
           
            <div class="col-lg-12 mt-3" id="divmom1">
                <form method="post" action="editus" id="formpri">
                         <div class="form-group">
                            <label class="mb-1" for="username">user name</label>
                            <input class="form-control" type="text" value="<?PHP echo $username; ?>" name="username" id="username" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="password">user password</label>
                            <input class="form-control" type="text" value="<?PHP echo $password[2]; ?>" name="password" id="password" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="first_name">first name</label>
                            <input class="form-control" type="text" value="<?PHP echo $first_name; ?>" name="first_name" id="first_name" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="last_name">last name</label>
                            <input class="form-control" type="text" value="<?PHP echo $last_name; ?>" name="last_name" id="last_name"  />
                            <input class="form-control" type="hidden" value="<?PHP echo $id; ?>" name="id" id="id"  />
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">update data</button>
                  </form>
            </div>
          
         </div>
       </div>
            
             
       <?PHP
           
}

