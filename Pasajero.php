<?php
class Pasajero 
{
    // Atributos

    private $nombre, $apellido, $dni, $telefono;

    // Métodos

    /**
     * Recibe los valores iniciales para los atributos
     * @param string $nombre, $apellido
     * @param int $dni, $telefono
     */
    public function __construct ($nombre, $apellido, $dni, $telefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> dni = $dni;
        $this -> telefono = $telefono;
    }

    // Métodos get

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

    /**
     * Get de dni
     * @return int
     */
    public function getDni ()
    {
        return $this -> dni;
    }

    /**
     * Get de telefono
     * @return int
     */
    public function getTelefono ()
    {
        return $this -> telefono;
    }

    // Métodos set

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

    /**
     * Set de dni
     * @param int $dniNuevo
     */
    public function setDni ($dniNuevo)
    {
        $this -> dni = $dniNuevo;
    }

    /**
     * Set de telefono
     * @param int $telefonoNuevo
     */
    public function setTelefono ($telefonoNuevo)
    {
        $this -> telefono = $telefonoNuevo;
    }

    // Método __toString

    /**
     * Retorna la información de los atributos de las clases en forma de string
     * @return string
     */
    public function __toString ()
    {
        $frase = "Nombre: ".$this -> getNombre ().". Apellido: ".$this ->  getApellido ().". DNI: ".$this ->  getDni ().". Teléfono: ".$this ->  getTelefono ()."\n";
        return $frase;
    }
}