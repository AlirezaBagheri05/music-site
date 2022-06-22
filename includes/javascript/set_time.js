
setInterval(function(){time_btn_screen();} , 1);
function time_btn_screen(){
    if(document.getElementById('btn_left')){
        var ss_btn = window.innerHeight;
        var size_btn = document.getElementById('btn_left').style.height = ss_btn+"px";
    }

}
setInterval(function(){time_btn_img_screen();} , 1);
function time_btn_img_screen(){
    if(document.getElementById('img_btn_left')){
        var ss_img = window.innerHeight;
        document.getElementById('img_btn_left').style.top = (ss_img/3)+"px";
    }

}
setInterval(function(){time_btn_div_screen();} , 1);
function time_btn_div_screen(){
    if(document.getElementById('drag')){
        var ss_img = window.innerHeight;
        var ss = document.getElementById('drag').style.height = (ss_img+20)+'px';
    }

}
setInterval(function(){time_btn_img_L_screen();} , 4000);
function time_btn_img_L_screen(){
    if(document.getElementById('img_btn_left')){
        document.getElementById('img_btn_left').style.left = "-100px";
    }

}
    
setInterval(function(){time_nav_div();} , 1);
function time_nav_div(){
    if(document.getElementById('nav_div')){
        var ss = window.innerWidth;
        var si = document.getElementById('nav_div').style.width = ss+'px';
    }
    
}            


setInterval(function(){time_nav_db();} , 1);
function time_nav_db(){
    if(document.documentElement){
        if(self.pageYOffset){
        var nav = self.pageYOffset;
        var name = 'scroll' + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            var ss = c.substring(name.length, c.length);
            if(document.getElementById('filter_div')){
            var height = document.getElementById('filter_div').offsetTop;
            }else{
            var height = 0;
            }
            if(nav > ss && nav > (height-65)){
                document.getElementById('navheader').style.top = '-68px';
                document.getElementById('move').style.bottom = '20px';
            }else if(nav < ss){
                document.getElementById('navheader').style.top = '0px';
                document.getElementById('move').style.bottom = '-80px';
            }
          }
        }
            
        var height = window.innerHeight;
        document.cookie = "scroll="+nav;
        }
    }
}
        var height = window.innerHeight;
        var width = window.innerWidth;
        if(document.getElementById('photoshop_pictuer_org')){
        if(height > width){
            setInterval(function(){time_screen();} ,500);
                function time_screen(){
                    if(document.getElementById('searchd')){
                        var ss = document.getElementById('photoshop_pictuer_org').clientHeight;
                        document.getElementById('searchd').style.height = (ss+'px');
                    }

                }
                
            }else{
                setInterval(function(){time_screen();} ,500);
                function time_screen(){
                    if(document.getElementById('searchd')){
                        var ss = window.innerHeight;
                        document.getElementById('searchd').style.height = ((ss-40)+'px');
                    }

                }
            }
        }
        
            
            
