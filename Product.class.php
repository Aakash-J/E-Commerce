<?php

  class Product {

      private $ProductId;
	  private $ProductName;
	  private $Description;
	  private $Price;
	  private $Quantity;
	  private $SalePrice;
	  private $ImageName;

	  public function getProductId() {

		  return $this->ProductId;



	  }
	  public function getProductName() {

		  return $this->ProductName;



	  }
	   public function getDescription() {

		   return $this->Description;

	  }
	   public function getPrice() {

		   return $this->Price;



	  }
	   public function getQuantity() {

		   return $this->Quantity;



	  }
	  public function getSalePrice() {

		   return $this->SalePrice;

	  }
	  public function getImageName() {

		   return $this->ImageName;

	  }


  }