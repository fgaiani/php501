<?php

	interface Entity {
		public function init();
		public function done();
		public function update();
		public function die();
	}

	class GameLoop {
		public function run($entity)
		{
			$entity->init();

			while (!$entity->done())
			{
				$entity->update();
			}

			$entity->die();
		}
	}

	class GameObject implements Entity {
		private $contador;
		private $maxIters;

		public function __construct($maxIters) {
			$this->maxIters = $maxIters;
		}

		public function init() {
			$this->contador = 0;
		}

		public function done() {
			return $this->contador == $this->maxIters;
		}

		public function update() {
			$this->contador += 1;
		}

		public function die() {
			echo "Game Over xD | {$this->contador}";
		}
	}

	$entity = new GameObject(10);
	
	$gameLoop = new GameLoop();
	
	$gameLoop->run($entity);