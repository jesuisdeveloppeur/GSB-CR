<?php
$this->load->helper('url');
$path = base_url();

?>
<div id="contenu" > 
	<h1>Identification utilisateur</h1>
	
	<?php if (isset($erreur)) echo'<div class ="erreur"><ul><li>'.$erreur.'</li></ul></div>'; ?>
	
	<form method="post" action="<?php echo $path.'Welcome/login';?>">
		<p>
			<label for="login">login*</label>
			<input id = "login" type="text" name="login" size="40"/>
		</p>
		<p>
			<label for="nom">Mot de Passe*</label>
			<input id = "mdp" type="password" name="mdp" size="30"/>
		</p>
		<p>
			<input type = "submit" value="Valider" name="valider"/>
			<input type = "reset" value="Annuler" name="annuler" />
		</p>
	</form>
</div>
	
	