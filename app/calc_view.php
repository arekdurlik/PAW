<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.5/build/pure-min.css" 
              integrity="sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd" 
              crossorigin="anonymous">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
    
<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator</legend>
	<fieldset>
		<label for="id_x">Liczba 1: </label>
		<input id="id_x" type="text" name="x" value="<?php out($x) ?>" />
		<label for="id_op">Operacja: </label>
		<select name="op">	
			<option value="plus">+</option>
			<option value="minus">-</option>
			<option value="times">*</option>
			<option value="div">/</option>
		</select>
		<label for="id_y">Liczba 2: </label>
		<input id="id_y" type="text" name="y" value="<?php out($y) ?>" />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	
    <br>
<form action="<?php print(_APP_URL);?>/app/calc_kred.php" method="get" class="pure-form pure-form-stacked">
        <legend>Kalkulator kredytowy</legend>
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota)) print($kwota); ?>" /><br />
	<label for="id_lata">Lata: </label>
	<input id="id_lata" type="text" name="lata" value="<?php if (isset($lata)) print($lata); ?>" /><br />
	<label for="id_proc">Oprocentowanie: </label>
	<input id="id_proc" type="text" name="oproc" value="<?php if (isset($oproc)) print($oproc); ?>" /><br />
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>

<?php if (isset($result1)){ ?>
<div style="margin: 0 auto; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em; text-align: center; font-size: 25px;">
<?php echo 'Wynik: '.$result1; ?>
</div>
<?php } ?>

<?php if (isset($result2)){ ?>
<div style="margin: 0 auto; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em; text-align: center; font-size: 25px;">
<?php echo 'Rata miesięczna: '.$result2; ?>
</div>
<?php } ?>  
        
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>        
        
</div>

</body>
</html>