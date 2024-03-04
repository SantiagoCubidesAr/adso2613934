<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03-Visibility</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }

            button {
                    background-color: #0004ff;
                    border: 2px solid #fff6;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 300px;
                    padding: 1rem;
                }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z" />
            </svg>
        </a>
    </nav>
    <main>
        <h1>04-Inheritance</h1>
        <section>
            <h2>Evolve your Pokemon</h2>
            <form action="" method="post">
                <button name="atacar">Atacar</button>
                <button name="defender">Defender</button>
                <button name="evolucionar">Evolucionar</button>
            </form>
            <?php
                class Pokemon {
                    protected $name;
                    protected $type;
                    protected $healt;
                    protected $img;
                    //protected $image;

                    public function __construct($name, $type, $healt, $img) {
                        $this->name = $name;
                        $this->type = $type;
                        $this->healt = $healt;
                        $this->img = $img;
                    }

                    public function attack() {
                        $mes = $this->name." ataca".$this->img;
                        return $mes;
                    }

                    public function defense() {
                        $mes = $this->name." se defiende".$this->img;
                        return $mes;
                    }

                    public function show() {
                        return "Evoluciona a ".$this->name." ".$this->type." ".$this->healt.$this->img."<br/>";
                    }
                }

                class Evolve extends Pokemon {
                    public function levelUp($name, $type, $healt, $img) {
                        $this->name = $name;
                        $this->type = $type;
                        $this->healt = $healt;
                        $this->img = $img;
                    }
                }

                $pk = new Pokemon('Abra', 'Psíquico', 100, '<img height="200px" width="200px" src="./img/Abra.png" alt="">');
                if ($_POST) {
                    if (isset($_POST['atacar'])) {
                        echo $pk->attack();
                    } elseif (isset($_POST['defender'])) {
                        echo $pk->defense();
                    } else {
                        $pk = new Evolve('Kadabra', 'Psíquico', 200, '<img height="200px" width="200px" src="./img/Kadabra.png" alt="">');
                        echo $pk->show();
                    }
                }
            ?>
        </section>
    </main>
</body>

</html>