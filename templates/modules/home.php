<?php

 
function get_title()
{
    return 'صفحه اصلی';
    
}

function get_content()
{
    $row = get_nav_style('1');
    $background_nav_color = $row['background_nav_color'];
    $img_org = $row['img_org'];
       ?>
          
            
            <div align="center" >
             <div id="searchd"aling='center' class="clearfix" >
                    <div id="hwe" align="center">
                                <h1 id="h1a"><p>ALIREZA BAGHERI</p></h1>
                    </div>  
                    <div id="search_div" >
                        <form method="post"  style="display: none;"   id="form_search_page"  >
                             <div id="form_search_page_div"  >
                                <label for="data">search</label><br />
                                   <input type="text" name="data" id="data" /><br />
                                   <button type="submit" onclick="click()">let,s go</button>
                                   <a type="button" href="home" >home</a>
                             </div>

                         </form>
                    </div>
                 <img src="<?PHP echo $img_org; ?>" class="photoshop_pictuer_org" id="photoshop_pictuer_org" alt=""/>
                </div>
                <div class="filter_div" id="filter_div" style="background-color:<?PHP echo $background_nav_color;?>;" >
                    <?PHP
                      $row = get_music_style('home');
//                    $sad = $row['sad_ms'];
//                    $happy = $row['happy_ms'];
//                    $rap = $row['rap_ms'];
                      
                        foreach ($row as $value) {
                            
                            if($row['id'] != $value  && $row['artist_user'] != $value && !empty($value)){
                                echo "<a><button ='button' onclick='click()'>$value</button></a>";
                            }
                        }
                    ?>
                </div>
                <div id="motherd" class="clearfix">
                    <div id="list" >
                        <h1>&triangledown;&triangle; ARTISTS &triangledown;&triangle;</h1>
                        
                        <div >
                            <ul>
                                <?PHP
                              $music = get_artist_all();
                              rsort($music);
                              
                              if(count($music) >= 12){
                                for($i = 0;$i<12;$i++){
                                  $music_user = get_artist_user();
                                  if(check_artist_like($music_user[$i]['artist_user'])){ 
                                   if($i >= 1){
                                    $ia = $i-1;
                                    if($music[$ia] === $music[$i])
                                        {
                                            
                                            $ar = get_artist_all_like("$music[$i]");
                                            $id =  $ar['id'];
                                            $artist_user =  $ar['artist_user'];
                                            $artist_like = $music[$i]-1;
                                            update_artist_like_by_like($artist_like, $id, $artist_user);
                                            }
                                       
                                    }
                                   $ar1 = get_artist_all_like("$music[$i]");
                                   $name =  $ar1['artist_name'];
                                   $artist1 =  $ar1['artist_user'];
                                   $music_img = $ar1['artist_img'];
                                echo "<li><p>$name</p><a href='?page_artist&name=$artist1'><img src='$music_img' id='png_most' class='most_img'  alt=''/></a></li>"; 
                                   }
                                }
                                }else {
                                for($i = 0;$i<count($music);$i=$i+1){
                                    $music_user = get_artist_user('artist');
                                    if(check_artist_like($music_user[$i]['artist_user'])){
                                    if($i >= 1){
                                    $ia = $i-1;
                                    if($music[$ia] === $music[$i])
                                        { 
                                        
                                        $ar = get_artist_all_like("$music[$i]");
                                        $id =  $ar['id'];
                                        $artist_user =  $ar['artist_user'];
                                        $artist_like = $music[$i]-1;
                                        update_artist_like_by_like($artist_like, $id, $artist_user);
                                        }
                                        };
                                     
                                   $ar1 = get_artist_all_like("$music[$i]");
                                   $name =  $ar1['artist_name'];
                                   $artist1 =  $ar1['artist_user'];
                                   $music_img = $ar1['artist_img'];
                                echo "<li><p>$name</p><a href='?page_artist&name=$artist1'><img src='$music_img' id='png_most' class='most_img'  alt=''/></a></li>"; 
                               
                                    }
                                
                                 }
                                }
                               
                                      ?>
                                 
                            </ul>

                        </div>
                    </div> 
                    <div id="content" >
                        
                        <h1 style="color: gray;">آهنگ های پرطرفدار</h1>
                            <?PHP  
                                $all_music = get_music_all_home();
                                $id = array();
                                foreach ($all_music as $music){
                                    $id[] = $music['id'];
                                }
                                rsort($id);
                                for($i = 0;$i<count($id);$i=$i+1){
                                   $music = get_music_id("$id[$i]");
                                   $name =  $music['music_name'];
                                   $name1 =  $music['music_user'];
                                   $artist1 =  $music['artist_name'];
                                   $artist2 =  $music['artist_user'];
                                   $arrengment = $music['music_arreng'];
                                   $artswork = $music['music_artwk'];
                                   $date = $music['music_date'];
                                   $img = $music['music_img'];
                                   $like = $music['music_like'];
                                   $numdl = $music['music_numdl'];
                                   echo "
                                <div class='post'>
                                    <div>
                                        <div><img src='$img' alt=''/></div>
                                        <p>$name</p>
                                        <p>$artist1</p>
                                    </div>
                                    <div><h5>ARTIST: $name</h5><h5>ARRENGEMENT : $arrengment</h5><h5>ARTWORKS: $artswork</h5><h6>DATE: $date</h6></div>";
                                    echo "<div class='div_like' onclick='redirect(this)' ><img src='includes/css/photoshop/like.png' alt=''/><p>$like</p></div>";
                                    echo "<div class='div_numdl'><p>$numdl</p><img src='includes/css/photoshop/download.png' alt=''/></div>
                                     <div><a  href='?page_music&name=$artist2&music=$name1'>ادامه مطلب</a></div>

                                </div>";
                                }

                        ?>
                        
                    </div>
                    
                </div>
             </div>
             
       <?PHP
             
}
