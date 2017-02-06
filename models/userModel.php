<?php

class userModel extends Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function findByEmail($email){
		$user = $this->_db->query("SELECT * FROM users WHERE users.email = '".$email."'");
		return $user->fetch();
	}
	
	public function find($id){
		$id = (int) $id;
        $user = $this->_db->query("select * from users where users.id = $id");
        return $user->fetch();
	}
	
	
	public function all(){
		$user = $this->_db->query("SELECT * FROM users");	
		
		return $user->fetchall();
	}
	
	public function add($name,$surname,$email,$area_phone_code,$phone_number,$document_number)
    {
        return $this->_db->prepare("INSERT INTO users VALUES (null, :name, :surname, :email, :date_created, :area_phone_code, :phone_number, :document_number)")
                ->execute(
                        array(
                           ':name' => $name,
                           ':surname' => $surname,
                           ':email' => $email,
						   ':date_created' => date(DATE_ATOM),
						   ':area_phone_code' => $area_phone_code,
						   ':phone_number' => $phone_number,
						   ':document_number' => $document_number
                        ));

    }
}