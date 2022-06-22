var coun = new Array();
coun[0]=1;
coun[1]=1;
coun[2]=1; 
function currentYPosition(){
    //Firefox, Chrome, Opera, Safari
    if(self.pageYOffset){
        return self.pageYOffset;
    }
    
    //Internet Explorer 6
    if(document.documentElement && document.documentElement.scrollTop){
        return document.documentElement.scrollTop;
    }
    
    //Internet Explorer 6, 7 and 8
    if(document.body.scrollTop){
        return document.body.scrollTop;
    }
    
    return 0;
}

function elmYPosition(id){
    var elm = document.getElementById(id);
    var y = elm.offsetTop;
    return y;
}
function smoothScroll(id) {
    var startY = currentYPosition();
    var stopY = elmYPosition(id);
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    var speed = Math.round(distance / 100);
    if(speed >= 20){
        speed = 20;
    }
    
    var step = Math.round(distance /50);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    
    if(stopY > startY){
        for(var i = startY; i < stopY; i += step){
            alert(leapy);
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; 
            
            if(leapY > stopY){
                leapY = stopY; 
            }
            
            timer = timer+1;
        } 
        
        return;
    }
    
    for(var i = startY; i > stopY; i -= step) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; 
        
        if(leapY < stopY){
            leapY = stopY; 
        }
        
        
       timer = timer+1;
    }
}

function showli(){
       
	var n1 = coun[0];
	if(n1 === 1){
                document.getElementById('drag').style.left = '0px';
                coun[0] = 0;
	}else{
                document.getElementById('drag').style.left = '-300px';
                coun[0] = 1;
		
	}
}
                var op = document.getElementById('fr').style.opacity;
                if(op == 0){
                document.getElementById('body').style = 'filter :grayscale(100%);';
                }else{
                 document.getElementById('body').style = 'filter :grayscale(0%);';
                }
                
function filter(){
	var op = document.getElementById('fr').style.opacity;
        if(op == 1){
                
                document.getElementById('body').style = 'filter :grayscale(100%);';
                var s = document.body.style = 'background-color : black;';
                document.getElementById('fr').style = 'opacity :0;';
                document.getElementById('la').style = 'opacity :1;';
                document.cookie = "filter=true";
                coun[2] = 0;
	}else{
                document.getElementById('body').style = 'filter :grayscale(0%);';
                document.getElementById('fr').style = 'opacity :1;';
                document.getElementById('la').style = 'opacity :0;';
                document.cookie = "filter=";
                coun[2] = 1;
		location.reload();
	}
}
function showNav(){
//    var ss = window.innerWidth;
//    var sd = document.getElementById('nav_add_js').style= 'width :'+ss+'px;';

        
	var n1 = coun[1];
	if(n1 === 1){
                
                var size = document.getElementById('nav_add_js').style = 'top :65px !important;';
                coun[1] = 0;
	}else{
                var size = document.getElementById('nav_add_js').style = 'top :2px !important;';
                coun[1] = 1;
	}
}
function btn_left(){
               document.getElementById('img_btn_left').style.left = "5%";
} 

