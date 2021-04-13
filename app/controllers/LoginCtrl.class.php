<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektĂłw
		$this->form = new LoginForm();
	}
	
	public function getParams(){
		// 1. pobranie parametrĂłw
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
	}
	
	public function validate() {
		// sprawdzenie, czy parametry zostaĹ‚y przekazane
		if (! (isset ( $this->form->login ) && isset ( $this->form->pass ))) {
			// sytuacja wystÄ…pi kiedy np. kontroler zostanie wywoĹ‚any bezpoĹ›rednio - nie z formularza
			return false;
		}
			
			// nie ma sensu walidowaÄ‡ dalej, gdy brak parametrĂłw
		if (! getMessages()->isError ()) {
			
			// sprawdzenie, czy potrzebne wartoĹ›ci zostaĹ‚y przekazane
			if ($this->form->login == "") {
				getMessages()->addError ( 'Nie podano loginu' );
			}
			if ($this->form->pass == "") {
				getMessages()->addError ( 'Nie podano hasĹ‚a' );
			}
		}

		//nie ma sensu walidowaÄ‡ dalej, gdy brak wartoĹ›ci
		if ( !getMessages()->isError() ) {
		
			// sprawdzenie, czy dane logowania poprawne
			// (takie informacje najczÄ™Ĺ›ciej przechowuje siÄ™ w bazie danych)
			if ($this->form->login == "admin" && $this->form->pass == "admin") {

				//sesja juĹĽ rozpoczÄ™ta w init.php, wiÄ™c dziaĹ‚amy ...
				$user = new User($this->form->login, 'admin');
				// zaipsz obiekt uĹĽytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolÄ™ uĹĽytkownikowi (jak wiemy, zapisane teĹĽ w sesji)
				addRole($user->role);

			} else if ($this->form->login == "user" && $this->form->pass == "user") {

				//sesja juĹĽ rozpoczÄ™ta w init.php, wiÄ™c dziaĹ‚amy ...
				$user = new User($this->form->login, 'user');
				// zaipsz obiekt uĹĽytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolÄ™ uĹĽytkownikowi (jak wiemy, zapisane teĹĽ w sesji)
				addRole($user->role);

			} else {
				getMessages()->addError('Niepoprawny login lub hasĹ‚o');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function doLogin(){

		$this->getParams();
		
		if ($this->validate()){
			//zalogowany => przekieruj na stronÄ™ gĹ‚ĂłwnÄ…, gdzie uruchomiona zostanie domyĹ›lna akcja
			header("Location: ".getConf()->app_url."/");
		} else {
			//niezalogowany => wyĹ›wietl stronÄ™ logowania
			$this->generateView(); 
		}
		
	}
	
	public function doLogout(){
		// 1. zakoĹ„czenie sesji - tylko koĹ„czymy, jesteĹ›my juĹĽ podĹ‚Ä…czeni w init.php
		session_destroy();
		
		// 2. wyĹ›wietl stronÄ™ logowania z informacjÄ…
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();		 
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Strona logowania');
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('LoginView.tpl');		
	}
}