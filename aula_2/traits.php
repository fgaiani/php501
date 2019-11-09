<?php

$enunciado = <<<HEAD
ESCREVER UMA TRAIT (TRAIT_1) QUE CONTENHA OS MÉTODOS:
- foo()
- bar()
E OUTRA (TRAIT_2) QUE CONTENHA OS METODOS
- qux()
- foo()
E IMPLEMENTAR UMA CLASSE (CLASSE_1) QUE UTILIZE O MÉTODO foo
DA TRAIT2 sob o alias NUNCA_UTILIZAR
HEAD;

trait TRAIT_1 {
	public function foo() {
		return 'FOO_1';
	}

	public function bar() {
		return 'BAR';
	}
}

trait TRAIT_2 {
	public function qux() {
		return 'QUX';
	}

	public function foo() {
		return 'FOO_2';
	}
}

class CLASSE_1 {
	use TRAIT_1, TRAIT_2 {
		TRAIT_1::foo insteadof TRAIT_2;
		TRAIT_2::foo as NUNCA_UTILIZAR;
	}
}

