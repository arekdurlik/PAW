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
		$this->form->kwota = getFromRequest('kwota');
		$this->form->lata = getFromRequest('lata');
		$this->form->oproc = getFromRequest('oproc');
	}
	
	/** 
	 * Walidacja parametrĂłw
	 * @return true jeĹ›li brak bĹ‚edĂłw, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lata ) && isset ( $this->form->oproc ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty');
		}
		if ($this->form->lata == "") {
			getMessages()->addError('Nie podano lat');
		}
                if ($this->form->oproc == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (!getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
                            getMessages()->addError('Kwota nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->lata )) {
				getMessages()->addError('Lata nie są liczbą całkowitą');
			}
		       if (! is_numeric ( $this->form->oproc )) {
				getMessages()->addError('Oprocentowanie nie jest liczbą całkowitą');
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
				
                    //konwersja parametrów na int
                    $this->form->kwota = intval($this->form->kwota);
                    $this->form->lata = intval($this->form->lata);
                    $this->form->oproc = intval($this->form->oproc);
                    getMessages()->addInfo('Parametry poprawne.');
                        
                    $this->form->msc = $this->form->lata * 12;
                    $this->form->opr = $this->form->oproc * 0.01;
				
			//wykonanie operacji
                    if (inRole('admin')) {
                        $this->result->result = ($this->form->kwota / $this->form->msc + ($this->form->kwota/$this->form->msc)*$this->form->oproc);
                        getMessages()->addInfo('Wykonano obliczenia.');
                    }else {
                        getMessages()->addError('Tylko administrator może sobie liczyć');
                    }
			
                    try{
                        $database = new \Medoo\Medoo([
                        'database_type' => 'mysql',
                        'database_name' => 'kalk',
                        'server' => 'localhost',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8',
                        'collation' => 'utf8_polish_ci',
                        'port' => 3306,
                        'option' => [
                            \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                        ]
                        ]);

                        $database->insert("wynik", [
                        "kwota" => $this->form->kwota,
                        "lata" => $this->form->lata,
                        "procent" => $this->form->oproc,
                        "rata" => $this->result->result,
                        "data" => date("Y-m-d H:i:s")
                        ]);
                    }catch(\PDOException $ex){
                        getMessages()->addError("DB Error: ".$ex->getMessage());
                    }
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
				
		getSmarty()->assign('page_title','Kalkulator kredytowy');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('calcView.tpl');
	}
}
