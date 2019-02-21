<?php 

//funçao de validaçao para os campos cpf e nome
function validate($client = []){
    if( validateName($client['nome']) && validateCPF($client['cpf'])){
        return true;
    }
    return false;
}

//validaçao do nome
function validateName($name){
    if(empty($name)) {
		return false;
    }
    if(strlen($name)<= 2){
        return false;
    }
    return true;
}

//validaçao do cpf
function validateCPF($cpf) {

	// Verifica se o CPF esta vazio
	if(empty($cpf)) {
		return false;
	}

	// Retira a mask
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o cpf é valido
	 // Algoritimo de validaçao de CPF
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

?>
