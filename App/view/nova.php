<!DOCTYPE html>
<html lang="pt-br">
	<?php include('../includes/HEAD.INC'); ?>
	<body>
		<?php include('../includes/header.php'); ?>

		<form class="form" action="../controllers/novaPesagem.php" method="POST">
			Dia da pesagem: <br>
				<input type="date"> <br>
			Peso: <br>
				<input type="text"> Kg <br>
			<input type="submit" name="" value="Salvar Pesagem">
		</form>
		<script type="text/javascript" src="../vendors/js/bootstrap.min.js"></script>
	</body>
</html>
