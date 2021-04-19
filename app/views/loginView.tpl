<!DOCTYPE HTML>
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
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
	</head>
	<body class="is-preload">
			<section id="fourth" class="main">
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
        <div class="content">
                
        <div style="margin-top:11em;" class="container medium">
         <form action="{$conf->action_url}login" method="post">
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
         {if $msgs->isError()}
		<ol class="err">
		{foreach $msgs->getErrors() as $err}
                {strip}
                        <li>{$err}</li>
                {/strip}
                {/foreach}
                </ol>
{/if}


{if $msgs->isInfo()}
		<ol class="inf">
		{foreach $msgs->getInfos() as $inf}
                {strip}
                        <li>{$inf}</li>
                {/strip}
                {/foreach}
		</ol>
{/if}

{if isset($res->result)}
	<p class="res">
            Miesięczna rata: {$res->result} zł
	</p>
{/if}   
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
