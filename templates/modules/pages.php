<?php

 function authentication_required()
 {
     return true ;
 }
 
function get_title()
{
    return 'صفحه ی ویرایش';
    
}

function get_content()
{
       ?>
      <div align="center">
          <div  id="start" >
           <div align="center" id="divaddh">
              
                <div id="divadd">
                    <a type="button" class="btn btn-primary " href="?start">start</a>
                </div>
            </div>
            <div>
            <table class="table table-bordered table-hover " >
                <tr class="info">
                    <th style="width: 40px" >ردیف</th>
                    <th>نام صحفه</th>
                    <th style="width: 300px" >عملیات</th>
                </tr>   
                <?PHP
                $pages = get_all_pages();
                $count = 1;
                foreach ($pages as $row) {
                    $title = $row['title'];
                    $hidden = $row['hidden'];
                    $slug = $row['slug'];
                    $id = $row['id'];
                    echo '<tr>';
                    echo "<th>$count</th>";
                    echo "<th>$title";
                    if($hidden != 0 ){
                          echo '<p style="color:red;display:inline;"> [مخفی] </p>';
                      }
                    echo "<p style='color:green'>".home_url($slug)."</p>";
                    echo "</th>";
                    echo "<th> <a href='?editpg&id=$id' class='btn btn-info btn-sm'>ویرایش</a>";
                    
                      if($hidden == 0 ){
                          echo "<a href='?pages&slug=$slug' style='margin:5px;' class='btn btn-warning btn-sm'>مخفی کردن</a>";
                      } else {
                          echo "<a href='?pages&slug=$slug' style='margin:5px;' class='btn btn-danger btn-sm'>اشکار کردن</a>";
                      }
                        
                    echo "<a href='?pages&id=$id' class='btn btn-info btn-sm'>حذف</a></th>";
                    echo '</tr>';
                    $count++;
                }
                
                ?>
            </table>
            </div>    
         </div>
        </div>

       <?PHP

}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    delete_page_by_id("$id");
    
}
if(isset($_GET['slug'])){
   
    $slug = $_GET['slug'];
    
    $pages = get_page_by_slug($slug);
    $hidden = $pages['hidden'];
    
    
    if($hidden == 0){
        $pages = get_page_by_slug($slug);
        $title = $pages['title'];
        $content = $pages['content'];
        update_page_by_slug($title, $content, $slug, 1);
    }else{
    $slug = $_GET['slug'];
    $pages = get_page_by_slug($slug);
    $title = $pages['title'];
    $content = $pages['content'];
    update_page_by_slug($title, $content, $slug,0);
    }
    
    
}
