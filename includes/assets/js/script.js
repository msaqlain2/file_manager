
var create_folder = document.getElementById('create_folder');
if (create_folder !== null){
	create_folder.addEventListener('click', createNewFolder);
}
function createNewFolder() {
	var folder_name = document.getElementById('folder_name').value;
	
	if(folder_name === '') {
		alert("All Field are must to be filled!");
		return false;
	}
	else{
		var formData = {
			'folder_name' : folder_name
		}

		var jsonData = JSON.stringify(formData);

		fetch('controllers/createNewFolder.php', {
			method : "POST", 
			body : jsonData,
			headers : {
				'Content-type' : 'application/json',
			}
		})
		.then((response) => response.json())
		.then((result) =>{

		})
		.catch((error) => {
			console.log("error");
		})
	}
}

function loadFolders() {
	fetch('controllers/fetchAllFolders.php')
	.then((response) => response.text())
	.then((data) => {
		console.log(data[0]);
		var folders = document.getElementById('folders');

		var i;
		for(i in data){
			// var a = folders.createElement += `<button class='btn btn-info'>`+ data +`</button>`;
			console.log(data);
		}

		// folders.innerHTML = a;


	})
}

loadFolders();