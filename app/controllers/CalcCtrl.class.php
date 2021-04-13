<?php
namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazujÄ…c jedynie przestrzeĹ„ nazw, w ktĂłrej znajduje siÄ™ klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora
 * @author PrzemysĹ‚aw KudĹ‚acik
 *
 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeĹ„ i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja wĹ‚aĹ›ciwoĹ›ci
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektĂłw
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrĂłw
	 */
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->op = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrĂłw
	 * @return true jeĹ›li brak bĹ‚edĂłw, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostaĹ‚y przekazane
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
			// sytuacja wystÄ…pi kiedy np. kontroler zostanie wywoĹ‚any bezpoĹ›rednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartoĹ›ci zostaĹ‚y przekazane
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano liczby 1');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano liczby 2');
		}
		
		// nie ma sensu walidowaÄ‡ dalej gdy brak parametrĂłw
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y sÄ… liczbami caĹ‚kowitymi
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Pierwsza wartoĹ›Ä‡ nie jest liczbÄ… caĹ‚kowitÄ…');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Druga wartoĹ›Ä‡ nie jest liczbÄ… caĹ‚kowitÄ…');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartoĹ›ci, walidacja, obliczenie i wyĹ›wietlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrĂłw na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			switch ($this->form->op) {
				case 'minus' :
					if (inRole('admin')) {
						$this->result->result = $this->form->x - $this->form->y;
						$this->result->op_name = '-';
					} else {
						getMessages()->addError('Tylko administrator moĹĽe wykonaÄ‡ tÄ™ operacjÄ™');
					}
					break;
				case 'times' :
					$this->result->result = $this->form->x * $this->form->y;
					$this->result->op_name = '*';
					break;
				case 'div' :
					if (inRole('admin')) {
						$this->result->result = $this->form->x / $this->form->y;
						$this->result->op_name = '/';
					} else {
						getMessages()->addError('Tylko administrator moĹĽe wykonaÄ‡ tÄ™ operacjÄ™');
					}
					break;
				default :
					$this->result->result = $this->form->x + $this->form->y;
					$this->result->op_name = '+';
					break;
			}
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Super kalkulator - role');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
