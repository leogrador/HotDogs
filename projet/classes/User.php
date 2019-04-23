<?php
class User {
	private $_db,
			$_data,
			$_sessionName,
			$_isLoggedIn;
	
	public function __construct($user = null) {
		$this->_db = DB::getInstance();
		
		$this->_sessionName = Config::get('session/session_name');
		
		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);
				
				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					
				}
			}
		}
	}
	
	public function create($fields = array()) {
		if(!$this->_db->insert('user', $fields)) {
			//throw new Exception('There was a problem creating an account.');
		}
	}
	
	public function find($user = null) {
		if($user) {
			$field = (is_numeric($user)) ? 'id_user' : 'login';
			$data = $this->_db->get('user', array($field, '=', $user));
			
			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	
	
	public function login($login = null, $password = null) {
		$user = $this->find($login);
		
		if($user) {
			if($this->data()->mdp === $password) {
				Session::put($this->_sessionName, $this->data()->id_user);
				return true;
			}
		}
		
		return false;
	}
	
	public function deco() {
		Session::delete($this->_sessionName);
	}
	
	
	public function data() {
		return $this->_data;
	}
	
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
	
}