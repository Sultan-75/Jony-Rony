<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				Dashboard
			</li>
		</ol>
	</div>
	<div class="alert bg-accent text-center font-weight-bold mb-2 text-uppercase" role="alert">
		Quick Access
	</div>
	<div class="row">
		<div class="col-md-2 text-center mb-2">
			<a href="product_list.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">New Sale</button></a>
		</div>
		<div class="col-md-2 text-center mb-2">
			<a href="service.php"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">New Service</button></a>
		</div>
		<div class="col-md-2  text-center mb-2">
			<a href="add_expence.php"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Expence</button></a>
		</div>
		<div class="col-md-2 text-center mb-2">
			<a href="add_product.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Add Product</button></a>
		</div>
		<div class="col-md-2 text-center mb-2">
			<a href="sale_list.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Sale List</button></a>
		</div>
		<div class="col-md-2  text-center mb-2">
			<a href="due_list.php"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Due List</button></a>
		</div>
	</div>
	<div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
		Total Overview
	</div>
	<div class="row mb-1">
		<!-- Product Total -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<?php if (Session::get('Role') == '0' || Session::get('Role') == '2') { ?>
					<div class="row d-flex justify-content-between mx-1">
						<div class="text-uppercase mb-1">
							<h6 class='font-weight-bold mt-1 text-info'>Product Total</h6>
						</div>
						<div class="float-right">
							<h4><i class="fas fa-store text-info"></i></h4>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<strong>৳</strong><?php echo $logic->logic_total_product(); ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- Due Total -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row d-flex justify-content-between mx-1">
						<div class="text-uppercase mb-1">
							<h6 class='font-weight-bold mt-1 text-warning'>Total Due</h6>
						</div>
						<div class="float-right">
							<h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<strong>৳</strong><?php echo $logic->logic_total_due(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Profit Total -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<?php if (Session::get('Role') == '0' || Session::get('Role') == '2') { ?>
					<div class="row d-flex justify-content-between mx-1">
						<div class="text-uppercase mb-1">
							<h6 class='font-weight-bold mt-1 text-success'>Total Profit</h6>
						</div>
						<div class="float-right">
							<h4><i class="fas fa-chart-line text-success"></i></h4>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<strong>৳</strong><?php echo $logic->logic_total_profit(); ?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- Expence Total -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row d-flex justify-content-between mx-1">
						<div class="text-uppercase mb-1">
							<h6 class='font-weight-bold mt-1 text-danger'>Total Expence</h6>
						</div>
						<div class="float-right">
							<h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<strong>৳</strong><?php echo $logic->logic_total_expence(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Row-->

	<div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
		Today Sales & Expence Info
	</div>
	<div class="row">
		<div class="col-md-7 mt-5">
			<div class="row mb-1">
				<!-- Product Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-primary'>Today's Sale</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-shopping-cart text-primary"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_today_sale_totalAmount(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Due Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-warning'>Today's Due</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_today_sale_due(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-1">
				<!-- Profit Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-success'>Today's Profit</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-chart-line text-success"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_today_sale_profit(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Expence Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-danger'>Today's Expence</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_today_expence(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<?php include_once($filepath . '/inc/doughnut_chart.php'); ?>
				</div>
			</div>
		</div>
	</div>

	<!--Row-->
	<div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
		This Week Sales & Expence Info
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<?php include_once($filepath . '/inc/pie_chart.php'); ?>
				</div>
			</div>
		</div>
		<div class="col-md-7 mt-5">
			<div class="row mb-1">
				<!-- Product Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-primary'>Weekly Sales</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-shopping-cart text-primary"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_week_sale_totalAmount(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Due Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-warning'>Weekly Due</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_Week_sale_due(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-success'>Weekly Profit</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-chart-line text-success"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_week_sale_profit(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Expence Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-danger'>Weekly Expence</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_week_expence(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Profit Total -->
		</div>
	</div>
	<!--Row-->
	<div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
		This MONTH Sales & Expence Info
	</div>
	<div class="row">
		<div class="col-md-7 mt-5 mb-5">
			<div class="row">
				<!-- Product Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-primary'>Monthly Sales</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-shopping-cart text-primary"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_mothly_sale_totalAmount(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Due Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-warning'>Monthly Due</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_month_sale_due(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Profit Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-success'>Monthly Profit</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-chart-line text-success"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_month_sale_profit(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Expence Total -->
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<div class="card-body">
							<div class="row d-flex justify-content-between mx-1">
								<div class="text-uppercase mb-1">
									<h6 class='font-weight-bold mt-1 text-danger'>Monthly Expence</h6>
								</div>
								<div class="float-right">
									<h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<strong>৳</strong><?php echo $logic->logic_month_expence(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<?php include_once($filepath . '/inc/pie_chart_2.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<!--Row-->
</div>
<!---Container Fluid-->
<?php
include_once($filepath . '/inc/footer.php');
?>