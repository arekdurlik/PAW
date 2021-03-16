<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$kwota,&$lata,&$oproc){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$oproc = isset($_REQUEST['oproc']) ? $_REQUEST['oproc'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$kwota,&$lata,&$oproc,&$messages,$infos){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lata) && isset($oproc))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano lat';
	}
        if ( $oproc == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $kwota i $lata są liczbami całkowitymi
	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $lata )) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}
        
        if (! is_numeric( $oproc )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$lata,&$oproc,&$messages,$infos,&$result){
	global $role;
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$lata = intval($lata);
        $oproc = intval($oproc);
	
            $msc = $lata * 12;
            $opr = $oproc * 0.01;
	
            $result = ($kwota/$msc + ($kwota/$msc)*$opr);
}

//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$oproc = null;
$result = null;
$messages = array();
$infos = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($kwota,$lata,$oproc);
if ( validate($kwota,$lata,$oproc,$messages,$infos) ) { // gdy brak błędów
	process($kwota,$lata,$oproc,$messages,$infos,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('app_root', _APP_ROOT);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');


//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl');