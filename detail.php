<?php

require('./wikis.php');

$index = @$_GET['id'];
if (!isset($wikis[$index])) {
    header('Location: index.php');
    exit;
}

$wiki = $wikis[$index];
require($wiki['data']);

$allowed_words = ['in', 'het', 'de', 'door', 'is', 'een', 'van'];


$word = @$_GET['guess'];
$guess = explode(',', $word);
// for ($i = 0; $i < count($guess); $i++) {
//     array_push($allowed_words, $guess[$i]);
// }

$allowed_words = array_merge($guess, $allowed_words);
$text_parts = explode(' ', $text);

function custom_in_array($x, $y)
{
    return in_array(strtolower($x), array_map('strtolower', $y));
}

for ($i = 0; $i < count($text_parts); $i++) {

    if (!custom_in_array($text_parts[$i], $allowed_words)) { // or another condition to check if it is not in guess
        $len = strlen($text_parts[$i]);
        $text_parts[$i] = str_repeat("█", $len);
    }
};

$text = implode(' ', $text_parts);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wikis</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <section id="features">
            <header>
                <!-- <input type="text" id="input1" name="input1" size="20" placeholder="Guess a word"> -->

                <h2>WikiWisKwis <?php echo $wiki['episode']; ?></h2>

                <form method="get" action="detail.php?id=3">
                    <!-- toDo: id  -->
                    <label for="guess">Guess a Word:</label>
                    <input type="text" id="guess" name="guess" required>
                    <input type="hidden" id="id" name="id" value="<?= $index ?>">
                    <input type="submit" name="submit" id="submit" value="Search">
                    <ul>
                        <?php foreach ($guess as $w): ?>
                            <strong><?php echo $w ?> </strong><br>
                        <?php endforeach ?>
                    </ul>
                </form>


            </header>
            <?php print $text; ?>
        </section>
    </main>

</body>

</html>