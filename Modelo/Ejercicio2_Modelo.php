<?php

function agregaDias(){
    for($i = 1; $i < 32; $i++){
        ?>
            <option><?php echo $i; ?></option>
        <?php
    }
}

function agregaMes(){
    for($i = 1; $i < 13; $i++){
        ?>
            <option><?php echo $i; ?></option>
        <?php
    }
}

function agregaAnio(){
    for($i = 2000; $i < 2500; $i++){
        ?>
            <option><?php echo $i; ?></option>
        <?php
    }
}

function CalcularAmortizacion($sisAmort, $dia, $mes, $anio, $importe, $periodo, $interes, $plazo){

    $NuevaFecha = array("dia"=>($dia), "mes"=>($mes), "anio"=>($anio));
    
    $cuota = 0;
    $InteresTabla = 0;
    $saldo=$importe;
    
    $capital = $importe/ $plazo;



    for($i = 0; $i < $plazo; $i++)
    {
        if($sisAmort == "Simple"){
            $InteresTabla = $importe * ($interes / 100);
        }
        else{
            if($i == 0)
            {
                $InteresTabla = $importe * ($interes / 100);
            }
            else
            {
                $InteresTabla = $InteresTabla + ($InteresTabla / $capital);
            }
        }

        $cuota = $capital + $InteresTabla;
        $saldo = $saldo-$capital;

        $NuevaFecha = fechaSiguiente($NuevaFecha, $periodo);
        ?>
    
        <tr <?php 
            if($i % 2 != 0){ ?>
                style="background-color: darkkhaki" 
        <?php } ?>>
            <td><?php echo $NuevaFecha["dia"]."/".$NuevaFecha["mes"]."/".$NuevaFecha["anio"] ?></td>
            <td><?php echo round($cuota,2) ?></td>
            <td><?php echo round($capital,2) ?></td>
            <td><?php echo round($InteresTabla, 2) ?></td>
            <td><?php echo round($saldo,2) ?></td>
        </tr>
    <?php    
    }
}

function fechaSiguiente($fechaAntigua, $periodo){
    $saltoDia=0;
    $saltoAnio=0;
    $saltoMes=0;

    if($periodo == "Diario")
    {
        $saltoDia=1;
    }
    else if($periodo == "Semanal")
    {
        $saltoDia=7;
    }
    else if($periodo == "Quincenal")
    {
        $saltoDia=14;
    }
    else if($periodo == "Mensual")
    {
        $saltoMes=1;
    }
    else if($periodo == "Anual")
    {
        $saltoAnio=1;
    }
    
    $nuevoDia = $fechaAntigua["dia"] + $saltoDia;
    $nuevoMes = $fechaAntigua["mes"] + $saltoMes;
    $nuevoAnio = $fechaAntigua["anio"] + $saltoAnio;

    //dia aumenta mes
    if(($nuevoDia >= 28) && ($nuevoMes == 2))
    {
        $nuevoMes++;
        $nuevoDia = $nuevoDia - 28;
    }
    else if(($nuevoDia >= 30) && (($nuevoMes == 4) || ($nuevoMes == 6) || ($nuevoMes == 9) || ($nuevoMes == 11)))
    {
        $nuevoMes++;
        $nuevoDia = $nuevoDia - 30;
    }
    else if(($nuevoDia >= 31) && (($nuevoMes == 1) || ($nuevoMes == 3) || ($nuevoMes == 5) || ($nuevoMes == 7) || ($nuevoMes == 8) || ($nuevoMes == 10)))
    {
        $nuevoMes++;
        $nuevoDia = $nuevoDia - 31;
    }
    //mes aumenta anio
    if(($nuevoDia >= 31) && ($nuevoMes == 12))
    {
        $nuevoAnio++;
        $nuevoMes = 1;
        $nuevoDia = $nuevoDia - 31;
    }

    $NuevaFecha = array("dia"=>($nuevoDia), "mes"=>($nuevoMes), "anio"=>($nuevoAnio));
    return $NuevaFecha;
}

?>