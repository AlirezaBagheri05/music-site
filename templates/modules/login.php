<?php

 
function get_title()
{
    return 'ورود به برنامه';
    
}

function get_content()
{     
  
      
    
       ?>
          
            <h1  style="margin-top: 50px;"><p>فرم لاگین در این صفحه است. </p></h1>
            <p >تعدادکاربران سایت: <?PHP echo count_user(); ?></p>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">فرم لاگین</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" >
                                <div class="form-group bg-warning">
                                <label for="username" class="col-sm-2 control-label">name</label>
                                <?php
                            $username = '';
                            if(isset($_POST['username'])) {
                                $username = $_POST['username'];
                            }
                            ?>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="username" name="username" value="<?php echo $username; ?>" placeholder="نام کاربری">
                                    </div>
                                </div>
                                <div class="form-group bg-info ">
                                <label for="password" class="col-sm-2 control-label ">password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="login" class="btn btn-primary col-md-4 ">sign</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            
            
       <?PHP
       
}


function process_inputs() {
    
    if(!isset($_POST['login'])) {
        return;
    }
    
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
    }

    if(empty($username)) {
        add_message('نام کاربری نمی تواند خالی باشد.', 'error');
        return;
    }
    
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
        
    }
    
    if(empty($password)) {
        add_message('رمز عبور نمی تواند خالی باشد.', 'error');
        return;
    }
    
    user_login($username,$password);
    
    if(!is_user_logen_in()) {
        add_message('نام کاربری یا رمز عبور، اشتباه است.', 'error');
    } else {
        redirect_to(home_url('dashboard'));
    }
    
}
