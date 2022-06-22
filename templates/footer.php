<?PHP
    $row = get_footer_style(1);
    $bg_img = $row['bg_img'];
    $bg_br_cr_color = $row['bg_br_cr_color'];
    $bg_br_line_color = $row['bg_br_line_color'];
    $bg_color = $row['bg_color'];
    $bg_line = $row['bg_line'];
    $bg_img_name = $row['bg_img_name'];
    $bg_logo_img = $row['bg_logo_img'];
    $bg_txt = $row['bg_txt'];
    $bg_report = $row['bg_report'];
?>     
<div class="footer_div" id="footer_div" style="border-top: 10px solid <?PHP echo $bg_br_line_color ; ?>;background-color:<?PHP echo $bg_color ; ?>;" >
            <div class="list_footer_div" align='center'>
                <div class="list_footer_div2" style="border-bottom: 1px solid <?PHP echo $bg_line; ?>;" >
    
   
                    <div class="img_footer_div" style="border:5px solid <?PHP echo $bg_br_cr_color; ?> ;background-image: url('<?PHP echo $bg_img; ?>'); " ><p><?PHP echo $bg_img_name; ?></p></div>
                    <div class="tb_r_footer_div"><ul>
                                                    <li>first first   first</li>
                                                    <li>second second second second second</li>
                                                    <li> third third third third</li>
                                                    <li>first first first</li>
                                                    <li>second second second second second</li>
                                                    <li> third third third third</li>
                                                    <li>first first first</li>
                                                    <li>second second second second second</li>
                                                    <li> third third third third</li>
                                                  </ul>
                    </div>
                    <div class="tb_l_footer_div"><ul>
                                                    <li>first first first first</li>
                                                    <li>second sececond sececond sececond second second second second</li>
                                                    <li> third third third third</li>
                                                    <li>first first first</li>
                                                    <li>second second second second second</li>
                                                    <li> third third third third</li>
                                                 </ul>
                    </div>
                </div>
               <img src="<?PHP echo $bg_logo_img ; ?>" alt=""/>
               <p  style="text-align: right;direction: rtl;"><?PHP echo $bg_txt; ?></p>
               
            </div> 
    <div class="text_end"><?PHP echo $bg_report; ?></div>
 

        <?PHP
        $module = get_module_name();
        if(empty($module)){
            $module = 'home';
        }
        if($module == "index.php"){
        $module = 'home';
        }
        $url_js = SITE_URL."includes/javascript/$module.js";
        echo "<script src='$url_js' type='text/javascript'></script>";

        ?>
        <script src="includes/javascript/set_time.js" type="text/javascript"></script>
        <script src="includes/javascript/nav.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo SITE_URL; ?>includes/bootstrap/js/bootstrap-rtl.min.js"></script>

        </div>
       </div>
       </div>
    </body>
</html>
