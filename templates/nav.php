<?PHP $row = get_nav_style('1');
     $background_nav_color = $row['background_nav_color'];
     $background_nav_btn_color = $row['background_nav_btn_color'];
     $background_nav_list_color = $row['background_nav_list_color'];
     $logo_img = $row['logo_img'];
     $logo_txt = $row['logo_txt'];
     $popup_img = $row['popup_img'];
     $btn_popup_name = $row['btn_popup_name'];
     $btn_org_name = $row['btn_org_name'];
     $btn_nav_direction_img = $row['btn_nav_direction_img'];
     $btn_direction_color_pg = $row['btn_direction_color_pg'];
     $btn_direction_color_ar = $row['btn_direction_color_ar'];
     $btn_direction_color_ms = $row['btn_direction_color_ms'];
?><nav id="navheader" style="background-color:<?PHP echo $background_nav_color;?>" >
                <div  id="divheader"  >
                   <div class="navbar-header" id="divhead0" style="padding-right: 0px">
                                   <a class="navbar-brand" style="padding: 0px;padding-left: 15px;padding-right: 0px;"  href="<?PHP echo home_url('home'); ?>">
                                       <img id="imglogo" src="<?PHP echo $logo_img;?>"  alt="alt"/>
                                   </a>
                                 <!-- <a class="navbar-brand" href="<?PHP echo home_url('home'); ?>">
                                     <?PHP echo $logo_txt;?>
                                  </a>-->
                      </div>

                      <div id="navbar" >
                                   <ul class=" navbar-nav" id="btnnav1" >
                                   <li style="background-color:<?PHP echo $background_nav_btn_color;?>" > <a  href="<?PHP echo home_url('home'); ?>" ><?PHP echo $btn_org_name;?></a></li>
                                       <?PHP display_pages_list(false)?>
                                   </ul>
                                   
                                 </div><!--/.nav-collapse -->
                                    <ul id="btnnav2" class=" navbar-nav navbar-right" >
                                       <button type="button" id="list_nav" class="list_nav" onclick="showli()"><?PHP echo $btn_popup_name;?></button>
                                       
                                        <div class="btn_left" onmouseover="btn_left()" id="btn_left"></div>
                                        <img src="<?PHP echo $popup_img;?>" class="img_btn_left" id="img_btn_left" onclick="showli()"alt=""/>
                                        <div id="drag" style="background-color:<?PHP echo $background_nav_list_color;?>" >
                                            <div class="list_left">
                                                   <?PHP if(is_user_logen_in()):?>
                                                             <?PHP if(get_module_name() == 'page_artist'):?>
                                                             <li><button type="button" onClick="showli_search_div()">----</button></li>
                                                             <?PHP else: endif;?>
                                                   <a href="<?PHP echo home_url('logout');?>"><li>logout</li></a>
                                                   <li>
                                                        <strong >hello &spades; <?PHP global $current_user;echo $current_user['first_name']; ?></strong>
                                                   </li>
                                                   <a href="<?PHP echo home_url('show');?>"><li>ویرایش ادمین ها</li></a>
                                                   <a href="<?PHP echo home_url('pages');?>"><li>ویرایش صفحات</li></a>
                                                   <a href="<?PHP echo home_url('dashboard'); ?>"><li>صفحه کاربری</li></a>
                                                   <?PHP
                                                   if(!empty($_COOKIE['filter'])){
                                                       $fl = $_COOKIE['filter'];
                                                       echo '<button type="button" class="list_nav_filter"  onclick="filter()"><p id="fr" style="opacity:0;">&hookrightarrow;&bigcirc;&hookleftarrow;</p><p id="la"style="opacity:1;">&hookleftarrow;&bigcirc;&hookrightarrow;</p></button>';
                                                      
                                                   }else {
                                                           echo '<button type="button" class="list_nav_filter"  onclick="filter()"><p id="fr" style="opacity:1;">&hookrightarrow;&bigcirc;&hookleftarrow;</p><p id="la" style="opacity:0;">&hookleftarrow;&bigcirc;&hookrightarrow;</p></button>';
                                                   }
                                                   ?>
                                                   <?PHP else:?>
                                                   <a href="<?PHP echo home_url('login.php');?>"><li>login</li></a>
                                                   <?PHP if(get_module_name() == 'page_artist'):?>
                                                     <li><button type="button" onclick="showli_search_div()">----</button></li>
                                                   <?PHP else: endif;?>
                                                   <?PHP
                                                   if(!empty($_COOKIE['filter'])){
                                                       $fl = $_COOKIE['filter'];
                                                       echo '<button type="button" class="list_nav_filter"  onclick="filter()"><p id="fr" style="opacity:0;">&hookrightarrow;&bigcirc;&hookleftarrow;</p><p id="la"style="opacity:1;">&hookleftarrow;&bigcirc;&hookrightarrow;</p></button>';
                                                      
                                                   }else {
                                                           echo '<button type="button" class="list_nav_filter"  onclick="filter()"><p id="fr" style="opacity:1;">&hookrightarrow;&bigcirc;&hookleftarrow;</p><p id="la" style="opacity:0;">&hookleftarrow;&bigcirc;&hookrightarrow;</p></button>';
                                                   }
                                                   ?>
                                                   <?PHP endif;?>
                                               </div>
                                         </div>

                                     </ul>
                    </div>
        </nav>
<a href="#block" onclick="smoothScroll('block'); return true;"><img src="<?PHP echo $popup_img;?>" id="move" alt=""/></a>
