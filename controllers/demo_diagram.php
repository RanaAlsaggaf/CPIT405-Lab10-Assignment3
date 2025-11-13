<?php
/* Rana Alsaggaf - 2209314 */
class Person {
    private $name;  

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        echo $this->name . " says: Hello!<br>";
    }

    public function getName() {
        return $this->name;   
    }
}



class Professor extends Person {
    private $salary;  

    public function __construct($name, $salary) {
        parent::__construct($name);  
        $this->salary = $salary;
    }

    public function Teach() {
        echo $this->getName() . " is teaching...<br>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assessment 2: UML Demo</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>

<body>
<div class="container">
    <div class="card">
        <h2>Assessment 2 – Person / Professor UML Demo</h2>
        <pre>
<?php
$rana = new Professor("Rana", 65000);

$rana->speak();     
$rana->Teach();      

echo "Name: " . $rana->getName() . "<br>";
?>
        </pre>
    </div>
</div>
</body>
</html>