<?php
include_once ("Pasajero.php");
class Viaje
{   
    // Atributos
    private $codigoViaje, $destinoViaje, $cantMaxPasajeros, $arrayPasajeros, $objResponsableV;

    /**
     * Recibe como parametros los valores iniciales para los atributos
     * @param int $codigoViaje, $cantMaxPasajeros
     * @param string $destinoViaje
     * @param ResponsableV $objResponsableV
     */
    public function __construct ($codigoViaje, $destinoViaje, $cantMaxPasajeros, $objResponsableV)
    {
        $this -> arrayPasajeros = array ();
        $this -> codigoViaje = $codigoViaje;
        $this -> destinoViaje = $destinoViaje;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
        $this -> objResponsableV = $objResponsableV;
    }
    
    // Métodos

    /**
     * Módulo Adicional
     * Recibe por parámetro el dni de un pasajero y retorna su índice en el array
     * @param int $dniP
     */
    public function indiceDePasajero ($dniP)
    {
        // Variables Internas
        // array $arrayPasajeros
        // int $cantPasajeros, $pos 
        // boolean $encontrado
        // Pasajero $pasajeroActual
        $arrayPasajeros = $this -> getArrayPasajeros ();
        $cantPasajeros = count ($arrayPasajeros);
        $encontrado = false;
        $pos = 0;
        while ((!$encontrado) && ($pos < $cantPasajeros))
        {
            $pasajeroActual = $arrayPasajeros [$pos];
            $dni = $pasajeroActual -> getDni ();
            if ($dni == $dniP)
            {
                $indicePasajero = $pos;
                $encontrado = true;
            }
            $pos ++;   
        }
        return $indicePasajero;
    }

    /**
     * Verifica si 1 pasajero es igual a otro, si no lo es, lo agrega al array
     * @param string $nombre, $apellido
     * @param int $dni
     */
    public function agregarPasajero ($nombre, $apellido, $dni, $telefono)
    {
        // Variables Internas
        // boolean $duplicado
        // string $mensaje
        // array $arrayPasajeros
        // Pasajero $pasajero
        $mensaje = "Pasajero Duplicado";
        $duplicado = $this -> verificarDuplicados ($dni);
        if (!$duplicado)
        {
            $pasajero = new Pasajero ($nombre, $apellido, $dni, $telefono);
            $arrayPasajeros = $this -> getArrayPasajeros ();
            array_push ($arrayPasajeros, $pasajero);
            $this -> setArrayPasajeros ($arrayPasajeros);
            $mensaje = "Pasajero Agregado";
        }
        return $mensaje;
    }

    /**
     * Módulo adicional
     * Verifica que no haya un pasajero igual a otro
     * @return boolean
     */
    public function verificarDuplicados ($dni)
    {
        // Variables Internas
        // array $arrayPasajeros
        // int $pos, $cantPasajeros
        // boolean $duplicado
        // string $dniPasajero
        // Pasajero $objPasajero
        $pos = 0;
        $duplicado = false;
        $arrayPasajeros = $this -> getArrayPasajeros ();
        $cantPasajeros = count ($arrayPasajeros);
        if ($cantPasajeros <> 0)
        {
            do {
                $objPasajero = $arrayPasajeros [$pos];
                $dniPasajero = $objPasajero -> getDni ();
                if ($dniPasajero == $dni)
                {
                    $duplicado = true;
                }
                $pos ++;
            } while ((!$duplicado) && ($pos < $cantPasajeros));
        }
        return $duplicado;
    }

    // Métodos get

    /**
     * Get de codigoViaje
     * @return string
     */
    public function getCodigoViaje ()
    {
        return $this -> codigoViaje;
    }

    /**
     * get de destinoViaje
     * @return string
     */
    public function getDestinoViaje ()
    {
        return $this -> destinoViaje;
    }

    /**
     * Get de cantMaxPasajeros
     * @return int
     */
    public function getCantMaxPasajeros ()
    {
        return $this -> cantMaxPasajeros;
    }    

    /**
     * get de ArrayPasajeros
     * @return array
     */
    public function getArrayPasajeros ()
    {
        return $this -> arrayPasajeros;
    }

    /**
     * Get de $objResponsableV
     * @return ResponsableV
     */
    public function getObjResponsableV ()
    {
        return $this -> objResponsableV;
    }

    // Métodos set

    /**
     * Set de codigoViaje 
     * @param int $codigoViajeNuevo
     */
    public function setCodigoViaje ($codigoViajeNuevo)
    {
        $this -> codigoViaje = $codigoViajeNuevo;
    }
    
    /**
     * Set de destinoViaje 
     * @param string $destinoViajeNuevo
     */
    public function setDestinoViaje ($destinoViajeNuevo)
    {
        $this -> destinoViaje = $destinoViajeNuevo;
    }

    /**
     * Set de cantMaxPasajeros 
     * @param int $cantMaxPasajerosNuevo
     */
    public function setCantMaxPasajeros ($cantMaxPasajerosNuevo)
    {
        $this -> cantMaxPasajeros = $cantMaxPasajerosNuevo;
    }

    /**
     * Set de arrayPasajeros
     * @param array $arrayPasajerosNuevo
     */
    public function setArrayPasajeros ($arrayPasajerosNuevo)
    {
        $this -> arrayPasajeros = $arrayPasajerosNuevo;
    }
    
    /**
     * Set de objResponsableV
     * @param ResponsableV $ObjResponsableVNuevo
     */
    public function setObjResponsableV ($ObjResponsableVNuevo)
    {
        $this -> objResponsableV = $ObjResponsableVNuevo;
    }

    // Métodos __toString y mostrarPasajeros

    /**
     * Retorna la información de los atributos de las clases en forma de string
     * @return string
     */
    public function __toString ()
    {
        // Variables Internas
        // string $frase
        // ResponsableV $objResponsableV
        $objResponsableV = $this -> getObjResponsableV ();
        $frase = "El destino es: ".$this -> getDestinoViaje().".\nCodigo del viaje: ".$this -> getCodigoViaje().".\nCantidad maxima de pasajeros: ".$this -> getCantMaxPasajeros()
        .".\nCantidad de pasajeros cargados: ".count ($this -> getArrayPasajeros()).".\nDatos de los pasajeros:\n".$this -> mostrarPasajeros ()."\nInformacion del responsable del viaje: \n".$objResponsableV;
        return ($frase);
    }

    /**
     * Recorre el array de pasajeros exhaustivamente y guarda en un string cada una de sus datos para luego retornarlo
     * @return string
     */
    public function mostrarPasajeros () 
    {
        // Variables Internas
        // string $frase
        // array $arrayPasajeros
        // int $pos, $cantPasajeros
        // Pasajero $pasajero
        $frase = "";
        $arrayPasajeros = $this -> getArrayPasajeros ();
        $cantPasajeros = count ($arrayPasajeros);
        for ($pos = 0; $pos < $cantPasajeros; $pos ++)
        {
            $pasajero = $arrayPasajeros [$pos];
            $frase = $frase. "Pasajero N°".($pos+1).": ".$pasajero;
        }
        return ($frase);
    }
}