<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>File Manager</title>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4"></div>	
					<div class="col-md-4"></div>	
					<div class="col-md-4">
						<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Folder</button>
					</div>	
				</div>
			</div>
		</div>
		<div id="folders" class="folders mt-2">
			<!-- <button class="btn btn-info">New Folder</button> -->
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Folder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
        	<label for="folder_name">Enter Folder Name:</label>
        	<input type="text" name="folder_name" id="folder_name" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_folder">Create Folder</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="includes/assets/js/script.js"></script>
</body>
</html>