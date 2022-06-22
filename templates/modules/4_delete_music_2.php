<?php

 function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'which!';
    
}

function get_content()
{
    
       ?>
<div id="org">
                <div class="btn_div_org">
                   <div id="choose_ar">
                       <?PHP
                             $artist_user = $_GET['name'];
                             $row = get_music_all($artist_user);
                             for($i = 0;count($row) > $i;$i++){
                                 $name = $row[$i]['music_user'];
                                 $first = $row[$i]['music_name'];
                                 echo "<a type='button' href='?4_delete_music.php&name=$name'>$first</a>";
                             }
                       ?>
                   </div>
                </div>
           </div>
       <?PHP
}
