<?php

class Body {
	private $Item = array();

	function addItem(...$Item) {
		$this->Item = array_merge($this->Item, $Item);
	}

	public function __toString() {
		$body = '<body>';
		foreach ($this->Item as $valor) {
			$body .= $valor;
		}
		$body .= '</body>';
		return $body;
	}
}