<?php   
require_once ("DB.class.php");
require_once ("LIB_project1.php");
include ("Sanitize.php");
$db= new DB();
$lib =  new Lib();
$doc = new DomDocument;
session_start();

$role=" ";
	if(isset($_SESSION['login_user'])!=""){
		$role=$_SESSION['role']; 
		$user = $_SESSION['login_user'];
				 echo "<h5>Welcome $user</h5>";
	   }
  	
?>
<!DOCTYPE html>
<html lang="en">

<?php echo $lib->getHead() ?>
<body>
   <!-- *** TOPBAR ***
 _________________________________________________________ -->
     <?php echo $lib->createTopBar() ?>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <?php echo $lib->getNavigation()  ?>
				<?php if($role == 'A') {
				echo '<ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="admin.php">Admin</a>
                    </li>
                </ul>';
				}
				?>
    <?php echo $lib->getNavigation2()  ?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index1.php">Home</a>
                        </li>
                        <li>Admin</li>
                    </ul>
                </div>

                <div class="col-md-12" id="basket">

                    <div class="box">
					<div id="hot">
										<h2>Select Item from the List!!</h2>
					
				<?php	$data = $db->getAllObjects();

						echo '<form action="" method="post" enctype="multipart/form-data">';
						echo "<select name='prod'>";
							  foreach($data as $product) {
							  
							  echo "<option>"."{$product->getProductId()} - {$product->getProductName()} - {$product->getDescription()}"."</option>";
							 
						  }
						  echo "</select>" ; 
						  echo '<input type="submit" name="submit_item2" value="Select Item" class="btn navbar-btn btn-primary"/>';
						  echo "</form>";
						  
						if(isset($_POST['submit_item2'])){ //check if form was submitted
						$data = $db->getProduct($_POST['prod']);


							foreach($data as $product) {
							
								
						  }
							
							echo $lib->editForm($product->getProductId(),$product->getProductName(),$product->getDescription(),
										$product->getPrice(),$product->getQuantity(),$product->getSalePrice());
						  
						}    
						if(isset($_POST['submit_item'])){ //check if form was submitted
								
								$name = sanitizeString($_POST['name']); 
								$description = sanitizeString($_POST['description']); 
								$price = sanitizeString($_POST['price']); 
								$quantity = sanitizeString($_POST['quantity']); 
								$salesPrice = sanitizeString($_POST['salesPrice']); 
								
								if (!empty($_FILES['ProductImage'])) {
										$ProductImage = $db->uploadProductImage();
									}
									
									$reg = "/^[0-9]+$/";
						if (preg_match($reg,$price) && preg_match($reg,$quantity) && preg_match($reg,$salesPrice)){
								
								$id = $db->insert($name,$description,$price,$quantity,$ProductImage,$salesPrice);
										echo "<font color='green'>Item Added</font>";								
						}
						else
							echo "<font color='red'>Insert Numeric Values</font>";
								
								@header("Refresh:0");
							
						}  

						if(isset($_POST['submit_item3'])){ //check if form was submitted
								
								$id1 = sanitizeString($_POST['id1']); 
								$name = sanitizeString($_POST['name1']); 
								$description = sanitizeString($_POST['description1']); 
								$price = sanitizeString($_POST['price1']); 
								$quantity = sanitizeString($_POST['quantity1']); 
								$salesPrice = sanitizeString($_POST['salesPrice1']); 
								if (!empty($_FILES['ProductImage'])) {
										$ProductImage = $db->uploadProductImage();
									}
								
								$reg = "/^[0-9]+$/";
								if (preg_match($reg,$price) && preg_match($reg,$quantity) && preg_match($reg,$salesPrice)){
								
								$id = $db->update($id1,$name,$description,$price,$quantity,$ProductImage,$salesPrice); 
								echo "<font color='green'>Item Updated</font>";	
								}
						else
							echo "<font color='red'>Insert Numeric Values</font>";
								
								@header("Refresh:0");
							
						}   
						  
							echo $lib->createForm();
								
						?>
					
					
                   </div>
                          
					 </div>	  
                    </div>
                  
                </div>
              </div>
            <!-- /.container -->
        </div>
        

               <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
         <?php echo $lib->getFooter() ?> 
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
</body>

</html>
