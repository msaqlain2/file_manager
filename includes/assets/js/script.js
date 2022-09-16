
var create_folder = document.getElementById('create_folder');
create_folder?.addEventListener('click', createNewFolder);


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
	.then((response) => response.json())
	.then((data) => {
		var folders = document.getElementById('folders');
		var button = '';
		for(let i=0; i<data.length; i++){
			button += `<button class='btn btn-info m-1'>` + data[i].directory_name + `</button>`;
		}
		
		folders.innerHTML = button;

	})
}
createNewFolder();
loadFolders();