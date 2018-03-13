<?php
    class DB{
        private $dbh;

        function __construct(){
        try
        {

            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",
                     $_SERVER['DB_USER'],
                     $_SERVER['DB_PASSWORD']);

                     $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


                     }

                     catch(PDOException $e) {
                     }

        }

		  // Insert data in cart table
        function InsertInCart($userId,$productId) {
			
			
			
			$stmt = $this->dbh->prepare("INSERT INTO Cart(userId,productId) VALUES(:userId,:productId)");
			$stmt = $this->dbh->prepare("INSERT INTO Cart(userId,productId) VALUES(:userId,:productId)");
			$stmt->execute(array(':userId' => $userId, ':productId' => $productId));
			return $stmt->rowCount();

		}
		
		// Update quantity in product table
		 function updateQuantity($productId) {
			
			$stmt = $this->dbh->prepare("UPDATE Product set quantity=quantity-1 where productId = :productId and quantity>0");
			$stmt->execute(array(':productId' => $productId));
			return $stmt->rowCount();

		}
		
		// Update quantity in product table
		
		function updateQuantityFromCart($productId) {
			
			$stmt = $this->dbh->prepare("UPDATE Product set quantity=quantity+1 where productId = :productId");
			$stmt->execute(array(':productId' => $productId));
			return $stmt->rowCount();

		}
		
		// Delete item from cart table
		function deleteFromCart($userId,$productId) {
			
			$stmt = $this->dbh->prepare("delete from Cart where productId = :productId and userId = :userId");
			$stmt->execute(array(':productId' => $productId,':userId' => $userId));
			if ($stmt->rowCount()>0)
			{
				return $this->updateQuantityFromCart($productId);
				
			}

		}
		
		//empty cart table
		
		function deleteAllCart($userId) {
			
			$stmt = $this->dbh->prepare("delete from Cart where userId = :userId");
			$stmt->execute(array(':userId' => $userId));
			return $stmt->rowCount();

		}
		
		//check for sales item conditions
		
		function check() {
			
			$stmt = $this->dbh->prepare("select * from Product where SalePrice > 0");
			$stmt->execute();
			return count($stmt->fetchAll());

		}
		
		//validate login details
		
		function login($email,$password){
			try {
					
					$data =array();
					
					$stmt = $this->dbh->prepare("select * from Login
					                             where email=:email and password=:password ");
					$stmt->execute(array(':email' => $email, ':password' => $password));

					$stmt->setFetchMode(PDO::FETCH_CLASS,"Product");
					while($loginInfo =  $stmt->fetch()) {
						$data[] = $loginInfo;
					}
					
				foreach($data as $item){	
					
					//echo  $item[2];
                  return $item[3];
				}
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}
		
			
		}
		
		//insert data in product table
		
		function insert($productName,$description,$price,$quantity,$imageName,$salePrice) {
			
			if($salePrice > 0)
			{
				if($this->check() >= 5)
				{
					
					return 0;
				}
			}
			
			
			
			$stmt = $this->dbh->prepare("INSERT INTO Product(productName,description,price,quantity,imageName,salePrice) VALUES(:productName,:description,:price,:quantity,:imageName,:salePrice)");
			$stmt->execute(array(':productName' => $productName, ':description' => $description, ':price' => $price, ':quantity' => $quantity, ':imageName' => $imageName, ':salePrice' => $salePrice));
			return $stmt->rowCount();

		}
		
		//update product table
		
		 function update($productId,$productName,$description,$price,$quantity,$imageName,$salePrice) {
			
			if($salePrice > 0)
			{
				if($this->check() >= 5)
				{
					
					return 0;
				}
			}
			if($salePrice == 0)
			{
				if($this->check() <= 3)
				{
					
					return 0;
				}
			}
			
			
			$stmt = $this->dbh->prepare("UPDATE Product set productName = :productName,description =:description,price=:price,quantity=:quantity,imageName=:imageName,salePrice=:salePrice
										 where productId = :productId");
			$stmt->execute(array(':productId' => $productId,':productName' => $productName, ':description' => $description, ':price' => $price, ':quantity' => $quantity, ':imageName' => $imageName, ':salePrice' => $salePrice));
			return $stmt->rowCount();

		}
		
		//get catalog items
		
		function getAllObjects() {
				try {
					include "Product.class.php";
					$data =array();
					
					$stmt = $this->dbh->prepare("select ProductId,ProductName,Description,Price,Quantity,SalePrice from Product");
					$stmt->execute();
					$stmt->setFetchMode(PDO::FETCH_CLASS,"Product");
					while($person =  $stmt->fetch()) {
						$data[] = $person;
					}
                  return $data;
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}
		
	}
	
		function getProduct($id) {
				try {
					$pieces = explode("-", $id);
					$data =array();
					$id =  $pieces[0];
					$stmt = $this->dbh->prepare("select ProductId,ProductName,Description,Price,Quantity,SalePrice from Product where ProductId= :id");
					$stmt->bindParam(":id",$id,PDO::PARAM_STR);
					$stmt->execute();
					$stmt->setFetchMode(PDO::FETCH_CLASS,"Product");
					while($person =  $stmt->fetch()) {
						$data[] = $person;
					}
                  return $data;
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}
		
	}
	
	// get sales item from product table
	
	function getSalesItem() {
         try {
					include "Product.class.php";
					$data =array();
					
					$stmt = $this->dbh->prepare("select ProductId,ProductName,Description,Price,Quantity,SalePrice,ImageName from Product
					                             where SalePrice>0 and salePrice<Price");
					$stmt->execute();
					$stmt->setFetchMode(PDO::FETCH_CLASS,"Product");
					while($saleItem =  $stmt->fetch()) {
						$data[] = $saleItem;
					}
                  return $data;
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}
		

        }
		
		function getCatlogItem() {
         try {
					
					$data =array();
					
					$stmt = $this->dbh->prepare("select ProductId,ProductName,Description,Price,Quantity,SalePrice,ImageName from Product
					                             where SalePrice=0 ");
					$stmt->execute();
					$stmt->setFetchMode(PDO::FETCH_CLASS,"Product");
					while($saleItem =  $stmt->fetch()) {
						$data[] = $saleItem;
					}
                  return $data;
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}
		

        }
		
		
	function getSalesItemTable() {

       $data = $this->getSalesItem();


	if(count($data) > 0){
                $bigString = "
				<div class='container-fluid service-box'>   <h2>Sale</h2><br>";

                foreach($data as $item){
					
					        $bigString .= " <div class = 'col-sm-4 text-center '>
							                   <img src = 'assets/{$item->getImageName()}' width='100px' height = '90px'/>
											   </br></br>
							                   <strong>{$item->getProductName()}</strong><br> 
											   {$item->getDescription()}<br>
							                    \${$item->getSalePrice()}  \$<s>{$item->getPrice()}</s><br>
												<input class = 'button' type='button' name='addcart' value='Add to Cart'>
												<input type ='hidden' value = '{$item->getProductId()}'>
												<br>
							                   <font color='red'>Only {$item->getQuantity()} left in stock!!</font>
							                    </br></br>
											   </div>";
						           }

                $bigString .= "</div></table>";
            }
            else{
                $bigString = "<h2>No Item exist</h2>";
            }

			return $bigString;


                     }
					 
		function getCatlogItemTable() {

				$data = $this->getCatlogItem();


				if(count($data) > 0){
                $bigString = "
				
				<div class='container-fluid service-box'>   <h2>Catalog</h2><br>      ";

                foreach($data as $item){
					
					        $bigString .= " <div class = 'col-sm-4 text-center '>
							                   <img src = 'assets/{$item->getImageName()}' width='100px' height = '90px'/>
											   </br></br>
							                   <strong>{$item->getProductName()}</strong><br> 
											   {$item->getDescription()}<br>
							                   \${$item->getPrice()}<br>
											   <input class = 'button' type='button' name='addcart' value='Add to Cart'>
											   <input type ='hidden' value = '{$item->getProductId()}'>
											   <br>
							                   <font color='red'>Only {$item->getQuantity()} left in stock!!</font>
							                    </br></br>
											   </div>";
						           }

                $bigString .= "</div></br></table>";
            }
            
            else{
                $bigString = "<h2>No Item exist</h2>";
            }

			return $bigString;


                     }			

    //upload image on server					 
					 
	    public static function uploadProductImage()
        {
            $target_dir = "assets/";
           
            $target_file = $target_dir.basename($_FILES["ProductImage"]["name"]);

            $imageType = pathinfo($target_file, PATHINFO_EXTENSION);
          //  echo "image->$imageType";
            if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
                echo "<script type='text/javascript'> 
             
                            function image_error()
                            {
                            setTimeout(
                            function()
                            {
                            alert(
                            'Incorrect image type!',
                            content:'Sorry, only JPG, JPEG, PNG  are allowed !'
                            );
                            },
                            500);
                                }
                            image_error();
                        </script>";
            } else {
                //echo $imageFileType;
                move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);
            }
            
            return basename($_FILES["ProductImage"]["name"]);
        }
		
		//fetch cart data

		function  getCart($userId){
            
        try {
					include "Cart.class.php";
					$data =array();
					$stmt = $this->dbh->prepare("select c.ProductId,ProductName,Description,count(UserId) as 'Quantity',
													IF(SalePrice > 0, SalePrice , Price) as 'ItemPrice',
													count(UserId)*IF(SalePrice > 0, SalePrice , Price) as 'Total'
													from Cart c,Product p where c.ProductId = p.ProductId 
													and c.UserId = :userId group by c.ProductId");
					$stmt->bindParam(":userId",$userId,PDO::PARAM_STR);
					$stmt->execute();
					$stmt->setFetchMode(PDO::FETCH_CLASS,"Cart");
					while($cartItem =  $stmt->fetch()) {
						$data[] = $cartItem;
					}
					 return $data;
				}
		catch(PDOExecption $e) {
		echo $e->getMessage();
		die();
		}



		}		
		
		//create cart table for display
		function getCartTable($userId) {

				$data = $this->getCart($userId);

                $cartTotal = 0;
				if(count($data) > 0){
                $bigString = "<h1>Shopping cart</h1>
                            <div class='table-responsive'>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th colspan='1'>Product</th>
											<th>Decription</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan='2'>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                foreach($data as $row){
                    $bigString .= "<tr><td>{$row->getProductName()}</td>
                                       <td>{$row->getDescription()}</td>
									   <td>{$row->getQuantity()}</td>
									   <td>{$row->getItemPrice()}</td>
									   <td>{$row->getTotal()}</td>
									   <td><input class = 'button navbar-btn btn-primary' type='button' name='deletecart' value='Delete'>
									   <input type ='hidden' value = '{$row->getProductId()}'>
									   </td>
                                    </tr>";
							$cartTotal = $cartTotal+ $row->getTotal();	
					
                }
				
                
                $bigString .= " </tbody></table>";
				$bigString .="<h3>  Total: {$cartTotal}</h3>";
				$bigString .= "<br><input class = 'button' type='button' name='deletecart' value='Empty Cart'>
							<input type ='hidden' value = 'all'>";		
				
				
            }
            
            else{
                $bigString = "<h2>Cart is empty</h2>";
            }

			return $bigString;


                     }	
				

    }
	
	
	?>