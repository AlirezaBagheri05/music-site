<?php

 
function get_title()
{
    global $current_page;
    return $current_page['title'];
    
}

function get_content()
{
       ?>
<div id="filter_div" style="margin-top: 100px;" >
      <?PHP
      global $current_page;
      echo $current_page['content'];
      ?>
      </div>
      <?PHP
}