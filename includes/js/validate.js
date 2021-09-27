<script>
function validate() {
	
var username = document.forms["reg"]["username"].value;
 if(username.length>20){
 alert("Εισάγετε μέχρι 20 χαρακτήρες για όνομα χρήστη - username");
 return false;
 } 
 
var password1 = document.forms["reg"]["pass1"].value;
if (password1.length <8){
 alert("Εισάγετε κωδικό μεγαλύτερο από 8 χαρακτήρες");
 return false;
 }
var password2 = document.forms["reg"]["pass2"].value;
 if (password1 != password2){
 alert("Ο κωδικός επιβεβαίωσης δεν είναι ίδιος με τον κωδικό που εισάγατε");
 return false;
 }
 
var name1 = document.forms["reg"]["uname"].value;
 if(name1.length>20){
 alert("Εισάγετε μέχρι 20 χαρακτήρες για όνομα");
 return false;
 } 
 
 var lastname = document.forms["reg"]["fullname"].value;
 if(lastname.length>30){
 alert("Εισάγετε μέχρι 30 χαρακτήρες για επίθετο");
 return false;
 } 
 
 var adrr = document.forms["reg"]["address"].value;
 if(adrr.length>30){
 alert("Εισάγετε μέχρι 30 χαρακτήρες για διεύθυνση");
 return false;
 } 

 var email = document.forms["reg"]["mail"].value;
 if(email==""){
 alert("Εισάγετε email");
 return false;
 }else{
 var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
 var x=re.test(email);
 if(x){
 }else{
 alert("Εισάγετε έγκυρο email");
 return false;
 } 
 } 
 
 var mobile = document.forms["reg"]["phone"].value;
 if(mobile==""){
 alert("Εισάγετε τον αριθμό τηλεφώνου");
 return false;
 }
 if(isNaN(mobile))  {
 alert("Εισάγετε έγκυρο αριθμό τηλεφώνου");
 return false;
 }
 if (mobile.length == 10  ) {
 return true; }
 else {
alert("Εισάγετε έγκυρο αριθμό τηλεφώνου - 10 Ψηφία");
 return false;	 
 }
}
</script>