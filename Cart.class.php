<?php

  class Cart {

      private $ProductId;
      private $ProductName;
	  private $Description;
	  private $Quantity;
	  private $ItemPrice;
	  private $Total;


	  public function getProductName() {

		  return $this->ProductName;



	  }
	   public function getProductId() {

		  return $this->ProductId;



	  }
	   public function getDescription() {

		   return $this->Description;

	  }

	   public function getQuantity() {

		   return $this->Quantity;



	  }
	  public function getItemPrice() {

		   return $this->ItemPrice;

	  }
	  public function getTotal() {

		   return $this->Total;

	  }


  }