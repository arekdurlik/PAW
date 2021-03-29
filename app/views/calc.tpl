{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<header>
					<div class="container">
						<h2>Kalkulator kredytowy</h2>
					</div>
				</header>
				<div class="content style4 featured">
					<div class="container medium">
						<form action="{$conf->action_root}calcCompute#fourth" method="post">
							<div class="row gtr-25">
								<div class="col-12"><input type="text" id="kwota" name="kwota" placeholder="Kwota" value="{$form->kwota}"/></div>
								<div class="col-12"><input type="text" id="lata" name="lata" placeholder="Lata" value="{$form->lata}"/></div>
								<div class="col-12"><input type="text" id="oproc" name="oproc" placeholder="Oprocentowanie" value="{$form->oproc}"/></div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" class="button" value="Oblicz" /></li>
									</ul>
								</div>
							</div>
						</form>
                                                        {* wyświeltenie listy błędów, jeśli istnieją *}
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


{/block}