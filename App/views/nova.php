<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<?php include('../includes/HEAD.INC'); ?>
	<body>
		<?php include('../includes/header.php'); ?>
		<h2>Balança Mudança</h2>
		<?php
			if(array_key_exists('criado', $_SESSION) && ($_SESSION['criado'] == true)) {
				echo '<div class="alert alert-success" role="alert">Pesagem registrada!</div>';
			}
			unset($_SESSION['criado']);
		?>
		<form class="form" action="../controllers/novaPesagem.php" method="POST">
			Dia da pesagem: <br>
				<input type="date" name="ps_data" required> <br>
			Peso: <br>
				<input type="text" name="ps_peso" required> Kg <br>
			<input type="submit" name="" value="Salvar Pesagem">
		</form>
		<script type="text/javascript" src="../vendors/js/bootstrap.min.js"></script>
	</body>
</html>
