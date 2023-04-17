<?php
// PROGRAMA PRINCIPAL
// Declaración de variables
// string $destinoViaje, $nombrePasajero, $apellidoPasajero, $listaPasajeros, $nombreResponsableV, $apellidoResponsableV, $mensaje, 
// boolean $esValidoElDni, $esDuplicado
// array $arrayPasajeros
// Pasajero $pasajero
// ResponsableV $objPersonaResponsable 
// int $opcion, $codViaje, $maxPasajerosViaje , $documentoPasajero, $pasajerosCargados, $pasajerosACargar, $telefonoPasajero, $nroEmpleadoResponsableV, $nroLicenciaResponsableV, $j, 
// $opcionCambio, $nuevaCantMaxPasajeros, $cantPasajeros, $dniIngresado, $indicePasajero, $nroLicenciaResponsableVNuevo, $nroEmpleadoResponsableVNuevo 

include_once ("Viaje.php");
include_once ("ResponsableV.php");
// Inicializacion de variables 

$pasajerosACargar = 0; 
$pasajerosCargados = 0;

do {
    echo "\n --- Menú --- \n";
    echo "<1> Ingresar informacion acerca del viaje y crear el responsable del viaje \n";
    echo "<2> Ingresar los pasajeros \n";
    echo "<3> Modificar datos del viaje \n";
    echo "<4> Modificar datos de un pasajero \n";
    echo "<5> Modificar datos del responsable del viaje \n";
    echo "<6> Ver informacion del viaje, los pasajeros y la persona responsable \n"; 
    echo "<7> Salir \n"; 
    echo "<-> Ingrese opcion: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion)
    {
        case 1:
            echo "Datos del viaje: \n";
            echo "Ingrese el destino del viaje: ";
            $destinoViaje = trim(fgets(STDIN));
            echo "Ingrese el código del viaje: ";
            $codViaje = trim(fgets(STDIN));
            echo "Ingrese la cantidad de pasajeros maxima: ";
            $maxPasajerosViaje = trim(fgets(STDIN)); 
            echo "Datos del responsable del viaje: \n";
            echo "Ingrese el nombre del responsable del viaje: "; 
            $nombreResponsableV = trim(fgets(STDIN));
            echo "Ingrese el apellido del responsable del viaje: ";
            $apellidoResponsableV = trim(fgets(STDIN));
            echo "Ingrese el número de empleado del responsable del viaje: ";
            $nroEmpleadoResponsableV = trim(fgets(STDIN));
            echo "Ingrese el número de licencia del responsable del viaje: ";
            $nroLicenciaResponsableV = trim(fgets(STDIN)); 
            $objPersonaResponsable = new ResponsableV ($nroEmpleadoResponsableV, $nroLicenciaResponsableV, $nombreResponsableV, $apellidoResponsableV);
            $viaje = new Viaje ($codViaje, $destinoViaje, $maxPasajerosViaje, $objPersonaResponsable);
            echo "Viaje y responsable del viaje creado \n";
        break;
        case 2:
            // Uso getCantPasajeros para que luego de cambiar la cantidad máxima de pasajeros se puedan agregar los que faltan
            $maxPasajerosViaje = $viaje -> getCantMaxPasajeros ();
            if ($maxPasajerosViaje == $pasajerosCargados)
            {
                echo "Ya se alcanzó la capacidad máxima de este viaje \n";
            }
            else
            {
                $asientosDisponibles = ($maxPasajerosViaje - $pasajerosCargados); 
                echo "Ingrese la cantidad de pasajeros que desea cargar: ";
                $pasajerosACargar = trim(fgets(STDIN)); 
                if ($pasajerosACargar > $maxPasajerosViaje)
                {
                    echo "Error, no se puede cargar más pasajeros que la cantidad máxima de pasajeros del viaje \n"; 
                }
                elseif ($pasajerosACargar > $asientosDisponibles)
                {
                    echo "Error, no se puede cargar más pasajeros que los asientos disponibles \n";
                }
                elseif ($asientosDisponibles >= $pasajerosACargar) 
                {
                    echo "Ingrese ".$pasajerosACargar." pasajeros: \n"; 
                    for ($j = 1; $j <= $pasajerosACargar; $j++)
                    {
                        echo "Ingresar pasajero N° ".($pasajerosCargados+1)."\n";
                        echo "Ingrese el nombre del pasajero: ";
                        $nombrePasajero = trim(fgets(STDIN));
                        echo "Ingese el apellido del pasajero: ";
                        $apellidoPasajero = trim(fgets(STDIN));
                        echo "Ingrese el DNI del pasajero: ";
                        $documentoPasajero = trim(fgets(STDIN));
                        echo "Ingrese el teléfono del pasajero: ";
                        $telefonoPasajero = trim(fgets(STDIN)); 
                        $mensaje = $viaje -> agregarPasajero ($nombrePasajero, $apellidoPasajero, $documentoPasajero, $telefonoPasajero); 
                        if ($mensaje == "Pasajero Duplicado")
                        {
                            echo "Ingrese de nuevo el pasajero, pasajero duplicado \n";
                            $j--;
                            $pasajerosCargados --;
                        }
                        $pasajerosCargados ++;
                    }
                    echo "Se han cargado ".$pasajerosACargar." pasajeros.\n"; 
                }
            }
        break;
        case 3:
            do {
                echo "      Modificar datos del viaje \n";
                echo "      <1> Cambiar el destino \n";
                echo "      <2> Cambiar el código del viaje \n";
                echo "      <3> Cambiar la cantidad máxima de pasajeros \n";
                echo "      <4> Salir \n"; 
                echo "      <-> Ingrese opcion: ";
                $opcionCambio = trim(fgets(STDIN));
                $arrayPasajeros = $viaje -> getArrayPasajeros();
                switch ($opcionCambio)
                {
                    case 1:
                        echo "      Ingrese el nuevo destino: ";
                        $destinoViaje = trim(fgets(STDIN));
                        $viaje -> setDestinoViaje ($destinoViaje);
                        echo "      Destino del viaje cambiado \n\n";
                    break;
                    case 2:
                        echo "      Ingrese el nuevo código del viaje: ";
                        $codigoViaje = trim(fgets(STDIN));
                        $viaje -> setCodigoViaje ($codigoViaje);
                        echo "      Código del viaje cambiado \n\n";
                    break;
                    case 3:
                        echo "      Ingrese la nueva cantidad máxima de pasajeros: ";
                        $nuevaCantMaxPasajeros = trim(fgets(STDIN));
                        $cantPasajeros = count($arrayPasajeros);
                        if ($nuevaCantMaxPasajeros <= $cantPasajeros)
                        {
                            echo "      Error, ya hay ".$cantPasajeros." pasajeros cargados no es posible cambiar el numero máximo de pasajeros a uno menor o uno igual de los ya cargados \n\n";
                        }
                        else
                        {
                            $viaje -> setCantMaxPasajeros ($nuevaCantMaxPasajeros);
                            echo "      Cantidad máxima de pasajeros cambiada \n\n";
                        }
                    break;
                }
            } while ($opcionCambio <> 4);
        break;
        case 4:
            echo "Lista de pasajeros: \n";
            $listaPasajeros = $viaje -> mostrarPasajeros ();
            echo $listaPasajeros;
            echo "Ingrese el DNI del pasajero que desea cambiar: ";
            $dniIngresado = trim(fgets(STDIN));
            $esValidoElDni = $viaje -> verificarDuplicados ($dniIngresado);
            if ($esValidoElDni)
            {
                $arrayPasajeros = $viaje -> getArrayPasajeros ();
                $indicePasajero = $viaje -> indiceDePasajero ($dniIngresado);
                $pasajero = $arrayPasajeros [$indicePasajero];
                do {
                    echo "      Modificar datos de un pasajero \n";
                    echo "      <1> Cambiar el nombre \n";
                    echo "      <2> Cambiar el apellido \n";
                    echo "      <3> Cambiar el DNI \n";
                    echo "      <4> Cambiar el teléfono \n";
                    echo "      <5> Cambiar todo \n";
                    echo "      <6> Salir \n";
                    echo "      <-> Ingrese opcion: ";
                    $opcionCambio = trim(fgets(STDIN));
                    switch ($opcionCambio)
                    {
                        case 1:
                            echo "      Escriba el nuevo nombre del pasajero: ";
                            $nombrePasajero = trim(fgets(STDIN));
                            $pasajero -> setNombre ($nombrePasajero);
                            echo "      Nombre cambiado \n\n";
                        break;
                        case 2: 
                            echo "      Escriba el nuevo apellido del pasajero: ";
                            $apellidoPasajero = trim(fgets(STDIN));
                            $pasajero -> setApellido ($apellidoPasajero);
                            echo "      Apellido cambiado \n\n";
                        break;
                        case 3:
                            echo "      Escriba el nuevo DNI del pasajero: ";
                            $documentoPasajero = trim(fgets(STDIN));
                            $esDuplicado = $viaje -> verificarDuplicados ($documentoPasajero);
                            if (!$esDuplicado)
                            {
                                $pasajero -> setDni ($documentoPasajero);
                                echo "      Dni cambiado \n\n";
                            }
                            else
                            {
                                echo "      Ese DNI ya esta cargado, ingrese otro \n";
                            }
                        break;
                        case 4:
                            echo "      Ingrese el nuevo teléfono del pasajero: ";
                            $telefonoPasajero = trim(fgets(STDIN));
                            $pasajero -> setTelefono ($telefonoPasajero);
                            echo "      Teléfono cambiado \n\n";
                        break;
                        case 5:
                            echo "      Escriba el nuevo DNI del pasajero: ";
                            $documentoPasajero = trim(fgets(STDIN));
                            $esDuplicado = $viaje -> verificarDuplicados ($documentoPasajero);
                            if (!$esDuplicado)
                            {
                                $pasajero -> setDni ($documentoPasajero);
                                echo "      Escriba el nuevo nombre del pasajero: ";
                                $nombrePasajero = trim(fgets(STDIN));
                                echo "      Escriba el nuevo apellido del pasajero: ";
                                $apellidoPasajero = trim(fgets(STDIN));
                                echo "      Ingrese el nuevo teléfono del pasajero: ";
                                $telefonoPasajero = trim(fgets(STDIN));
                                $pasajero -> setNombre ($nombrePasajero);
                                $pasajero -> setApellido ($apellidoPasajero);
                                $pasajero -> setDni ($documentoPasajero);
                                $pasajero -> setTelefono ($telefonoPasajero);
                                echo "      Nombre, apellido, dni y teléfono cambiados \n\n";
                            }
                            else
                            {
                                echo "      Ese DNI ya esta cargado, ingrese otro \n\n";
                            }
                        break;
                    }
                } while ($opcionCambio <> 6);
                $arrayPasajeros [$indicePasajero] = $pasajero;
                $viaje -> setArrayPasajeros ($arrayPasajeros);
            }
            else
            {
                echo "El DNI no corresponde a ningun pasajero \n";      
            }
        break;
        case 5:
            echo "Ingrese el nuevo responsable del viaje: \n";
            echo "Ingrese el número de empleado del nuevo responsable: ";
            $nroEmpleadoResponsableVNuevo = trim(fgets(STDIN));
            if ($nroEmpleadoResponsableV == $nroEmpleadoResponsableVNuevo)
            {
                echo "Error, ya esta cargada esa persona responsable \n";
            }
            else
            {
                $nroEmpleadoResponsableV = $nroEmpleadoResponsableVNuevo;
                echo "Ingrese el número de licencia del nuevo responsable: ";
                $nroLicenciaResponsableVNuevo = trim(fgets(STDIN));
                echo "Ingrese el nombre del nuevo responsable: ";
                $nombreResponsableV = trim(fgets(STDIN)); 
                echo "Ingrese el apellido del nuevo responsable: ";
                $apellidoResponsableV = trim(fgets(STDIN));
                $objPersonaResponsable = new ResponsableV ($nroEmpleadoResponsableVNuevo, $nroLicenciaResponsableVNuevo, $nombreResponsableV, $apellidoResponsableV);
                $viaje -> setObjResponsableV ($objPersonaResponsable);
                echo "Persona responsable cambiada \n";
            }
        break;
        case 6:
            echo "\nInformación del viaje: \n";
            echo $viaje."\n";
        break;
    }
} while ($opcion <> 7);
