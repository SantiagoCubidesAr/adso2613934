<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05-Abstract</title>
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
            font-size: 20px;

            h2 {
                margin: 0;
            }

            td {
                padding: 10px;
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
        <h1>05-Abstract</h1>
        <section>
            <?php
            abstract class DataBase
            {
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;
                protected $query;

                public function __construct($dbname, $host = "localhost", $user = "root", $pass = "")
                {
                    $this->host = $host;
                    $this->user = $user;
                    $this->pass = $pass;
                    $this->dbname = $dbname;
                }

                public function connect()
                {
                    try {
                        $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }

                public function query($sql)
                {
                    return $this->conx->query($sql);
                }
            }

            class Pokemon extends DataBase
            {
            }

            $db = new Pokemon('adso2613934');
            $db->connect();

            $query = $db->query("SELECT * FROM pokemons");

            // Verificar si hay resultados
            if ($query->rowCount() > 0) {
                // Iterar sobre los resultados y mostrarlos
                echo "
                <table>
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Health</th>
                    <th>Image</th>
                    </r>
                </thead>";
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td><h2>{$row['name']}</h2></td>";
                    echo "<td><p>{$row['type']}</p></td>";
                    echo "<td><p>{$row['health']}</p></td>";
                    echo "<td><img src='img/{$row['image']}' width='100px' height='100px' alt='{$row['name']}'></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron Pokémon en la base de datos.";
            }
            ?>
        </section>
    </main>
</body>

</html>