<?php

function render_page(){if(function_exists('process_inputs')) {process_inputs();}include_once 'templates/header.php';
    if(function_exists('get_content')){
        get_content();
    }else {
        add_message('لینک وارد شده اشتباه میباشد', 'error');
    }
    
    
    show_message();
    include_once 'templates/footer.php'; 
   
}

function load_module(){
   
    $module = get_module_name();
    if($module == "index"){
        $module = 'home';
    }
    if($module == "index.php"){
        $module = 'home';
    }
    if(empty($module)){
        $module = 'home';
    }
    if(is_user_logen_in() && $module == 'login'){
        redirect_to(home_url('DASHBOARD'));
    }

    $file_name = "templates/modules/".$module.".php";
    if(file_exists($file_name)){
        include_once "templates/modules/".$module.".php";
        check_for_authentication_required();
    } elseif (exists_page_by_slug($module)) {
        global $current_page;
        $current_page = get_page_by_slug($module);
        if($current_page['hidden'] == 0){
        include_once "templates/modules/page_loder.php";
        } else {
            add_message('این پیج از طرف ادمین سایت متوقف شده است.', 'warning');
        }
    }
    render_page();
}


function is_authentication_required(){
    if(function_exists('authentication_required')){
        return true;
    }
    return false;
}

function check_for_authentication_required(){
        if(is_authentication_required() && !is_user_logen_in()){
            $url = home_url('login');
            redirect_to(redirect_to($url));
        }
}

$message= array();

function add_message($message1 = null,$type = null){
    if(empty($message1)){
        return;
    }
    global $message;
    $message[]= array(
        'message' => $message1,
        'type' => $type,
       
    );
     
}

function show_message(){
    global $message;
    if(empty($message)){
        return ;
    }
        foreach ($message as $item){
            $me = $item['message'];
            $ty = $item['type'];
            
            if($ty == 'error'){
                $ty = 'danger';
            }
            echo "
            <div class='alert alert-$ty'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <h4>$ty</h4>
              $me
            </div>    
            ";
        }
        
    
}
