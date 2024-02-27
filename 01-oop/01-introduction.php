<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01-introduction</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
<nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z"/></svg>    
        </a>
    </nav>
<main>
<h1>01-Introduction</h1>
<?php 
    class Adition {
        public $num1;
        public $num2;

        public function getResult() {
            return ($this->num1 + $this->num2);
        }
    }
?>
    <form action="" method="post">
        Num1: <input type="range" name="num1" value="0" oninput="o1.value=this.value"><output id="o1"></output><br>
        Num2: <input type="range" name="num2" value="0" oninput="o2.value=this.value"><output id="o2"></output><br>
        <input type="submit">
        <div class="result">
            <?php
                if ($_POST) {
                    $sum = new Adition;
                    $sum->num1 = $_POST['num1'];
                    $sum->num2 = $_POST['num2'];
                    echo "<br>La suma de {$sum->num1} y {$sum->num2} es " .$sum->getResult();
                }
            ?>
        </div>
    </form>
</main>
</body>
</html>



