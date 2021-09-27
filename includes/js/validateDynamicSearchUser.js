        $(document).ready(function () {
            var form = $("#edit_users_form_id_dynamic");
            //On Submitting
			$("#edit_button_dynamic").on('click', function(e){
				e.preventDefault();
				if (!validateName())
				{	
                    alert('Παρακαλώ,εισάγετε Όνομα!');
                    return false;
                }
				if (!validateFullname())
				{	
                    alert('Παρακαλώ,εισάγετε Επώνυμο!');
                    return false;
                }
				if (!validateUsername()) 
				{	
                    alert('Παρακαλώ,εισάγετε Username!');
                    return false;
                }
				if (!validateRights()) 
				{	
                    alert('Παρακαλώ,εισάγετε 0 για διαχειριστή ή 1 για χρήστη!');
                    return false;
                }
				if (!validateEmail()) 
				{	
                    alert('Παρακαλώ,εισάγετε έγκυρο ηλ/ταχυδρομείο-email!');
                    return false;
                }
				if (!validateAddress()) 
				{	
                    alert('Παρακαλώ,εισάγετε διεύθυνση!');
                    return false;
                }
				if (!validatePhone()) 
				{	
                    alert('Παρακαλώ,εισάγετε 10 ψηφία τηλεφώνου!');
                    return false;
                }
				form.submit();
			});
			
            function validateName() {
				var name = $("#uname_dynamic");
                if (name.val().length < 1) {
                    return false;
                }

                else {
                    return true;
                }
            }
			
			 function validateFullname() {
				var fullname = $("#fullname_dynamic");
                if (fullname.val().length < 1) {
                    return false;
                }

                else {
                    return true;
                }
            }
			
			 function validateUsername() {
				var username = $("#username_dynamic");
                if (username.val().length < 1) {
                    return false;
                }
                else {
                    return true;
                }
            }
			
			 function validateRights() {
				var right = $("#rights_dynamic");
                if (right.val().length >= 1 && (right.val() ==0 || right.val()==1)) {
                    return true;
                }
                else {
                    return false;
                }
            }
			
			 function validateEmail() {
				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var email=document.getElementById("mail_dynamic").value; 
				var x=re.test(email);
                if (x) {
                    return true;
                }
                else {
                    return false;
				}
			}
			
			 function validateAddress() {
				var address = $("#address_dynamic");
                if (address.val().length < 1) {
                    return false;
                }
                else {
                    return true;
                }
            }
			
			function validatePhone() {
				var phone = $("#phone_dynamic");
                if (phone.val().length == 10) {
                    return true;
                }
                else {
                    return false;
                }
            }
        });