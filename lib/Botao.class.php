<?php
class Botao{

	private $Nome;
	private $Valor;

	public function __construct($Nome, $Valor) {
		$this->Nome = $Nome;
		$this->Valor = $Valor;
	}

	public function __toString() {
		return "<input class='col-3 centered text-center botao' type='submit' name='" . $this->Nome . "' value='" . $this->Valor . "'> \n";
	}

}