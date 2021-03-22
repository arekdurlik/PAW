<?php /* Smarty version Smarty-3.1.17, created on 2021-03-23 00:38:06
         compiled from "E:\xampp\htdocs\php_06_oop\app\calc\calc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47331499460579bfe769387-08819724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e73b9bb57a2f6521b1e9a649e98c780a4b4e5da5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\php_06_oop\\app\\calc\\calc.tpl',
      1 => 1616456283,
      2 => 'file',
    ),
    'b99d0abb6372097dbb7dbc3a2cbedd7047a94010' => 
    array (
      0 => 'E:\\xampp\\htdocs\\php_06_oop\\templates\\main.tpl',
      1 => 1616355468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47331499460579bfe769387-08819724',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_60579bfe7bf297_97670686',
  'variables' => 
  array (
    'conf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60579bfe7bf297_97670686')) {function content_60579bfe7bf297_97670686($_smarty_tpl) {?><!DOCTYPE HTML>
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
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header" class="dark">
				<header>
					<h1>Witaj w kalkulatorze kredytu bankowego</h1>
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
						<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute#fourth" method="post">
							<div class="row gtr-25">
								<div class="col-12"><input type="text" id="kwota" name="kwota" placeholder="Kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
"/></div>
								<div class="col-12"><input type="text" id="lata" name="lata" placeholder="Lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
"/></div>
								<div class="col-12"><input type="text" id="oproc" name="oproc" placeholder="Oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->oproc;?>
"/></div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" class="button" value="Oblicz" /></li>
									</ul>
								</div>
							</div>
						</form>
                                                        
<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
		<ol class="err">
		<?php  $_smarty_tpl->tpl_vars['err'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['err']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['err']->key => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
                <?php } ?>
                </ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
		<ol class="inf">
		<?php  $_smarty_tpl->tpl_vars['inf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getInfos(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->key => $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->_loop = true;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
                <?php } ?>
		</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<p class="res">
            Miesięczna rata: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
 zł
	</p>
<?php }?>
					</div>
				</div>



			</section>

		<!-- Footer -->
			<section id="footer">
				<div class="copyright">
					<ul class="menu">
						<li>&copy; Arek Durlik. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
