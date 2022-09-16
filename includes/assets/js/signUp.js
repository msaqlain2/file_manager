var signUp = document.getElementById('signup');
signUp.addEventListener('click', createAccount);

function createAccount() {
	var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var user_name = document.getElementById('user_name').value;
	var phone_number = document.getElementById('phone_number').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var confirm_password = document.getElementById('confirm_password').value;

	if(first_name === '' || last_name === '' || user_name === '' || phone_number ==='' 
	|| email === '' || password === '' || confirm_password === '') {
		alert("All Fields are must to be filled!")
	}
	else{
		let jsonData = {
			'first_name' : first_name,
			'last_name' : last_name,
			'user_name' : user_name,
			'phone_number' : phone_number,
			'email' : email,
			'password' : password,
			'confirm_password' : confirm_password,
		}
		fetch('controllers/createNewAccount.php', {
			method : "POST", 
			body : jsonData,
			headers : {
				'Content-type' : 'application/json',
			}
		})
		.then((response) => response.json())
		.then((result) =>{
			console.log(result);
		})
		.catch((error) => {
			console.log("error");
		})
	}

	
}
createAccount();