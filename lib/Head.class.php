<?php

class Head {
	private $Item = array();
	private $title;

	function __construct($title) {
		$this->title = $title;
	}

	function addItem($Item) {
		$this->Item[] = $Item;
	}

	function __toString() {
		$head = '<head>';
		$head .= '<meta charset="utf-8">';
		foreach ($this->Item as $valor) {
			$head .= $valor;
		}
		$head .= '<title>' . $this->title . '</title>';
		$head .= '</head>';
		return $head;
	}
}