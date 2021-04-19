<?php /* Smarty version Smarty-3.1.17, created on 2021-04-19 11:00:37
         compiled from "E:\xampp\htdocs\php_07\app\views\LoginView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1167702680607d3c703b92f7-07802920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e09bad08b49fa886ca32828023b9767d55e870f' => 
    array (
      0 => 'E:\\xampp\\htdocs\\php_07\\app\\views\\LoginView.tpl',
      1 => 1618822836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1167702680607d3c703b92f7-07802920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_607d3c703f3c83_69894927',
  'variables' => 
  array (
    'conf' => 0,
    'msgs' => 0,
    'err' => 0,
    'inf' => 0,
    'res' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607d3c703f3c83_69894927')) {function content_607d3c703f3c83_69894927($_smarty_tpl) {?><!DOCTYPE HTML>
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
			<section id="fourth" class="main">
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
        <div class="content">
                
        <div style="margin-top:11em;" class="container medium">
         <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
          <div class="row gtr-25">
                  <div class="col-12">
			<input id="id_login" type="text" name="login" placeholder="Login"/>
                  </div>
                  <div class="col-12">
			<input id="id_pass" type="password" name="pass" placeholder="Hasło" /><br />
                  </div>
          </div>
          <ul class="actions special">
                  <li><input style="padding-top: 0.5em; padding-bottom: 0.5em; margin-bottom: 1.75em" type="submit" value="zaloguj"  /></li>
          </ul>
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
</html>
<?php }} ?>
