<?php

 
  function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'صفحه ایجاد ادمین';
    
}

function get_content()
{
    
   if(isset($_POST['username']))
   {
       $id = $_POST['id'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $first_name = $_POST['first_name'];
       $last_name = $_POST['last_name'];
       add_user($id ,$username,$password,$first_name,$last_name);
       
    }
   if(isset($_GET['id']))
   {
       $id = $_GET['id'];
       $qre = "SELECT * FROM `users` WHERE id = '$id'";
       $value = get_user_id($id);
       $username = $value['username'];
       $password = $value['password'];
       $first_name = $value['first_name'];
       $last_name = $value['last_name'];
    }else{
        $id = null;
       $username = 'username';
       $password = 'password';
       $first_name = 'first_name';
       $last_name = 'last_name';
    }
       ?>
       <div align="center" style="margin-top: 100px;">
           <div  style="width: 100%;max-width: 600px;margin: 0px;height: auto;display: flex;justify-content: center;flex-direction: column;">
            <div class="col-lg-12 mt-5 " id="divmom">
                <form method="post" class="border-2" id="formpri" >
                        <div class="form-group">
                            <label class="mb-1" for="usernamee">user name</label>
                            <input class="form-control" value="<?PHP echo $username; ?>"  type="text" name="username" id="username" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="password">user password</label>
                            <input class="form-control" value="<?PHP echo $password; ?>" type="text" name="password" id="password" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="first_name">first email</label>
                            <input class="form-control" value="<?PHP echo $first_name; ?>"  type="text" name="first_name" id="first_name" required />
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="last_name">last name</label>
                            <input class="form-control" value="<?PHP echo $last_name; ?>"  type="text" name="last_name" id="last_name"  />
                        </div>
                          <input class="form-control" value="<?PHP echo $id; ?>"  type="hidden" name="id" id="id"   />
                        <button type="submit" class="btn btn-dark mt-3 ">send data</button>
                  </form>
                <div id="formlogin1"style="margin: 10px;">
                    <a type="button" href="?show" class="btn btn-primary mt-1 mb-1">table information</a>
                </div>
            </div>
          </div>
       </div>
            
       <?PHP
          
}
