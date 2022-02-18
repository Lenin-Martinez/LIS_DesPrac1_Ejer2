<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/EstiloEjercicio1.css">
    <title>Tabla de amortizacion</title>
</head>
<body>



    <div  class="Titulo">
        <h2>Calculadora de tabla de amortizacion</h2>
    </div>

    <div class="entradaDatos">

    <form method="post">
                
        <div class="labelEntradas">
            Sistema de amortizacion:<br><br>
            Fecha de desembolso (d/m/a):<br><br>
            Importe del prestamo:<br><br><br>
            Periodo:<br><br>
            Interes:<br><br>
            Plazo:<br><br>
        </div>

        <div class="inputEntradas">
            <select name="selectTipo" style="width: 300px; border-radius: 5px;">
                    <option>Simple</option>
                    <option>Compuesto</option>
                </select><br><br>
                
                <select name="selectDia" style="width: 45px; 
                                                border-bottom-left-radius: 25px; 
                                                border-top-left-radius: 25px;"
                                                >
                    <?php agregaDias(); ?>
                </select>

                <select name="selectMes" style="width: 45px;">
                    <?php agregaMes(); ?>
                </select>

                <select name="selectAnio" style="width: 60px; 
                                                border-bottom-Right-radius: 25px; 
                                                border-top-Right-radius: 25px;"
                                                >
                    <?php agregaAnio(); ?>
                </select><br><br>

                <input type="text" name="txtImporte" placeholder="0" style="border-radius: 5px;"><br><br>

                <select name="selectPeriodo" style="border-radius: 5px;">
                    <option>Diario</option>
                    <option>Semanal</option>
                    <option>Quincenal</option>
                    <option>Mensual</option>
                    <option>Anual</option>
                </select><br><br>

                <input type="text" name="txtInteres" placeholder="0" style="border-radius: 5px; width: 50px;"> %<br><br>

                <input type="text" name="txtPlazo" placeholder="0" style="border-radius: 5px; width: 50px;"><br><br>
        </div>
        
        <input type="submit" name="Calcular" value="Calcular" class="btnCalcular">
        </form>
    </div>

    <div class="Resultados">
        <div><h1>Calculadora de prestamos</h1></div>

        <div>
            <table border="1">
                <tr class="tablaTitulo">
                    <td>Fecha</td>
                    <td>Cuota</td>
                    <td>Capital</td>
                    <td>Interes</td>
                    <td>Saldo</td>
                </tr>

                <?php 
                    if(isset($_POST["Calcular"]) && 
                    !empty($_POST["txtImporte"]) && 
                    !empty($_POST["txtInteres"]) &&  
                    !empty($_POST["txtPlazo"]) )
                    {
                        CalcularAmortizacion($_POST["selectTipo"], 
                                            $_POST["selectDia"], 
                                            $_POST["selectMes"], 
                                            $_POST["selectAnio"],
                                            $_POST["txtImporte"],
                                            $_POST["selectPeriodo"],
                                            $_POST["txtInteres"],
                                            $_POST["txtPlazo"]);
                    }
                ?>
            </table>


            
            

        </div>
    </div>

</body>
</html>