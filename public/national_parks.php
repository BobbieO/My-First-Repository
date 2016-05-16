<?php

REQUIRE '../db_connect.php';
REQUIRE '../Input.php';
REQUIRE_ONCE 'functions.php';

function pageController($dbc) {

    $name = Input::has('name') ? Input::get('name') : ' ';
    $location = Input::has('location') ? Input::get('location') : ' ';
    $date_established = Input::has('date_established') ? Input::get('date_established') : ' ';
    $area_in_acres = Input::has('area_in_acres') ? Input::get('area_in_acres') : ' ';
    $description = Input::has('description') ? Input::get('description') : ' ';

    if(!empty($_POST)) {
        $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) 
                        VALUES (:name, :location, :date_established, :area_in_acres, :description)');

            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':location', $location, PDO::PARAM_STR);
            $stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
            $stmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->execute();
    }

    $data = [];

    $data['page'] = Input::has('page') ? Input::get('page') : 1;

    $offset = ($data['page'] - 1) * 4; 

    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT 4 OFFSET :offset');

    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    
    $data['parks'] = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $data;
}
    extract(pageController($dbc));
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>National Parks</title>

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="/css/national_parks.css">

</head>
<body>

<div>
    <p class="pageNo">You are on page <?=$page;?> </p>
    <h2>National Parks of the United States</h2>
    <div>
        <table class="shadow">
            <tr class="bold">
                <th>Name</th>
                <th>Location</th>
                <th>Date Established</th>
                <th>Acreage</th>
                <th>Description</th>
            </tr>

            <?php foreach($parks as $park) : ?>
                <tr><td class="bold"><?= escape($park['name']); ?></td>
                <td><?= escape($park['location']); ?></td>
                <td><?= escape($park['date_established']); ?></td>
                <td><?= escape($park['area_in_acres']); ?></td>
                <td><?= escape($park['description']); ?></td></tr>
            <?php endforeach; ?>
        </table>

        <form method="POST">
            <div class="form shadow">
            <h3 class="bold">Add a Park</h3>
                <p>
                    <span class="margin">
                        <label for="name">Park Name</label>
                        <input id="name" name="name" type="text" placeholder="Enter park name" REQUIRED>
                    </span>
                
                    <span class="margin">
                        <label for="location">Location</label>
                        <input id="location" name="location" type="text" placeholder="Enter location" REQUIRED>
                    </span>
                
                    <label for="date_established">Date Established</label>
                    <input id="date_established" name="date_established" type="text" placeholder="YYYY-MM-DD format" REQUIRED>
                    
                </p>
                <p>
                    <span class="margin">
                        <label for="area_in_acres">Acreage</label>
                        <input id="area_in_acres" name="area_in_acres" type="text" placeholder="no commas" REQUIRED>
                    </span>
                
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Tell us about it!" REQUIRED></textarea>
                </p>
                <p>
                    <input type="submit" value="Send Your Park Info!">
                </p>
            </div>
        </form>
    </div>
</div>

<footer class="footer"> 
    <?php if($page > 1): ?> 
        <a href="/national_parks.php" class="btn btn-default">First</a>
    <?php endif; ?>

    <?php if($page >= 2): ?> 
        <a href="?page=<?= $page - 1 ?>" class="btn btn-default">Previous</a>
    <?php endif; ?>

    <?php if($page < count($parks) ): ?>
        <a href="?page=<?= $page + 1 ?>" class="btn btn-default">Next</a>
    <?php endif; ?>

    <?php if($page < count($parks) ): ?>
        <a href="?page=<?= count($parks) ?>" class="btn btn-default">Last</a>
    <?php endif; ?>
</footer>
</body>
</html>


