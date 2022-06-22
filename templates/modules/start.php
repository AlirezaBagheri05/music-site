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
                    <a type="button" href="?add_pg">add</a>
                </div>
                <div class="btn_div_org">
                    <a type="button" href="?delete_pg">delete</a>
                </div>
                <div class="btn_div_org">
                   <a type="button" href="?edit_pg">edit</a>
                </div>
</div>
       <?PHP
}