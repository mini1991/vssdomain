 <?php include 'header.php';?>
<div id="wrapper">
	<?php include 'menu.php';?>
	<div id="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">Products</a>
				</li>
				<li class="breadcrumb-item active">Create New</li>
			</ol>
			<?php include 'productnewbody.php';?>
			
			<?php include 'api/newproduct.php';?>
		</div>
		<?php include 'footer.php';?>
	</div>
</div>
<?php include 'link.php';?>