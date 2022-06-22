<?php

 function authentication_required()
 {
     return true ;
 }
 
function get_title()
{
    return 'صفحه نمایش ادمین ها';
    
}

function get_content()
{
       ?>

    <div align="center" style="margin-top: 100px;">
        <div style="width: 90%;display: flex;flex-direction: column;align-items: center;">
            
            <div align="center" class="col-lg-12 mt-3" style="max-width: 350px;">
             <form method="post" action="show" id="formsearch">
                    <div class="form-group">
                        <label class="mb-1" for="data">data:</label>
                        <input class="form-control" type="text" name="data" id="data" />
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="para">chose paramater: </label>
                        <select class="form-control" name="param" id="param">
                            <option value="id">id</option>
                            <option value="username">username</option>
                            <option value="password">password</option>
                            <option value="first_name">first_name</option>
                            <option value="last_name">last_name</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3 mb-1">search data</button>
              </form>
             <div id="formlogin">
              <a type="button" href="?show" class="btn btn-primary mt-1 mb-1"style="margin: 10px;">all data</a>
              <a type="button" href="?insert" class="btn btn-danger mt-1 mb-1">form information</a>
             </div>
        </div>
        <div class="col-lg-12" style="width: 100%;overflow: auto;">
            <table class="table table-hover table-striped table-bordered col-lg-12 mt-5">
                <tr>
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>PASSWORD</td>
                    <td>FIRST_NAME</td>
                    <td>LAST_NAME</td>
                    <td>ACTION</td>
                </tr>
                <?PHP
                
                if(isset($_POST['data'])){
                $data =  $_POST['data'];
                $param = $_POST['param'];
                $connect = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
                $sql3 = "select * from users where $param = '$data'";
                $result = mysqli_query($connect,$sql3);
                
                while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".
                "<a class='btn btn-primary' href='".SITE_URL."?insert&id=".$row['id']."'>EDIT</a>"
                ."   ".
                "<a class='btn btn-danger' href='".SITE_URL."?delete&id=".$row['id']."'>DELETE</a>"
                
                ."</td>";
                echo "</tr>";
                
                }
                mysqli_close($connect);
                } elseif(!isset($_POST['data'])) {
                $connect = mysqli_connect(SERVER_NAME,USER_NAME,USER_PASSWORD,db_name);
                $sql3 = "select * from users";
                $result = mysqli_query($connect,$sql3);
                
                while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".
                "<a class='btn btn-primary' href='".SITE_URL."?insert&id=".$row['id']."'>EDIT</a>"
                ."   ".
                "<a class='btn btn-danger' href='".SITE_URL."?delete&id=".$row['id']."'>DELETE</a>"
                
                ."</td>";
                echo "</tr>";
                }
                mysqli_close($connect);
                } 
                ?>
            </table>
        </div>
       </div>
      </div>
       <?PHP
            
}

      
    
