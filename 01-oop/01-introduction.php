<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01-introduction</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
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



