<?php
    require 'database.php';
    
    if(!empty($_GET['id']))
    {
        $id=checkInput($_GET['id']);
    }

    if(!empty($_POST))
    {
        $id =  checkInput($_POST['id']);  
        $db = Database::connect();    
        $statement = $db->prepare("DELETE FROM items WHERE id = ?") ;
        $statement ->execute (array($id));
        Database::disconnect();  
        header("Location: index.php");
            
    }

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> FASTFOOD BURGERRYAN TANKENG </title>
    <meta charset="utf-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>FASTFOOD BURGER<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
                <h1><strong>Supprimer un item </strong></h1>
                <br>
                <form class="form" method="post" action="delete.php" enctype="multipart/form-data"> 
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="alert alert-warning">Etes vous sur de vouloir supprimer ? </p>
                 <br> 
                <div class="form-actions">
                     <button type="submit" class="btn btn-warning"> Oui </button>
                    <a class="btn btn-default" href="index.php"> Non </a>
                </div>
                </form>
        </div>
    </div>
</body>
</html>