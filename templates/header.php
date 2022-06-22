<?PHP if (!function_exists('get_title')){function get_title(){return APP_TITLE;}}
$module = get_module_name();
if(empty($module)){$module = 'home';}
if($module == "index.php"){$module = 'home';}$url_css = SITE_URL."includes/css/$module.css";
echo "<link href='$url_css' rel='stylesheet'>";$row = get_nav_style(1);$bg_cl = $row['bg_cl'];?>
<title><?PHP echo get_title(); ?></title>
</head>
<body style='background-color:<?PHP if(!empty($_COOKIE["filter"])){$fl = $_COOKIE["filter"];echo "black";}else {echo "$bg_cl";}?>'>
<div id="block" >
<?PHP  include_once ('templates/nav.php'); ?>
<div class="filter_body" id="body" >
