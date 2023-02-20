
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Burger site</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../style.css">
    </head>

<body>
    
    <h1 class="text-logo"> <span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1><strong> Liste des items </strong> 
            <a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-cutlery"-plus></span> Ajouter </a> </h1>
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Actions</th> 
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require 'database.php';
                    $db = Database::connect();
                    $statement = $db-> query('SELECT items.id, items.name, items.description, items.price, categories.name AS category
                    FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');

                    while($item = $statement ->fetch())
                    {
                        echo '<tr>';
                        echo '<td>' . $item['name'] . '</td>';
                        echo '<td>' . $item['description'] . '</td>';
                        echo '<td>' . number_format((float)$item['price'],2,'.', ''). '</td>';
                        echo '<td>' . $item['category'] . '</td>';
                        echo '<td width=300>'; 
                        echo '<a class="btn btn-default" href="view.php?id=' .  $item['id'] . '"> <span class="glyphicon glyphicon-eye-open"></span> Voir </a>';
                        echo ' ';
                        echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"> <span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?id=' .  $item['id'] . '"> <span class="glyphicon glyphicon-remove"></span> Supprimer </a>';
                        echo ' ';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>



                <!--    en haut on a reppris ca et on la rendu dynamique 
                    
                <tr> 
                        <td> Item 1</td>
                        <td> Description 1</td>
                        <td> Prix 1</td>
                        <td> Catégorie 1</td>
                        <td width=300> 
                            <a class="btn btn-default" href="view.php?id=1"> <span class="glyphicon glyphicon-eye-open"></span> Voir </a>
                            <a class="btn btn-primary" href="update.php?id=1"> <span class="glyphicon glyphicon-pencil"></span> Modifier </a>
                            <a class="btn btn-danger" href="delete.php?id=1"> <span class="glyphicon glyphicon-remove"></span> Supprimer </a>
                        </td>
                    </tr>
                    <tr> 
                        <td> Item 2</td>
                        <td> Description 2</td>
                        <td> Prix 2</td>
                        <td> Catégorie 2</td>
                        <td width=300> 
                            <a class="btn btn-default" href="view.php?id=2"> <span class="glyphicon glyphicon-eye-open"></span> Voir </a>
                            <a class="btn btn-primary" href="update.php?id=2"> <span class="glyphicon glyphicon-pencil"></span> Modifier </a>
                            <a class="btn btn-danger" href="delete.php?id=2"> <span class="glyphicon glyphicon-remove"></span> Voir </a>
                        </td>
                    </tr>-->
