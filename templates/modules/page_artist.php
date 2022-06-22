<?php
function get_title()
{
    return 'صفحه ارتیست';
}
function get_content()
{
    $row = get_nav_style('1');
    $background_nav_color = $row['background_nav_color'];
    if (!empty($_GET['name'])){
      $artist = $_GET['name'];
      $row = get_artist("$artist");
      if (!empty($row)){
      $artist_name = $row['artist_name'];
      $artist_user = $row['artist_user'];
      $artist_img = $row['artist_img'];
      }
    }
    
       ?>
          
            <div align="center" >
                 
                <div id="searchd" class="clearfix" >
                    
                    <div id="search_div" >
                    <div id="hwe" align="center">
                       <h1 id="h1a"><p><?PHP echo $artist_name; ?></p></h1>
                    </div>
                        <form method="post"  style="display:none;"   id="form_search_page"  >
                             <div id="form_search_page_div"  >
                                <label for="data">search</label><br />
                                   <input type="text" name="data" id="data" /><br />
                                   <button type="submit" onclick="click()">let,s go</button>
                                   <a type="button" href="home" >home</a>
                             </div>

                         </form>
                    </div>
                                   <img src="<?PHP echo $artist_img; ?>" class="photoshop_pictuer" id="photoshop_pictuer_org" alt=""/>
                </div>

                <div class="filter_div" id="filter_div" style="background-color:<?PHP echo $background_nav_color;?>;" >
                    <?PHP
                    if(!empty(get_music_style($artist_user))){
                      $row = get_music_style( $artist_user);
//                    $sad = $row['sad_ms'];
//                    $happy = $row['happy_ms'];
//                    $rap = $row['rap_ms'];
                      
                        foreach ($row as $value) {
                            
                            if($row['id'] != $value  && $row['artist_user'] != $value && !empty($value)){
                                echo "<a><button ='button' onclick='click()'>$value</button></a>";
                            }
                        }
                    }
                    ?>
                </div>
                <div id="motherd" >
                    <div id="list" >
                         <h1>&triangledown;&triangle; پر طرفدار ترین ها &triangledown;&triangle;</h1>
                        
                        <div align="center" >
                            <ul>
                                <?PHP
                                if(!empty($artist_user)){
                                $all_music = get_music_all($artist_user);
                                
                                $array = array();
                                foreach ($all_music as $music){
                                   $array[] =  $music['music_like'];
                                }
                                rsort($array);
                                
                                  
                                if(count($array) >= 12){
                                for($i = 0;$i<12;$i++){
                                   if($i >= 1){
                                    $ia = $i-1;
                                    if($array[$ia] === $array[$i])
                                        { 
                                        $music = get_music_all_like("$array[$i]");
                                        $id =  $music['id'];
                                        $artist_user =  $music['artist_user'];
                                        $music_like = $array[$i]-1;
                                        update_music_like_by_like($music_like, $id, $artist_user);
                                        };
                                    }
                                   $music = get_music_all_like("$array[$i]");
                                   $name =  $music['music_name'];
                                   $name1 =  $music['music_user'];
                                   $artist1 =  $music['artist_user'];
                                   $music_img = $music['music_img'];
                                echo "<li><p>$name</p><a href='?page_music&name=$artist1&music=$name1'><img src='$music_img' id='png_most' class='most_img'  alt=''/></a></li>"; 
                               
                                }
                                }else {
                                for($i = 0;$i<count($array);$i=$i+1){
                                    if($i >= 1){
                                    $ia = $i-1;
                                    if($array[$ia] === $array[$i])
                                        { 
                                        $music = get_music_all_like("$array[$i]");
                                        $id =  $music['id'];
                                        $artist_user =  $music['artist_user'];
                                        $music_like = $array[$i]-1;
                                        update_music_like_by_like($music_like, $id, $artist_user);
                                        };
                                    }
                                   $music1 = get_music_all_like("$array[$i]");
                                   $name =  $music1['music_name'];
                                   $artist1 =  $music1['artist_user'];
                                   $name1 =  $music1['music_user'];
                                   $music_img = $music1['music_img'];
                                   $artist2 =  $music1['artist_user'];
                                echo "<li><p>$name</p><a href='?page_music&name=$artist2&music=$name1'><img src='$music_img' id='png_most' class='most_img' class='photoshop_pictuer' alt=''/></li></a>"; 
                                
                                }
                                }
                                }
                                ?>

                            </ul>
                           
                        </div>
                    </div>
                    <div id="content" >
                        <h1>تمام موزیک ها</h1><?PHP  
                        if (!empty( $artist_user)){
                        $all_music = get_music_all($artist_user);
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
                        
                        }
                        ?>
                    </div>
                   </div>
                
             </div>
             
       <?PHP
             
}
