//get
var modal = document.getElementById('sModal');
var mButor= document.getElementById('modalButor');
var cButor = document.getElementsByClassName('closebutor')[0];
var cButor2= document.getElementById('closebut');

//listen

mButor.addEventListener('click',openModal);
cButor.addEventListener('click',closeModal);
cButor2.addEventListener('click',closeModal);
//outside click
window.addEventListener('click',clickOut);

function openModal() {
	
modal.style.display = 'block';
var y = document.getElementById("closebut");
var x = document.getElementById("modalButor");
  if (x.style.display === "none") {
    x.style.display = "inline";
  } else {
    x.style.display = "none";
  }
   if (y.style.display === "inline") {
    y.style.display = "none";
  } else {
    y.style.display = "inline";
  }
  
}


function closeModal() {

modal.style.display = 'none';
var x = document.getElementById("modalButor");
var y = document.getElementById("closebut");
  if (x.style.display === "inline") {
    x.style.display = "none";
  } else {
    x.style.display = "inline";
  }
   if (y.style.display === "inline") {
    y.style.display = "none";
  } else {
    y.style.display = "inline";
  }

}



 function clickOut(e) {

	
}

$(document).ready(function(){
		$("#catList").on('change', function(){
							
			if($(this).val() == 0)
			{
				var timh='1';
				window.location = 'newor.php';
			}
			else
			{
				 var timh='1';
				window.location = 'newor.php?category_cookies='+$(this).val();
			}
				
		});
		
		if (typeof timh == 'undefined'){ 
		openModal();
		}
		
	});