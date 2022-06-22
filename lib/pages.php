<?php

//error_reporting(0);

//COUNT//COUNT//COUNT//COUNT//ALL PAGE

function get_all_pages(){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "select * from ".tb_pages;
    $result = mysqli_query($link, $query);
    $pages = array();
    while($row = mysqli_fetch_array($result)){
        $pages[]= $row;
    }
    return $pages;
}

//COUNT//COUNT//COUNT//COUNT//COUNT

function count_page($co = true){
    if($co){
        $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
        $query = "select * from ".tb_pages;
        $result = mysqli_query($link, $query);
        return  mysqli_num_rows($result);
    } else {
        $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
        $query = "select * from ".tb_pages." where hidden = 0";
        $result = mysqli_query($link, $query);
        return  mysqli_num_rows($result);
    }
    
//    mysqli_close($link);
}


//GET//GET//GET//GET//GET//GET//GET//by slug//by slug

function get_page_by_slug($slug){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_pages." where slug = '$slug'";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
    return $row;
    
}

//EXISTS//EXISTS//EXISTS//EXISTS//by slug//by slug

function exists_page_by_slug($slug){
    $row = get_page_by_slug($slug);
    return isset($row['id']);
     
}

//ADD//ADD//ADD//ADD//ADD//ADD//ADD//by slug//by slug

function add_page_by_slug($title,$content,$slug,$hidden){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_pages." where slug = '$slug'" ;
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    if(!isset($row['id'])){
         
         $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
         $qrd = "insert into ".tb_pages." (title,content,slug,hidden)values('$title','$content','$slug','$hidden')";
         $result = mysqli_query($link, $qrd);
         if($result){echo '<BR />that add truuu!!';} else {echo '<BR />thats add false!!';}
         mysqli_close($link);
     } else {
         
          $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
          $qrd = "update ".tb_pages." set
              title ='$title',content = '$content',slug='$slug',hidden='$hidden' where  slug = '$slug'";
            $result = mysqli_query($link, $qrd);
            
          mysqli_close($link);
       }
   
   
    
     
}

//UPDATE//UPDATE//UPDATE//UPDATE//UPDATE//by slug//by slug

function update_page_by_slug($title,$content,$slug,$hidden){
    add_page_by_slug($title,$content,$slug,$hidden);
}

//DELETE//DELETE//DELETE//DELETE//DELETE//by slug//by slug

function delete_page_by_slug($slug){
    $exists = exists_page_by_slug($slug);
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "delete from ".tb_pages." where slug = '$slug'";
    
    $result = mysqli_query($link,$query);
    if($exists)
        {
            echo '<BR />that delete true!!<BR />';
        } else {
            echo '<BR />that delete false!!<BR />';
        }
    mysqli_close($link);
    return $result;
}

//GET//GET//GET//GET//GET//GET//GET//by id//by id

function get_page_by_id($id){
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_pages." where id = '$id'";
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    mysqli_close($link);
    return $row;
    
}

//EXISTS//EXISTS//EXISTS//EXISTS//EXISTS//by id//by id

function exists_page_by_id($id){
    $row = get_page_by_id($id);
    
    return isset($row['id']);
     
}

//ADD//ADD//ADD//ADD//ADD//ADD//ADD//ADD//by id//by id

function add_page_by_id($title,$content,$slug,$hidden=0,$id){
    if (!$id){
        return;
    }
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $qrd = "select * from ".tb_pages." where id = '$id'" ;
    $result = mysqli_query($link, $qrd);
    $row = mysqli_fetch_array($result);
    if(!isset($row['id'])){
         $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
         $qrd = "insert into ".tb_pages." (title,content,slug,hidden)values('$title','$content','$slug','$hidden')";
         $result = mysqli_query($link, $qrd);
         mysqli_close($link);
     } else {
          $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
          $qrd = "update ".tb_pages." set
              title ='$title',content = '$content',slug='$slug' , hidden='$hidden' where  id = '$id'";
          $result = mysqli_query($link, $qrd);
          mysqli_close($link);
       }
}

//UPDATE//UPDATE//UPDATE//UPDATE//UPDATE//by id//by id

function update_page_by_id($title, $content, $slug, $hidden, $id){
    add_page_by_id($title, $content, $slug, $hidden, $id);
}

//DELETE//DELETE//DELETE//DELETE//DELETE//by id//by id

function delete_page_by_id($id){
    $exists = exists_page_by_id($id);
    $link = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
    $query = "delete from ".tb_pages." where id = '$id'";
    
    $result = mysqli_query($link,$query);
    
    mysqli_close($link);
    
}


function get_page_title($id){
    $page = get_page_by_id($id);
    if(!$page){
        return ;
    }
    return $page['title'];
}

function get_page_content($id){
    $page = get_page_by_id($id);
    if(!$page){
        return ;
    }
    return $page['content'];
}

function get_page_slug($id){
    $page = get_page_by_id($id);
    if(!$page){
        return ;
    }
    return $page['slug'];
}

function is_page_hidden($id){
    $page = get_page_by_id($id);
    if(!$page){
        return false;
    }
    if ($page['hidden']){
        return true;
    }
    return false;
}

function get_page_url($id){
    $slug = get_page_slug($id);
    return home_url($slug);
}

function display_pages_list($ul = true){
    $row = get_all_pages();
    if($ul){
    echo '<ul>';
    }
    foreach($row as $page){
        if (!$page['hidden']== 0){
            continue;
        }
        $url = get_page_url($page['id']);
        $title = $page['title'];
        echo "<a href='$url'><li>";
        echo $title;
        echo '</a></li>';
        
    }
    if ($ul){
    echo '</ul>';
    }
}














