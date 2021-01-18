<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * This library does not use salt because according to php.net
 * "The salt option has been deprecated as of PHP 7.0.0.
 * It is now preferred to simply use the salt that is generated by default."
 * */
class Password_crypt {
	//const ALLOWED_ALGOS = ['default' => PASSWORD_DEFAULT, 'bcrypt' => PASSWORD_BCRYPT];
	protected $_cost = 10;
	protected $_algo = PASSWORD_DEFAULT;
	public function __construct(){
		if(function_exists('mcrypt_encrypt') === false){
			throw new Exception('The Password library requires the Mcrypt extension.');
		}
	}
        
	public function hash($password){
		return password_hash($password, $this->_algo, ['cost' => $this->_cost]);
	}
	
	public function verify_hash($password, $hash){
		return password_verify($password, $hash);
	}
}