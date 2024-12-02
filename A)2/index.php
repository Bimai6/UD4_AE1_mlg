<?php
class Animal {
    protected $entorno;
    protected $comida;
    protected $sonido;
    protected $nombreCientifico;

    public function __construct($entorno, $comida, $sonido, $nombreCientifico) {
        $this->entorno = $entorno;
        $this->comida = $comida;
        $this->sonido = $sonido;
        $this->nombreCientifico = $nombreCientifico;
    }

    public function getSonido() {
        return $this->sonido;
    }

    public function getNombreCientifico() {
        return $this->nombreCientifico;
    }

    public function getEntorno() {
        return $this->entorno;
    }

    public function getComida() {
        return $this->comida;
    }
}

class Canidos extends Animal {}

class Felinos extends Animal {}

class Perro extends Canidos {
    public function __construct() {
        parent::__construct('doméstico', 'carnívora', 'ladrido', 'Canis lupus familiaris');
    }
}

class Lobo extends Canidos {
    public function __construct() {
        parent::__construct('bosque', 'carnívora', 'aullido', 'Canis lupus');
    }
}

class Leon extends Felinos {
    public function __construct() {
        parent::__construct('pradera', 'carnívora', 'rugido', 'Panthera leo');
    }
}

class Gato extends Felinos {
    public function __construct() {
        parent::__construct('doméstico', 'ratones', 'maullido', 'Felis silvestris catus');
    }
}

// Pruebas
$animales = [new Perro(), new Lobo(), new Leon(), new Gato()];

foreach ($animales as $animal) {
    echo "Nombre Científico: " . $animal->getNombreCientifico() . "<br>";
    echo "Sonido: " . $animal->getSonido() . "<br>";
    echo "Entorno: " . $animal->getEntorno() . "<br>";
    echo "Comida: " . $animal->getComida() . "<br><br>";
}
?>