<?php

 function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'delete';
    
}

function get_content()
{
    
       ?>
<div id="org">
                <div class="btn_div_org">
                    <a type="button" href="?4_delete_artist_1">delete artist</a>
                </div>
                <div class="btn_div_org">
                   <a type="button" href="?4_delete_music_1">delete music</a>
                </div>
</div>
       <?PHP
}
