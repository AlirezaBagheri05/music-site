<?php

function redirect_to($url){
        header("Location: $url");
        die();
}

function home_url($path=null){
    return SITE_URL.'?'.$path;
}

function get_module_name(){
    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $rqu = str_replace(SITE_URL,'',$url);
    if (!empty($rqu)){
       $module = str_replace('?','',$rqu);
       $module = str_replace('.php','',$module);
       $pos = strpos( $module,'&');
    if ($pos !== false){
       $module = substr( $module,0, $pos);
       return $module; 
    } 
       return $module; 
    } else {
       return $rqu; 
    }
       
}
//function get_page_name(){
//    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//    $rqu = str_replace(SITE_URL,'',$url);
//    if($rqu == '://www.eawall.ir/'){
//    return 'home';
//    }else{
//      return $rqu;
//    }
//}
function is_valid_url($url){
    if(empty($url)){
        return ;
    }
    return (filter_var($url, FILTER_VALIDATE_URL) !== false);
}

