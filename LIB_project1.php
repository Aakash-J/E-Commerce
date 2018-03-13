<?php

 class Lib {
	 
	
	
	// Return the code for footer 
	
 function getFooter() {

   return '<div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2017 Aakash Jain.</p>

                </div>
               </div>
        </div>';

 } 
 
   //Return the code in the head tag
 function getHead() {

    return '<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aakash e-commerce">
    <meta name="author" content="Aakash | Aakash">
    <meta name="keywords" content="">

    <title>
        RapidBuy : e-commerce 
    </title>

    <meta name="keywords" content="">

    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" type="text/css">

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>';

 } 
 
   //Return code to create navigation bar
 
 function getNavigation() {
 
  return '<div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index1.php" data-animate-hover="bounce">
                   <h2>RapidBuy</h2><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <a class="btn btn-default navbar-toggle" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index1.php">Home</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-left">
                    <li class="active"> &nbsp
                    </li>
                </ul>';
 
 
 }
 
     //Return code to create navigation bar
 
 function getNavigation2() {
	 
	 return '</div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>';

	 
 }
 
     //Return code to create top bar
	 
 function createTopBar(){
		

    return		'<div id="top">
        <div class="container">
            <div class="col-md-12" data-animate="fadeInDown">
                <ul class="menu">
				
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
					<li><a href="#" data-toggle="modal" data-target="#logout-modal">Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="index1.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password-modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button name="logine" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                       
                    </div>
                </div>
            </div>
        </div>
		    <div class="modal fade" id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="Logout" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer logout</h4>
                    </div>
                    <div class="modal-body">
                        <form action="index1.php" method="post">
                            <p class="text-center">
                                <button name="logoute" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log out</button>
                            </p>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>';


 } 
 
     //Return code to create form
	 
 function createForm(){
	 
	 
	 
	return '<form action="" method="post" enctype="multipart/form-data">

				<table>

					<tr><td colspan="2" class="areaHeading">Add Item:</td></tr>
   
				   <tr>

					   <td>

						   Name:
					   </td>

					   <td>

						   <input type="text" name="name" id = "name" size="40" value=""  required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Description:
					   </td>

					   <td>

						   <textarea name="description" rows="3" cols="60" required></textarea>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Price:
					   </td>

					   <td>

						   <input type="text" name="price" size="40" value="" required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Quantity on hand:
					   </td>

					   <td>

						   <input type="text" name="quantity" size="40" value="" required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Sale Price:
					   </td>

					   <td>

						   <input type="text" name="salesPrice" size="40" value="0" required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Upload Image:
					   </td>

					   <td>

						    
                                <input type="file" name="ProductImage" id="ProductImage" required/>
                          

					   </td>

				   </tr>

			   		<tr>

					   
			   </table>

			   <br />

			   <input type="reset" value="Reset Form" class="btn navbar-btn btn-primary"/>

			   <input type="submit" name="submit_item" value="Submit Item " class="btn navbar-btn btn-primary"/>
	
		   </form>';
 
 }
 
 //Return code to create edit form
 
 function editForm($ProductId,$ProductName,$Description,$Price,$Quantity,$SalePrice){
	 
	 
	return '<form action="" method="post" enctype="multipart/form-data">

				<table>

					<tr><td colspan="2" class="areaHeading">Edit Item:</td></tr>
   
				   <tr>

					   <td>

						   Name:
					   </td>

					   <td>
                            <input type="hidden" name="id1" id = "id1" size="40" value='."$ProductId".' />
						   <input type="text" name="name1" id = "name1" size="40" value='."$ProductName".' required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Description:
					   </td>

					   <td>

						   <textarea name="description1" rows="3" cols="60" required>'."$Description".'</textarea>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Price:
					   </td>

					   <td>

						   <input type="text" name="price1" size="40" value='."$Price".'  required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Quantity on hand:
					   </td>

					   <td>

						   <input type="text" name="quantity1" size="40" value='."$Quantity".' required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Sale Price:
					   </td>

					   <td>

						   <input type="text" name="salesPrice1" size="40" value='."$SalePrice".' required/>

					   </td>

				   </tr>

				   <tr>

					   <td>

						   Upload Image:
					   </td>

					   <td>

						    <input type="file" name="ProductImage" id="ProductImage" required/>

					   </td>

				   </tr>

			   		<tr>

					   
			   </table>

			   <br />

			    <input type="submit" name="submit_item3" value="Save Changes" class="btn navbar-btn btn-primary"/>
	
		   </form>';
 
 }


 }

