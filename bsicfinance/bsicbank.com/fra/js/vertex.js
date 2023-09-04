function changetab(a,b){
	for(i=1;i<4;i++){
		if(i==a){
			$("#tab"+a).css("display","block");
			//document.getElementById('tab_'+i).className='active_tab';
			$("#tab_"+a).addClass("active_tab");
			$("#tab_"+a).removeClass("inactive_tab");			
		}
		
		if(i!=a){
			$("#tab"+i).css("display","none");
			//document.getElementById('tab_'+i).className='inactive_tab';
			$("#tab_"+i).addClass("inactive_tab");
			$("#tab_"+i).removeClass("active_tab");			
		}		
	}
}

//--------------------- Content Slider -----------------------------//

function switch_content(type,id,count)
{
		for(i=1;i<=count;i++){
		
		document.getElementById(type+'_'+i).style.background = '';			
		}
		document.getElementById(type+'_'+id).style.background = '';
		
		for(i=1;i<=count;i++){
		document.getElementById(type+i).style.display='none';			
		}
		document.getElementById(type+id).style.display='block';			
}


function switch_fad(type,id,count,trigger)
{


		for(i=1;i<=count;i++){
			if(i!=id){
			$("#"+type+i).css("display","none");
				document.getElementById(type+'_'+i).className='';	
			}else{
			
			$("#"+type+i).css("display","block");
				document.getElementById(type+'_'+i).className='active';	
			}
		}

			if (type=='main'){
			action = trigger;
			}

			if (type=='second'){
			action2 = trigger;
			}			


}
//--------------------------------------------------------------------//

function createTarget(t){
var left_space = (screen.width/2) - 200;
var top_space = (screen.height/2) - 300;
window.open("", t, 'width=250,height=300,left='+left_space+',top='+top_space);
return true;
}

//===================================================================//

