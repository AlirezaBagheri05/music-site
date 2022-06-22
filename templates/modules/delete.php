<?php
                
                $id = $_GET['id'];
                delete_user_id($id);
                header('Location: show');

