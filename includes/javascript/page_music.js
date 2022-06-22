var coun = new Array();
coun[0]=1;


//document.getElementById('textarea').style.width = width;


function like(){
    	var n1 = coun[0];
	if(n1 === 1){
                var size = document.getElementById('user_1').innerHTML;
                document.getElementById('user_1').innerHTML = eval(size)+1;
                coun[0] = 0;
	}else{
                var size = document.getElementById('user_1').innerHTML;
                document.getElementById('user_1').innerHTML = eval(size)-1;
                coun[0] = 1;
		
	}
}
