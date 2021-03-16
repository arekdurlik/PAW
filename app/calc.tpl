{extends file="../templates/main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<header>
					<div class="container">
						<h2>Kalkulator kredytowy</h2>
					</div>
				</header>
				<div class="content style4 featured">
					<div class="container medium">
						<form action="{$app_url}/app/calc.php#fourth" method="post">
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
                                                        {* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h1 style="margin-top: 1em; text-align:center; font-size:150%;">Wynik</h1>
	<p class="res">
	{$result}
	</p>
{/if}
					</div>
				</div>


{/block}