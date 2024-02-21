<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02-Fundamentals</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            figure {
                font-size: 6rem;
            }
        }
    </style>
</head>

<body>
    <main>
        <h1>02-Fundamentals</h1>
        <section>
            <figure>
            <?php
                class Runner {
                    //Attributes
                    private $name;
                    private $age;
                    private $number;

                    //Methods
                    public function _construct($name, $age, $number) {
                        $this->name = $name;
                        $this->age = $age;
                        $this->number = $number;
                    }

                    public function run() {
                        return "🏃‍♂️";
                    }

                    public function stop() {
                        return "🚶‍♂️";
                    }

                    public function jump() {
                        return "🤸‍♂️";
                    }
                }

                $runner = new Runner('Usain Bolt', 35, 105);
                echo $runner->run();
                echo $runner->jump();
                echo $runner->stop();
                echo $runner->run();
            ?>
            </figure>
        </section>
    </main>
</body>

</html>