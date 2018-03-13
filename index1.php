<?php   
require_once ("DB.class.php");
require_once ("LIB_project1.php");
$db= new DB();
$lib =  new Lib();

$role=" ";
		session_start();
		if(isset($_SESSION['login_user'])!=""){
			$role=$_SESSION['role']; 
			$user = $_SESSION['login_user'];
			 echo "<h5>Welcome $user</h5>";
			  
		   }
   
        // Login Module       
	  
		if(isset($_POST['logine'])){
				
		    $email = $_POST['email-modal'];
			$password = $_POST['password-modal'];
			
			
			    $data = $db->login($email,$password);
				echo "<h5>Welcome $email</h5>";
				if($data == 'A')
				{
				
					$_SESSION['login_user'] = $email;
					$_SESSION['role'] = 'A';
					$role='A';
					 $_SESSION['login_user'];
					
				}
				else if($data == 'U') {
					
					
					$_SESSION['login_user'] = $email;
					$_SESSION['role'] = 'U';
					$role='U';
					
				}
			
			}
			
		// Logout Module     
			
		if(isset($_POST['logoute'])){
				
		    session_unset();
			session_destroy();
			 header("Refresh:0");
			 
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
                <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

		      <div id="hot"  style="background-color:white;">

         
   <?php
			if (isset($_POST['id']) && isset($_SESSION['login_user'])) {
				
				$data = $_POST['id'];
				//echo $data;
				$count = $db->updateQuantity($data);
				//echo $count;
				if($count > 0 ) {
				
				echo $db->InsertInCart($_SESSION['login_user'],$data);
				
				
				//echo $data;
				echo "Item added to cart" ;
				}
				else
					echo "No More item available" ;
			}


			//$db->getImage();
			echo $db->getSalesItemTable();

			echo $db->getCatlogItemTable();
		
?>
       </div>
                   
                </div>
            </div>
        
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
  url: "index1.php",
  data: { id: $id }
  
}).done(function( msg ) {
	
	alert("Item added to cart");
	location.reload();
  
});    

    });
  
  </script>


</body>

</html>
