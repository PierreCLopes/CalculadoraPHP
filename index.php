<?php
session_start();
require('autoload.php');

$head = new Head("Calculadora - Pierre");
$head->addProp(new Meta("viewport", "width=device-width, initial-scale=1"));
$head->addProp(new Link("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css", "stylesheet", "sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl", "anonymous"));
$head->addProp(new Link("style/style.css", "stylesheet",null, null));

$body = new Body();
$body->addProp(new FormCalculadora());

echo (new Html("pt-br", $head, $body));
?>
</body>
</html>