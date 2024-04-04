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
