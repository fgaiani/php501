<?php

$res = file_get_contents('https://gen-net.herokuapp.com/api/users');
$res = json_decode($res, true);

class IteradorOrdemAlfabetica implements Iterator
{
	private $lista;
	private $currentIndex;

	public function __construct($lista, $chave, $ordem)
	{
		$this->lista = $lista;

		usort($this->lista, function($a, $b) use ($chave, $ordem) {
			if ($ordem) {
				return $a[$chave] > $b[$chave];
			} else {
				return $a[$chave] < $b[$chave];
			}
		});
	}

	public function rewind()
	{
		$this->currentIndex = 0;
	}

	public function current()
	{
		return $this->lista[$this->currentIndex];
	}

	public function key()
	{
		return $this->currentIndex;
	}

	public function next()
	{
		$this->currentIndex += 1;
	}

	public function valid()
	{
		return $this->currentIndex < count($this->lista);
	}
}

class TabelaDeUsuarios implements IteratorAggregate
{
	private $lista;
	private $key;
	private $ordem;

	public function __construct($lista)
	{
		$this->lista = $lista;
		$this->key = 'email';
		$this->ordem = false;
	}

	public function getIterator()
	{
		return new IteradorOrdemAlfabetica(
			$this->lista, $this->key, $this->ordem
		);
	}

	public function setKey($key) {
		$this->key = $key;
	}

	public function montarTabela()
	{
		$res = '';

		foreach ($this as $k => $v)
		{
			$res .= '<tr>';
			$res .= '<td>' . $v['id'] . '</td>';
			$res .= '<td>' . $v['email'] . '</td>';
			$res .= '<td>' . $v['name'] . '</td>';
			$res .= '</tr>';
		}

		return $res;
	}
}

$key = $_GET['key'];

$tabelaDeUsuarios = new TabelaDeUsuarios($res);

$tabela = $tabelaDeUsuarios->montarTabela();
$tabela->setKey($key);

$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Exemplo</title>

</head>
<body>
  <table style="text-align: center;">
    <thead>
      <tr>
        <th><a href="iteradores_2.php?key=id">ID</a></th>
        <th><a href="iteradores_2.php?key=email">Email</a></th>
        <th><a href="iteradores_2.php?key=nome">Nome</a></th>
      </tr>
    </thead>
    <tbody>
	    $tabela
    </tbody>
  </table>
</body>
</html>
HTML;

echo $html;