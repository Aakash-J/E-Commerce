<?php

  class Login {

      private $UserName;
      private $email;
	  private $password;
	  private $role;



	  public function getUserName() {

		  return $this->UserName;



	  }
	   public function getEmail() {

		  return $this->email;



	  }
	   public function getPassword() {

		   return $this->password;

	  }

	   public function getRole() {

		   return $this->role;



	  }
	  
  }