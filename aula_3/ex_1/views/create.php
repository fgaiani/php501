<?php

$html = <<<HTML
<html>
<body>
	<form method="POST" action="../controllers/create.php">
		<div>
			<label>Nome</label>
			<input type="text" name="name">
		</div>
		<div>
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div>
			<label>Idade</label>
			<input type="number" name="age">
		</div>
		<div>
			<label>Senha</label>
			<input type="password" name="password">
		</div>
		<button type="submit">Cadastrar</button>
	</form>
</body>
</html>
HTML;

echo $html;