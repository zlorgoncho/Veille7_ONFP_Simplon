<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = "localhost"; $dbname = "ring_db"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                /*Un utilisateur ne pourra jamais changer la structure d'une table,
                 *pas la peine donc d'utiliser de requête préparée*/
                $sql = "
                  ALTER TABLE Users
                  ADD DateInscription TIMESTAMP
                ";
                
                $dbco->exec($sql);
                echo 'Colonne ajoutée';
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>