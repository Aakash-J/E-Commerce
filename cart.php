<?php   
require_once ("DB.class.php");
require_once ("LIB_project1.php");
$db= new DB();
$lib =  new Lib();
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
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-12" id="basket">

                    <div class="box">
                               <?php
							   
							   if (isset($_POST['id'])) {
	
									
									
									$data = $_POST['id'];
									echo $_SESSION['login_user'];
									
									if($data == 'all'){
									echo $db->deleteAllCart($_SESSION['login_user']);
									echo $db->getCartTable($_SESSION['login_user']);
									//echo $data;
									echo "Cart is now Empty" ;	
									}
									else {
									//echo $data;
									echo $db->deleteFromCart($_SESSION['login_user'],$data);
									echo $db->getCartTable($_SESSION['login_user']);
									//echo $data;
									echo "Item Deleted from cart" ;
									}
									
								}

                                 
								//$db->getImage();
								if (isset($_SESSION['login_user'])){
								echo $db->getCartTable($_SESSION['login_user']);
								}
								else
									echo "Cart is Empty";

										
								?>
                           
                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index1.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                              
                            </div>


                    </div>
                    <!-- /.box -->

                <!-- /.col-md-9 -->

               

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

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
	<script>
	  $('.button').click(function() {
		  var $id  = this.nextSibling.nextSibling.defaultValue;
	   console.log(this.nextSibling.nextSibling.defaultValue);
	   //alert(this.nextSibling.value);
	 $.ajax({
	  type: "POST",
	  url: "cart.php",
	  data: { id: $id }
	  
	}).done(function(  ) {
		alert("Item deleted from Cart");
		location.reload();
	  
	});    

		});
	  
	  </script>


</body>

</html>
