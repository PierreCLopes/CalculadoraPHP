<?php

class Visor {
	private $Valor;

	public function __construct($Valor = 0) {
		$this->Valor = $Valor;
	}

	public function __toString() {
        $html = "<div class='row'> \n";
        $html .= "<div class='col-12 centered resultado'>" . $this->Valor . "</div> \n";
        $html .= "</div> \n";
		return $html;
	}

}