<?php /* Smarty version Smarty-3.1.17, created on 2021-03-16 01:30:41
         compiled from "E:\xampp\htdocs\php_04_szablony_smarty\app\calc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1182390115604fdec6bbb233-90708866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f7bdf9aff1c20e3e514fb840332ce68bed62f0e' => 
    array (
      0 => 'E:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\calc.tpl',
      1 => 1615854532,
      2 => 'file',
    ),
    'e459000c005613413b3f530d2b3e20fd7f815342' => 
    array (
      0 => 'E:\\xampp\\htdocs\\php_04_szablony_smarty\\templates\\main.tpl',
      1 => 1615854003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1182390115604fdec6bbb233-90708866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_604fdec7d4dba6_30196489',
  'variables' => 
  array (
    'app_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_604fdec7d4dba6_30196489')) {function content_604fdec7d4dba6_30196489($_smarty_tpl) {?><!DOCTYPE HTML>
<!--
	Tessellate by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tessellate by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header" class="dark">
				<header>
					<h1>Witajcie w kalkulatorze kredytu bankowego</h1>
					<p>Nie spodziewałem się, że to zadanie będzie aż takie trudne</p>
				</header>
				<footer>
					<a href="#fourth" class="button scrolly">Liczymy tutaj</a>
				</footer>
			</section>

		<!-- Fourth -->
			<section id="fourth" class="main">
                            

<header>
					<div class="container">
						<h2>Kalkulator kredytowy</h2>
					</div>
				</header>
				<div class="content style4 featured">
					<div class="container medium">
						<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php#fourth" method="post">
							<div class="row gtr-50">
								<div class="col-12"><input type="text" id="kwota" name="kwota" placeholder="Kwota" /></div>
								<div class="col-12"><input type="text" id="lata" name="lata" placeholder="Lata" /></div>
								<div class="col-12"><input type="text" id="oproc" name="oproc" placeholder="Oprocentowanie" /></div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" class="button" value="Oblicz" /></li>
									</ul>
								</div>
							</div>
						</form>
                                                        
<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value)>0) {?> 
		<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
		<ol class="err">
		<?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php } ?>
		</ol>
	<?php }?>
<?php }?>


<?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value)>0) {?> 
		<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
		<ol class="inf">
		<?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php } ?>
		</ol>
	<?php }?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
	<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>
					</div>
				</div>



			</section>

		<!-- Footer -->
			<section id="footer">
				<div class="copyright">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html><?php }} ?>
