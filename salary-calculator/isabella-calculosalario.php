<?php

function calcularINSS(){
    $salario = $_GET['salario'];

    $primeiraFaixa = 97.65;
    $segundaFaixa = 114.23;
    $terceiraFaixa = 154.27;

    if($salario <= 1302 ){
        $aliquota = ($salario * 0.075);
        $salarioSemINSS = $salario - $aliquota;
    }

    else if($salario <= 2571.29){
        $aliquota = $primeiraFaixa + (($salario - 1302) * 0.09);
        $salarioSemINSS = $salario - $aliquota;
    }

    else if($salario <= 3856.94){
        $aliquota = $primeiraFaixa + $segundaFaixa + (($salario - 2571.29) * 0.12);
        $salarioSemINSS = $salario - $aliquota;
    }

    else if($salario <= 7507.49){
        $aliquota = $primeiraFaixa + $segundaFaixa + $terceiraFaixa + (($salario - 3856.94) * 0.14);
        $salarioSemINSS = $salario - $aliquota;
    }

    else{$salarioSemINSS = $salario - 877.24;
    }

    return CalculaIRRF($salarioSemINSS, $aliquota);
}

function calculaIRRF($salarioSemINSS, $aliquota){
    $dependentes = $_GET['dependentes'];
    $salarioLiquido = 0;
    $irrf = 0;
    $valorBaseIR2 = $salarioSemINSS - ($dependentes * 189.56);

    switch (true){
        case $valorBaseIR2 <= 1903.98:
             $irrf = $valorBaseIR2; break;

        case $valorBaseIR2 <= 2826.65: 
            $irrf = ($valorBaseIR2 * 0.075) - 142.80; break;

        case $valorBaseIR2 <= 3751.05: 
            $irrf = ($valorBaseIR2 * 0.15) - 354.80; break;

        case $valorBaseIR2 <= 4664.68:
            $irrf =  ($valorBaseIR2 * 0.225) - 636.13; break;

        default: $irrf = ($valorBaseIR2 * 0.275) - 869.36; break;
    }

    $salarioLiquido = $salarioSemINSS - $irrf;

    return "Valor do Salário Líquido: R$ " . round($irrf, 2) . "<br><br>" .
    "Valor do INSS: R$" . round($aliquota, 2) . "<br><br>" .
    "Valor do IRRF: R$ " .  round($salarioLiquido, 2);
  
}