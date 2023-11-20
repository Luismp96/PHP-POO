<?php

    interface DarDatos{
        public function dameDatos();
    }
    abstract class Producto{

        //PROPIEDADES
        private $precio;
        private $nombre;
        private $descripcion;

        //CONSTRUCTOR
        public function __construct($nombre, $descripcion,$precio){
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
        }

        //METODOS
        public function dimePrecio(){
            return $this->precio;
        }

        public function dimeNombre(){
            return $this->nombre;
        }

        public function dimeDescripcion(){
            return $this->descripcion;
        }

        public function ponNombre($nombre){
            $this->nombre = $nombre;
        }
        public function ponPrecio($precio){
            $this->precio = $precio;
        }
        public function ponDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function dameDatos(){
            return [$this->nombre,$this->descripcion,$this->precio];
        }
       
    }

    class ProductoFisico extends Producto implements DarDatos{
        private $anchura;
        private $altura;
        private $profundidad;
        private $peso;

        //METODO CONSTRUCTOR
        public function __construct($nombre, $descripcion,$precio,$anchura,$altura,$profundidad,$peso){
            $this->ponNombre($nombre);
            $this->ponDescripcion($descripcion);
            $this->ponPrecio($precio);
            $this->anchura = $anchura;
            $this->altura = $altura;
            $this->profundidad = $profundidad;
            $this->peso = $peso;

        }

        public function dameDatos(){
            return [$this->dimeNombre(),$this->dimeDescripcion(),$this->dimePrecio(),$this->anchura,$this->altura,$this->profundidad,$this->peso];
        }
    }

    class ProductoVirtual extends Producto implements DarDatos{
        private $url;
        private $pesoEnKB;

        //METODO CONSTRUCTOR
        public function __construct($nombre, $descripcion,$precio,$url,$pesoEnKB){
            $this->ponNombre($nombre);
            $this->ponDescripcion($descripcion);
            $this->ponPrecio($precio);
            $this->url = $url;
            $this->pesoEnKB = $pesoEnKB;

        }

        public function dameDatos(){
            return [$this->dimeNombre(),$this->dimeDescripcion(),$this->dimePrecio(),$this->url,$this->pesoEnKB];
        }
    }

    $producto1 = new ProductoFisico("Boligrafo","Boli de color Azul",50,128,24,325,12);
    $producto2 = new ProductoVirtual("Manual Usuario","Manual PDF",100,"https://www.google.es",500);



    var_dump($producto1->dameDatos());
    echo "<br>";
    var_dump($producto2->dameDatos());


?>