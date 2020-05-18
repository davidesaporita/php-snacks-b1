<?php 
    /**
     * 
     * PHP Snack 1:
     * Creiamo un array ‘matches’ contenente altri array i quali rappresentano delle partite di basket di un’ipotetica tappa del calendario.
     * Ogni array della partita avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite.
     * Stampiamo a schermo tutte le partite con questo schema:Olimpia Milano - Cantù | 55-60
     * 
     * PHP Snack 2:
     * Passare come parametri GET name, mail e age e verificare (cercando i metodi che nonconosciamo nella documentazione) che:
     * 1. name sia più lungo di 3 caratteri,
     * 2. che mail contenga un punto e una chiocciola
     * 3. e che age sia un numero.Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”
     * 
     *     * 
     * 
     * 
     */

    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $matches = [
        [
            'home_team' => 'Viola Reggio Calabria',
            'away_team' => 'Maccabi Tel Aviv',
            'home_score' => '112',
            'away_score' => '118'
        ],
        [
            'home_team' => 'Italia',
            'away_team' => 'Germania',
            'home_score' => '2',
            'away_score' => '0'
        ],
        [
            'home_team' => 'Chicago Bulls',
            'away_team' => 'Utah Jazz',
            'home_score' => '87',
            'away_score' => '86'
        ],
        [
            'home_team' => 'Pizzighettone',
            'away_team' => 'Lumezzane',
            'home_score' => '0',
            'away_score' => '0'
        ]
    ];

    $html = "";

    for( $i = 0; $i < count($matches); $i++ ) {
        $html .= "<li>"
                .$matches[$i]['home_team']
                .' - '
                .$matches[$i]['away_team']
                ." | "
                .$matches[$i]['home_score']
                ."-"
                .$matches[$i]['away_score']
                ."</li>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Snack 1 e 2</title>
</head>
<body>
    <main>
        <div id="php-snack-1">
            <h1>Php Snack 1</h1>
            <ul><?php echo $html; ?></ul>
        </div>
        <div id="php-snack-2">
            <h1>Php Snack 2</h1>
            
        </div>
    </main>
</body>
</html>