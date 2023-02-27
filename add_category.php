<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Add Category</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="dashboard.php" class="text-decoration-none">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				All Category
			</li>
			<li class="breadcrumb-item text-danger" aria-current="page">
				Add Category
			</li>
		</ol>
	</div>

	<div class="row mb-3">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card mb-4">
				<div style="display: none;" id="al1" class="alert alert-danger" role="alert">

					<span class="msg_eror text-center" id="msg_eror" style="display: none;">Category All Ready Exsits</span>
				</div>
				<div style="display: none;" id="al2" class="alert alert-success" role="alert">
					<span class="msg text-center" id="msg" style="display: none;">Category Inserted Succesfully</span>
				</div>
				<div style="display: none;" id="al3" class="alert alert-warning" role="alert">
					<span class="msg_empty text-center" id="msg_empty" style="display: none;">Fields Must Not Empty</span>
				</div>

				<div class="card-body">
					<form action="" method="POST">
						<div class="row pt-3">
							<div class="col-md-12 col-sm-6">
								<div class="form-group">
									<label for="category">Category Name</label>
									<input type="text" class="form-control" name="category" id="category" placeholder="ex: smartphone">
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="form-group text-center">
									<button type="submit" id="add_category" class="btn btn-accent float-right px-4 py-2 font-weight-bold">Add Catagory</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
	<!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>