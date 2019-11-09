<?php

class NumerosPares implements Iterator
{
	private $start;
	private $end;
	private $currentValue;
	private $currentIndex;

	public function __construct($start, $end) {
		$this->start = $start;
		$this->end = $end;
	}

	public function current() {

		return $this->currentValue;
	}

	public function key() {
		return $this->currentIndex;
	}

	public function next() {
		$this->currentValue += 2;
		$this->currentIndex += 1;
	}

	public function valid() {
		return $this->currentValue < $this->end;
	}

	public function rewind() {
		if ($this->start % 2 == 0) {
			$this->currentValue = $this->$start;	
		} else {
			$this->currentValue = $this->start + 1;
		}
		
		$this->currentIndex = 0;
	}
}

$numeros = new NumerosPares(0, 5000000);

foreach ($$numeros as $$indice => $numero) {
	echo 'Indice: ' . $indice . '; valor: ' . $numero;
}