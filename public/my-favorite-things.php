<?php

function pageController() {

    return["favoriteThings" => ["dogs", "pizza", "books", "key lime pie", "winter"]];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Things</title>

    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="/css/my-favorite-things.css">

</head>
<body>

<div>
    <h2>My Favorite Things</h2>
    <div>
        <table class="shadow">
            <tr>
                <th>Some of My Favorite Things, in No Particular Order</th>
            </tr>

            <?php foreach($favoriteThings as $favoriteItem) : ?>
                <tr><td><?= $favoriteItem; ?></td></tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>
</body>
</html>