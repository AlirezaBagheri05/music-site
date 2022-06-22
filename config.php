<?php

session_start();

error_reporting(0);

define('SERVER_NAME', 'localhost');

define('db_name', '9868_dbpa');

define('USER_NAME', 'root');

define('USER_PASSWORD', '');

define('tb_user', 'users');

define('tb_artist', 'artist');

define('tb_music_style', 'music_style');

define('tb_music', 'music');

define('tb_pages', 'pages');

define('tb_nav_style', 'nav_style');

define('tb_footer_style', 'footer_style');

define('tb_music_style_db', 'music_style_db');




define('SITE_URL', 'http://localhost/mysite/' );

define('SITE_PATH', __DIR__ . DIRECTORY_SEPARATOR);

define('APP_TITLE', 'musical');

foreach (glob('lib/*.php') as $lib_file)
{
    include_once ($lib_file);
}



//create_table_user(db_name, 'rd');
//initialize_user('dbpa', 'rd');
//echo 'تعداد کاربران : '.count_user('dbpa', 'rd').'<br />';
//drop_table(db_name, 'rd');
