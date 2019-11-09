<?php

class MaxCalls
{
	private $calls;
	private $maxCalls;

	public function __construct($maxCalls)
	{
		$this->maxCalls = $maxCalls;
		$this->calls = 1;
	}

	public function __invoke()
	{
		if ($this->calls > $this->maxCalls) {
			echo 'Número máximo de chamadas excedido';
		} else {
			echo $this->calls;
			$this->calls += 1;
		}
	}
}

$f = new MaxCalls(100);

for ($i = 0; $i < 1000; $i++)
{
	$f();
	echo '<br>';
}