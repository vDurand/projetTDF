<?php
/**
 * Created by Valentin Durand
 * IUT Caen - DUT Informatique
 * Date: 30/09/14
 * Time: 15:35
 */
$title = "Ajout Année";
include ('header.php');

$annee = postGetter("annee");
$j_repos = postGetter("repos");

if($j_repos == null)
    $j_repos = 0;

if($annee != null){

    $cur = addAnnee($conn, $annee, $j_repos);
    if($cur){
        ?>
        <h1>Année ajoute avec succes</h1>
        <table>
            <tr>
                <th>Année</th>
                <td><?php echo $annee; ?></td>
            </tr>
            <tr>
                <th>Jour de Repos</th>
                <td><?php echo $j_repos; ?></td>
            </tr>
        </table>
    <?php
    }
    else{
        echo "<h1>Erreur</h1>";
    }
}
else{
    ?>

    <h1>Ajouter une année</h1>
    <form method="post" action="" name="ajoutAnnee" class="ink-form">
        <div class="control-group required">
            <label for="annee">Année</label>
            <div class="control">
                <input autofocus required type="number" id="annee" name="annee" pattern="^[0-1]{4}" min="<?php echo date("Y"); ?>" value="<?php echo date("Y"); ?>">
            </div>
        </div>
        <div class="control-group">
            <label for="jrepos">Jours de Repos</label>
            <div class="control">
                <input required id="jrepos" type="number" name="repos" max="365" min="0" value="0">
            </div>
        </div>
        <input class="ink-button green" name="submit" type="submit" value="Ajouter">
        <input class="ink-button" name="reset" type="reset" value="Vider les champs">
    </form>
<?php
}
include ('footer.php');
?>