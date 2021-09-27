<script>
function countUp() {
    var count = document.getElementById('quantity');
    var i = parseInt(count.value, 10);
    count.value = ++i;
}
</script>

<script>
function countDown() {
    var count = document.getElementById('quantity');
    var i = parseInt(count.value, 10);

	if (i!=1) {
    count.value = --i;
	}
	if (i<=0) {
	count.value = 1;
	}
}
</script>

<script>
function countCheck() {
  var count = document.getElementById('quantity');
  var i = parseInt(count.value, 10);
 if(i<=0){
 alert("Εισάγετε αριθμό μεγαλύτερο από το μηδέν");
   count.value = 1;
 } 
}
 </script>
 
<script>
function checkformvalues() {
	var optionLength = document.checkform.option.length;
	var optionValue = "";
	for (i=0; i<optionLength; i++) {
		var optionChecked = document.checkform.option[i].checked;
		if (optionChecked) {
			optionValue += document.checkform.option[i].value+",";
		}
	}	
	var result = "You checked:"+checkValue;
	document.getElementById("show").innerHTML = result;
}
</script>

 
 <script>
 function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>

 <script>
 function togglePopup2(){
  document.getElementById("popup-2").classList.toggle("active");
}
</script>