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
                    <a type="button" href="<?PHP echo home_url('1_add_page.php');?>">add page</a>
                </div>
                <div class="btn_div_org">
                   <a type="button" href="<?PHP echo home_url('2_add_artist.php');?>">add artist</a>
                </div>
                <div class="btn_div_org">
                   <a type="button" href="<?PHP echo home_url('3_add_music_1.php');?>">add music</a>
                </div>
</div>
       <?PHP
}
