<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catch A Butterfly</title>

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Vidaloka' rel='stylesheet' type='text/css'>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <!-- menu arrow icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="/css/index.css">

</head>
<body>
    <header>
        <?php include 'navbar.php' ?>
    </header>

    <main>
        <div class="center container">
            <h1>Catch a Butterfly</h1>
            <p>
                A non-traditional whack-a-mole game using Bootstrap and CSS for styling, and JavaScript and jQuery for function.
            </p>

            <p>
                JavaScript and jQuery allow the target butterflies to appear and disappear each second during a 30 second timer. When clicked, the user's score increases by one point. Score and timer are both displayed on the screen via jQuery. Local storage is used to recall and retain previous score, in order to compare to the current score. If the current score is higher, it becomes the new high score and displaces the old high score.
            </p>

            <p>
                CSS3 and Bootstrap are used for styling. The background was created using layering of  separate items: grass/field image, tree image, and flowers image. A custom cursor of a butterfly net appears when the cursor is moused over the target area of the screen, to increase game experience. The game is mobile compatible in landscape view.
            </p>
        </div>
        <div>
            <div class="container row">
                <div class="col s6 instrImg">
                <h3 class="center">Game Instructions</h2>
                    <ol>
                        <li>Click "Start" to begin.</li>
                        <li>Butterflies will appear and timer will start its countdown.</li>
                        <li>Click the butterfly before it disappears.</li>
                        <li>Each butterfly captured is worth one point.</li>
                        <li>When the timer runs out, the game is over.</li>
                        <li>Your personal best is stored and displayed as High Score. Try to beat it!</li>
                    </ol>
                </div>
                <div class="col s6 instrImg">
                    <h3 class="center">Click to Play</h3>
                    <div class="center">
                        <a href="http://bobbieo.github.io/catchabutterfly.html" target="_blank"><img src="/img/screenShotCaB.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'footer.php' ?>
    </footer>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/index.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

</body>
</html>