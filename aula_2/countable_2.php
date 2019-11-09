<?php

$hino = <<<HINO
Salve o Corinthians
O campeao dos campeoes
Eternamente
Dentro dos nosso coraçoes
Salve o Corinthians
De tradicoes de tradiçoes e glorias mil
Tu es orgulho, dos desportistas do Brasil
Teu passado e uma bandeira
Teu presente e uma licao
Figuras entre os primeiros do nosso esporte bretao
Corinthians Grande
Sempre Altaneiro
Es do Brasil
O clube mais brasileiro
Salve o Corinthians
O campeao dos campeoes
Eternamente
Dentro dos nosso coracoes
Salve o Corinthians
De tradicoes de tradicoes e glorias mil
Tu es orgulho, dos desportistas do Brasil
HINO;

const VOGAIS = [ 'a', 'e', 'i', 'o', 'u' ];

class ContadorDeVogais implements Countable
{
	private $text;

	public function __construct($text)
	{
		$this->text = $text;
	}

	public function count(): int
	{
		$contagem = 0;

		for ($i = 0; $i < strlen($this->text); $i++) 
		{
			$c = strtolower($this->text[$i]);

			if (in_array($c, VOGAIS)) {
				$contagem += 1;
			}
		}

		return $contagem;
	}
}

echo count(new ContadorDeVogais($hino));