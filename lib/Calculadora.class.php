<?php

class Calculadora{
    private $Visor;

    public function Calcular($NUMERO1, $OPERADOR, $NUMERO2){
        switch ($OPERADOR){
            case '+':
                return $NUMERO1 + $NUMERO2;
                break;
            case '-':
                return $NUMERO1 - $NUMERO2;
                break;
            case 'X':
                return $NUMERO1 * $NUMERO2;
                break;
            case '%':
                if($NUMERO2 == 0 ) {
                    return 'Não é possível dividir por zero';
                }else{
                    return $NUMERO1 / $NUMERO2;    
                }
                break;
        }
    }

    public function __construct(){
        $this->Visor = 0;
        if(!isset($_SESSION['VALOR'])) {
            $_SESSION['VALOR'] = 0;
            $_SESSION['RESULTADO'] = 0;
            $_SESSION['OPERADOR'] = '';
        } 
        if(isset($_POST["NUMERO"])){
            if($_SESSION['VALOR'] == 0){
                $_SESSION['VALOR'] = $_POST['NUMERO'];
            } else {
                $_SESSION['VALOR'] .= $_POST['NUMERO'];
            }
            $this->Visor = $_SESSION['VALOR'];
        }
        if(isset($_POST["OPERADOR"])){
            if(($_POST["OPERADOR"] != 'CE') and ($_POST["OPERADOR"] != '=')){
                if ($_SESSION["RESULTADO"] != 0){
                    $Valor = $this->Calcular($_SESSION["RESULTADO"], $_SESSION["OPERADOR"], $_SESSION["VALOR"]);
                    $_SESSION["RESULTADO"] = $Valor;
                    $_SESSION["VALOR"] = 0;
                    $_SESSION["OPERADOR"] = $_POST["OPERADOR"];
                }else{
                    $_SESSION["OPERADOR"] = $_POST["OPERADOR"];
                    $_SESSION["RESULTADO"] = $_SESSION["VALOR"];
                    $_SESSION["VALOR"] = 0;
                } 
            }elseif($_POST["OPERADOR"] == "=") {
                $this->Visor = $this->Calcular($_SESSION["RESULTADO"], $_SESSION["OPERADOR"],$_SESSION["VALOR"]);
                if($this->Visor == 0){
                    $this->Visor = 0;
                }
                $_SESSION['VALOR'] = 0;
                $_SESSION['RESULTADO'] = 0;
                $_SESSION['OPERADOR'] = ''; 

            }elseif($_POST["OPERADOR"] == "CE"){
                session_destroy();
            }
        }
    }

    public function __toString() {
        $html = "<form method='post' class='container calculadora' action='index.php'> \n";
        $html .= new Visor($this->Visor);
        $html .= "<div class='row'> \n";
        $html .= new Botao("NUMERO", "7");
        $html .= new Botao("NUMERO", "8");
        $html .= new Botao("NUMERO", "9");
        $html .= new Botao("OPERADOR", "%");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Botao("NUMERO", "4");
        $html .= new Botao("NUMERO", "5");
        $html .= new Botao("NUMERO", "6");
        $html .= new Botao("OPERADOR", "X");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Botao("NUMERO", "1");
        $html .= new Botao("NUMERO", "2");
        $html .= new Botao("NUMERO", "3");
        $html .= new Botao("OPERADOR", "+");
        $html .= "</div> \n";
        $html .= "<div class='row'> \n";
        $html .= new Botao("NUMERO", "0");
        $html .= new Botao("OPERADOR", "CE");
        $html .= new Botao("OPERADOR", "=");
        $html .= new Botao("OPERADOR", "-");
        $html .= "</div> \n";
        $html .= "</form> \n";
        
		return $html;
	}
}