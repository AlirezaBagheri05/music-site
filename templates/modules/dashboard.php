<?php

 function authentication_required()
 {
     return true ;
 }
 
function get_title()
{
    return 'صفحه کاربری';
    
}

function get_content()
{
       ?>

            <h1 style="margin-top: 50px;"><p>در این صفحه اطلاعات کاربران وارد شده را نمایش می شود.</p></h1>
            <p >تعدادکاربران سایت: <?PHP echo count_user(); ?></p>

       <?PHP
          $count =  count_page(false);
             echo "<p>تعداد صفحات  سایت $count است.</p>";
}
