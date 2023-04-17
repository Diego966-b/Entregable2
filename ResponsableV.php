<?php
class ResponsableV 
{
    // Atributos

    private $nroEmpleado, $nroLicencia, $nombre, $apellido;

    // Métodos

    /**
     * Recibe los valores iniciales para los atributos
     * @param int $nroEmpleado, $nroLicencia
     * @param string $nombre, $apellido
     */
    public function __construct ($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this -> nroEmpleado = $nroEmpleado;
        $this -> nroLicencia = $nroLicencia;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
    }

    // Métodos get

    /**
     * Get de nroEmpleado
     * @return int 
     */
    public function getNroEmpleado ()
    {
        return $this -> nroEmpleado;
    }

    /**
     * Get de nroLicencia
     * @return int 
     */
    public function getNroLicencia ()
    {
        return $this -> nroLicencia;
    }

    /**
     * Get de nombre
     * @return string
     */
    public function getNombre ()
    {
        return $this -> nombre;
    }

    /**
     * Get de apellido
     * @return string
     */
    public function getApellido ()
    {
        return $this -> apellido;
    }    

    // Métodos set

    /**
     * Set de nroEmpleado
     * @param int $nroEmpleadoNuevo
     */
    public function setNroEmpleado ($nroEmpleadoNuevo)
    {
        $this -> nroEmpleado = $nroEmpleadoNuevo;
    }

    /**
     * Set de nroLicencia
     * @param int $nroLicenciaNuevo
     */
    public function setNroLicencia ($nroLicenciaNuevo)
    {
        $this -> nroLicencia = $nroLicenciaNuevo;
    }

    /**
     * Set de nombre
     * @param string $nombreNuevo
     */
    public function setNombre ($nombreNuevo)
    {
        $this -> nombre = $nombreNuevo;
    }

    /**
     * Set de apellido
     * @param string $apellidoNuevo
     */
    public function setApellido ($apellidoNuevo)
    {
        $this -> apellido = $apellidoNuevo;    
    }

    // Método __toString

    /**
     * Retorna la información de los atributos de las clases en forma de string
     * @return string
     */
    public function __toString()
    {
        $frase = "Nombre del responsable del viaje: ".$this -> getNombre ().".\nApellido: ".$this -> getApellido ().".\nN° de empleado: ".$this -> getnroEmpleado ()
        .".\nN° de licencia: ".$this -> getNroLicencia ();
        return $frase;
    }
}