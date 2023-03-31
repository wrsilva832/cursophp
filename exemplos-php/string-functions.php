//Resumo das principais functions de string
//Conte o número de palavras na string "Hello world!":
<?php
echo str_word_count("Hello world!"); // outputs 2
?>

//A função PHP strrev()inverte uma string.
<?php
echo strrev("Hello world!"); // outputs !dlrow olleH
?>

//Procure o texto "world" na string "Hello world!":
<?php
echo strpos("Hello world!", "world"); // outputs 6
?>

//A str_replace()função PHP substitui alguns caracteres por alguns outros caracteres em uma string.
<?php
echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
?>
