<?php

 function authentication_required()
 {
     return true ;
 }

function get_title()
{
    return 'شروع';
    
}

function get_content()
{
    
       ?>
<div id="org">
                <div class="btn_div_org">
                    <a type="button" href="?5_edit_artist_1">artist</a>
                </div>
                <div class="btn_div_org">
                   <a type="button" href="?5_edit_music_1">music</a>
                </div>
</div>
       <?PHP
}