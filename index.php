<?php
$lineBreak = "<br />";
# ------------------------------ Exercice 1: timezone et afficher la date actuelle
### Réponse - 1
$dateDuJour = date('l, j F Y');
echo "La date du jour est : $dateDuJour";
### Réponse - 2 - by Chaimaa Daloiane
$dateDuJour = date("d/m/Y");
$jourSemaine = date("l", strtotime($dateDuJour));
$mois = date("F", strtotime($dateDuJour));
$annee = date("Y", strtotime($dateDuJour));
echo $lineBreak;
$resultat = $jourSemaine . " " . $mois . " " . $annee;
echo $resultat;

# ------------------------------ Exercice 2: timezone et afficher la date actuelle
### Réponse - 1
// définir le timestamp
date_default_timezone_set('Africa/Casablanca');

// Date actuelle
$currentDate = date('d/m/Y H:i:s');

echo "Date et heure actuelles au Maroc : $currentDate";

echo $lineBreak;

### Réponse - 2 - by Ayman elhilali
/*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date fga3e l9nate</title>
</head>
<body>
    
<form action="" method="post">
    <select name="blassa">
        <?php
        $listaDyalDakchi = timezone_identifiers_list();
        foreach($listaDyalDakchi as $blassa){
            echo "<option value=\"$blassa\">$blassa</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>  

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["blassa"])) {
        $blassa2 = $_POST["blassa"];
        date_default_timezone_set($blassa2);
        $time = date("Y-m-d H:i:s");
        echo $blassa2.' : '.$time;
    }
}
?>
</body>
</html>
*/

# ------------------------------ Exercice 3: timezone et afficher la date actuelle
## méthode 1
function calculerAge($dateNaissance)
{
    $dateNaissance = new DateTime($dateNaissance);
    $dateActuelle = new DateTime();
    $difference = $dateActuelle->diff($dateNaissance);
    $ageEnAnnees = $difference->y;
    return $ageEnAnnees;
}
echo calculerAge("1990-05-15");

## méthode 2
function calculerAge2($dateNaissance)
{
    // c'ets comme en devise le nombre des seconds dès la naissance jusqu'au moment sur lee nombre de second par une annès
    $timestampNaissance = strtotime($dateNaissance);
    $dateActuelle = time();
    $difference = $dateActuelle - $timestampNaissance;
    return floor($difference / (60 * 60 * 24 * 365));
    /*
    Explication
    60 * 60 * 24 * 365 : Cette partie représente le nombre de secondes dans une année. Décomposons-le :
        60 secondes dans une minute
        60 minutes dans une heure
        24 heures dans une journée
        365 jours par an
    */
}

echo calculerAge2("1990-05-15");



# ------------------------------ Exercice 4: is holiday
function joursRestantsDansLeMois()
{
    $jourActuel = date('j');

    $nombreDeJoursDansLeMois = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));

    return $nombreDeJoursDansLeMois - $jourActuel;
}

echo joursRestantsDansLeMois();

# ------------------------------ Exercice 5: is holiday
## méthode 1
function isHoliday($date)
{
    $joursFeries = [
        '01-01', // Jour de l'An
        '05-01', // Fête du Travail
        '07-14', // Fête nationale (14 juillet)
        '04-04', // séance à distance
    ];

    $moisJour = date('m-d', strtotime($date));
    return in_array($moisJour, $joursFeries);
}
$dateAVerifier = '2024-07-14';
$dateAVerifier = '04/04/2024';

if (isHoliday($dateAVerifier)) {
    echo "$dateAVerifier est un jour férié.";
} else {
    echo "$dateAVerifier n'est pas un jour.";
}

## méthode 2 - by Mohcine Attif

/*
<?php 
function checkFeriee($date){
    return match ($date) {
        '01-01' => 'Ras L3am',
        '07-30' => 'Eid al3arch',
        '08-14' => 'Oued Eddahab',
        '08-20' => 'Revolution Day',
        '11-06' => 'Anniversary of the Green March',
        '11-18' => 'Independence Day',
        '05-01' => 'fête de travail',
        default => 'Date non feriee'
    };
}

if(isset($_POST['submit'])){
    if(isset($_POST['date'])){
        $date = $_POST['date'];
        $datetime = new DateTime($date); //convertina la date l objet bach nkhdmo lformat
        $newDate = $datetime->format('m-d'); // format ldate lformat de mois/jour
        echo checkFeriee($newDate); //function return match dyal kola jour feriee 3la 7sab date
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex5</title>
</head>
<body>
    <form method="post" action="">
        <input type="date" name="date" id="">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

*/

# ------------------------------ Exercice 6: jours ecoulés
function numberOfdaysOfTheCurrentYear()
{
    $anneeActuelle = date('Y');
    $nombreTotalDeJours = 0;

    for ($mois = 1; $mois <= 12; $mois++) {
        $nombreDeJoursDansLeMois = cal_days_in_month(CAL_GREGORIAN, $mois, $anneeActuelle);
        $nombreTotalDeJours += $nombreDeJoursDansLeMois;
    }

    return $nombreTotalDeJours;
}

echo "Le nbr total de jours est : " . numberOfdaysOfTheCurrentYear();

# ------------------------------ Exercice 7: jours ecoulés
## méthode 1
$jourDeLAnneeActuel = date('z') + 1;
echo "Nombre de jours écoulés depuis le début de l'année : $jourDeLAnneeActuel";

## méthode 2
function numberOfDaysElapsed()
{
    $dateActuelle = date('Y-m-d');
    $premierJourAnnee = date('Y-01-01');
    $difference = strtotime($dateActuelle) - strtotime($premierJourAnnee);
    $joursEcoules = floor($difference / (60 * 60 * 24));

    return $joursEcoules + 1; // le +1 est pour inclure le jours encours (aujourd'hui)
}

echo "Le nombre de jours écoulés depuis le début de l'année est : " . numberOfDaysElapsed() . " jours.";
