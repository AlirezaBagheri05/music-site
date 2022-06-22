<?php
function get_title()
{
    return 'صفحه موزیک';
    
}
function get_content()
{
//       error_reporting(!E_ALL);
       if(!empty($_GET['name'])){
           $artist_user = $_GET['name'];
           $music_user = $_GET['music'];
           $music_sel = get_music_by_art_name("$artist_user", "$music_user");
           $music_name = $music_sel['music_name'];
           $artist_name = $music_sel['artist_name'];
           $music_arreng = $music_sel['music_arreng'];
           $music_artwk = $music_sel['music_artwk'];
           $music_text = $music_sel['music_text'];
           $music_conver= $music_sel['music_conver'];
           $music_path= $music_sel['music_path'];
           $music_link= $music_sel['music_link'];
           $music_img= $music_sel['music_img'];
           $music_date= $music_sel['music_date'];
       } 
       
       $row = get_music_style_db(1);
       $txt_color = $row['txt_color'];
       $ab_color = $row['ab_color'];
       $ms_color = $row['ms_color'];
       $link_color = $row['link_color'];
       $btn_color = $row['btn_color'];
       $send_color = $row['send_color'];
       $message_color = $row['message_color'];
       $shadow_color = $row['shadow_color'];
       ?>
       <div align="center" >
       <div id="motherd" class="clearfix" align="center">
                    
           <div id="content"   >
                        <h1><?PHP echo $music_name; ?></h1>
                        <div class="post" style="box-shadow:0px 0px 5px 0.2px <?PHP echo $shadow_color ;?>;">
                            <div class="img_div">
                                <div><img src="<?PHP echo $music_img; ?>" alt=""/></div>
                                <p><?PHP echo $music_name; ?></p>
                                <p><?PHP echo $artist_name; ?></p>
                            </div>
                            <div class="information_div" id="filter_div">
                                <h5>ARTIST:       <?PHP echo $artist_name; ?></h5>
                                <h5>ARRENGEMENT:       <?PHP echo $music_arreng; ?></h5>
                                <h5>ARTWORKS:       <?PHP echo $music_artwk; ?></h5>
                                <h6>DATE:       <?PHP echo $music_date; ?></h6>
                            </div>
                            <div class="music_txt_div" style="background-color:<?PHP echo $txt_color ;?>">
                                <h2>متن آهنگ</h2>
                                <div align='center'>
                                    <pre>
                                    <?PHP echo " "."<br />".$music_text."<br />"; ?>
                                    </pre>
                                </div>
                            </div>
                            <div class="report_div" style="background-color:<?PHP echo $ab_color ;?>" >
                                <h2>نقد و بررسی</h2>
                                <div>
                                    <p>
                                      <?PHP echo $music_conver ?>
                                    </p>
                                </div>
                            </div>
                            <div class="music_play_div" style="background-color:<?PHP echo $ms_color ;?>" >
                                <div>
                                        <p><?PHP echo $music_name; ?></p>
                                        <p><?PHP echo $artist_name; ?></p>
                                        <audio class="music" controls="controls">
                                            <source  src="<?PHP echo $music_path; ?>" type="audio/mpeg">
                                        </audio>
                                </div>
                            </div>
                            <div class="link_div" style="background-color:<?PHP echo $link_color ;?>" >
                                <h2>
                                    &Bumpeq; دانلود آهنگ و ریمیکس  با کیفیت های مختلف
                                </h2>
                                <div>
                                   <ol>
                                       <li><a href="<?PHP echo $music_link; ?>" >دانلود اهنگ <?PHP echo $artist_name; ?> با کیفیت  320</a></li>
                                   </ol>  
                                </div>
                            </div>
                            <div class="btn_div"  ><a href='<?PHP echo "?page_artist&name=$artist_user" ?>' style="background-color:<?PHP echo $btn_color ;?>">آلبوم آهنگ های <?PHP echo $artist_name; ?></a></div>
                            <div style="display:none !important;" class="message_send_div" style="background-color:<?PHP echo $send_color ;?>" >
                                <div>
                                <h1>ارسال نظر</h1>
                                    <form method="post">
                                        <label for="note">username</label>
                                        <textarea  name="note" id="note" rows="4" cols="80" required></textarea>
                                        <input type="reset" value="reset">
                                        <input type="submit" value="send">
                                    </form>
                                </div>
                            </div>
                            <div style="display:none !important;" class="show_message_div" style="background-color:<?PHP echo $message_color ;?>" >
                                  <h1>نظرات</h1>
                                  <div class="message_div">
                                        <div class="message_coment">
                                                <h4>1224/2/98</h4>
                                                <p>alireza</p>
                                                <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    <div class="message_coment">
                                                    <h4>1224/2/98</h4>
                                                    <p>alireza</p>
                                                    <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                    <p class="anser">mohammad hosein</p>
                                                    <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    
                                                    </div>
                                       </div>
                                      <div class="message_coment">
                                                <h4>1224/2/98</h4>
                                                <p>alireza</p>
                                                <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    <div class="message_coment">
                                                    <h4>1224/2/98</h4>
                                                    <p>alireza</p>
                                                    <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                    <p class="anser">mohammad hosein</p>
                                                    <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    
                                                    </div>
                                        </div>
                                      <div class="message_coment">
                                                <h4>1224/2/98</h4>
                                                <p>alireza</p>
                                                <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    <div class="message_coment">
                                                    <h4>1224/2/98</h4>
                                                    <p>alireza</p>
                                                    <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                    <p class="anser">mohammad hosein</p>
                                                    <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    
                                                    </div>
                                        </div>
                                      <div class="message_coment">
                                                <h4>1224/2/98</h4>
                                                <p>alireza</p>
                                                <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    <div class="message_coment">
                                                    <h4>1224/2/98</h4>
                                                    <p>alireza</p>
                                                    <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                    <p class="anser">mohammad hosein</p>
                                                    <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    
                                                    </div>
                                        </div>
                                      <div class="message_coment">
                                                <h4>1224/2/98</h4>
                                                <p>alireza</p>
                                                <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    <div class="message_coment">
                                                    <h4>1224/2/98</h4>
                                                    <p>alireza</p>
                                                    <img src="includes/css/photoshop/logo-1.png" onclick="like()" alt="alt"/><strong id="user_1">12</strong>
                                                    <p class="anser">mohammad hosein</p>
                                                    <p>it is good music but i am not love it well.tanks for this site , it is a beautiful site and i hope you are always happy and good luck my best friend , bye.</p>
                                                    
                                                    </div>
                                        </div>
                                        
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             
   <?PHP
             
}
