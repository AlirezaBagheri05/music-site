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
    
       if(isset($_POST['submit'])){
           
           if(isset($_POST['title']))
           {
           $title = $_POST['title'];
           } else {
            $title = 'nickname';
           }
           if(isset($_POST['slug']))
           {
           $slug = $_POST['slug'];
           } else {
            $slug = 'nickname';
           }
           if(!empty($_POST['content']))
           {
           $content= $_POST['content'];
           } else {
           $content= '<p style="color:red;">در این صقحه محتوایی قرار نگرفته است.</p>';
           }
           if(isset($_POST['id']))
           {
           $id= $_POST['id'];
           } 
           if(isset($_POST['hidden']))
           {
           $hidden = $_POST['hidden'];
           } else {
           $hidden = 0;
           }
           update_page_by_id($title, $content,$slug,$hidden,$id);
           redirect_to(home_url("$slug"));
           die();
       }
       
       if(isset($_GET['id'])){
           $id = $_GET['id'];
           $page = get_page_by_id($id);
           $title = $page['title'];
           $slug = $page['slug'];
           $hidden = $page['hidden'];
           $content = $page['content'];
           
       };
       ?>
         
    <div align="center">
        <h1 class="h1 " id="title-name">ویرایش صفحه <?PHP echo $title; ?></h1>
    </div>
    <div>
        <div align='center'>
            <div id="box-table">
                <form id="form-table" method="POST">
                    <div id="titled">
                        <div id='divtitle'>
                            <label class="mb-1 " for="title"><p style="font-size:30px;">title name</p></lable>
                            <input class="form-control" value="<?PHP echo $title; ?>"  type="text" name="title" id='title'/>
                        </div>
                    </div>
                    <div id="slugd">
                        <div id='divslug'>
                            <label class="mb-1" for="slug"><p style="font-size:30px;">slug name</p></lable>
                            <input class="form-control" value="<?PHP echo $slug; ?>"  type="text" name="slug" id='slug' />
                        </div>
                    </div>
                    <div id="contentd">
                        <div id='divcontent'>
                            <label class="mb-1" for="content"><p style="font-size:30px;">content</p></lable>
                            <textarea id="content" style="text-align:left;" class="form-control" name="content" rows="5" cols="10"  ><?PHP echo $content; ?></textarea>
                        </div>
                    </div>
                    <div id="hiddend">
                        <div id='divhidden'>
                            
                                <label class="mb-1" for="hidden"><p style="font-size:30px;">hidden</p></lable>
                                <input class="form-control" value="1" <?PHP if($hidden == '1'){ echo'checked';}; ?> type="checkbox" name="hidden" id="hidden"   />
                          
                                <input class="form-control" value="<?PHP echo $id; ?>" type="hidden" name="id" />
                        </div>
                    </div>
                    <div id="submitd">
                        <div id='divsubmit'>
                            <input class="btn btn-info"  type="submit" value="submit" name="submit" id='submit' />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
             
       <?PHP
}
