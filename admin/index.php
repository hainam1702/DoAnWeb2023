<?php require_once('header.php'); ?>

<section class="content-header">
<div class="content-header-left">
	<h1>Bảng điều khiển</h1>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_top_category");
$statement->execute();
$total_top_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
$statement->execute();
$total_mid_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_end_category");
$statement->execute();
$total_end_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_status='1'");
$statement->execute();
$total_customers = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_active='1'");
$statement->execute();
$total_subscriber = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost");
$statement->execute();
$available_shipping = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
$statement->execute(array('Completed'));
$total_shipping_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
$statement->execute(array('Completed','Pending'));
$total_order_complete_shipping_pending = $statement->rowCount();
?>

<section class="content">
<div class="row">
              <div class="col-lg-4 col-xs-8 ">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_product; ?></h3>

                  <p>Các sản phẩm</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-8 ">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $total_order_pending; ?></h3>

                  <p>Đơn hàng chờ xử lý</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-8 ">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_order_completed; ?></h3>

                  <p>Đơn hàng hoàn thành</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-8 ">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total_shipping_completed; ?></h3>

                  <p>Đang giao hàng</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div>
			<!-- ./col -->
			
			<div class="col-lg-4 col-xs-8 ">
				<!-- small box -->
				<div class="small-box bg-orange">
				  <div class="inner">
					<h3><?php echo $total_order_complete_shipping_pending; ?></h3>
  
					<p>Đang chờ giao hàng</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-load-a"></i>
				  </div>
				  
				</div>
			  </div>

			  <div class="col-lg-4 col-xs-8 ">
				<!-- small box -->
				<div class="small-box bg-red">
				  <div class="inner">
					<h3><?php echo $total_customers; ?></h3>
  
					<p>Tài khoản hoạt động</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-person-stalker"></i>
				  </div>
				  
				</div>
			  </div>

			  

			  <!-- <div class="col-lg-3 col-xs-6">
				<div class="small-box bg-teal">
				  <div class="inner">
					<h3><?php echo $available_shipping; ?></h3>
  
					<p>Available Shippings</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-location"></i>
				  </div>
				  
				</div>
			  </div> -->

			 
		  
</section>

<?php require_once('footer.php'); ?>