<?php

 function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'artiast';
    
}

function get_content()
{
    
       ?>
<div id="org">
                <div class="btn_div_org">
                   <div id="choose_ar">
                       <?PHP
                             $row = get_artist_user();
                             for($i = 0;count($row) > $i;$i++){
                                 $name = $row[$i]['artist_user'];
                                 $first = $row[$i]['artist_name'];
                                 $url = home_url('3_add_music');
                                 echo "<a type='button' href='$url&name=$name'>$first</a>";
                             }
                       ?>
                   </div>
                </div>
</div>
       <?PHP
}
