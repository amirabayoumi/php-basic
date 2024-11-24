<?php

require('./wikis.php');

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
                <h2>WikiWisKwis</h2>

            </header>
            <table>
                <thead>
                    <tr>

                        <th>Date</th>
                        <th>Title</th>
                        <th>Tip</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($wikis as $key => $wiki): ?>
                            <td><b><?php print  $wiki['episode']; ?></b></td>
                            <td> <?php print  $wiki['title']; ?></td>
                            <td> <?php print  $wiki['tip']; ?></td>
                            <td><a href="detail.php?id=<?php echo $key; ?>">play now</a></td>

                    </tr> <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>