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
     */

    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    // PHP Snack 1 
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

    $html_snack1 = "";

    for( $i = 0; $i < count($matches); $i++ ) {
        $html_snack1 .= "<li>"
                .$matches[$i]['home_team']
                .' - '
                .$matches[$i]['away_team']
                ." | "
                .$matches[$i]['home_score']
                ."-"
                .$matches[$i]['away_score']
                ."</li>";
    }
    // PHP Snack 1 - Ends 

    /***********************************************/
    /***********************************************/

    // PHP Snack 2
    $data = $_GET;
    $html_snack2 = "";
    $empty_error = "";
    $data_error = "";

    if (!empty($data)) {
        !empty($data['name'])  ?  $name = $data['name'] : $empty_error .= "name ";
        !empty($data['mail'])  ?  $mail = $data['mail'] : $empty_error .= "mail ";
        !empty($data['age'])   ?  $age  = $data['age']  : $empty_error .= "age ";
        if (strlen($empty_error) == 0) {
            strlen($name) < 3  ? $data_error .= "Name field wrong<br>" : null;
            !is_numeric($age)  ? $data_error .= "Age field wrong<br>"  : null;
            !check_mail($mail) ? $data_error .= "Mail field wrong<br>" : null;

            $output_1 = "All fields inserted";

            if (strlen($data_error) == 0)  {
                $output_2 = "Fields correctly inserted";
            } else {
                $output_2 = "Accesso negato:<br>$data_error";
            }
        } else {
            $output_1 = "Field $empty_error empty";
        }
    } else {
        $output_1 =  "Non ci sono dati nella query";
    }

    function check_mail($mail) {
        if(strpos($mail, '@') == true && strpos($mail, '.') == true && strpos($mail, '@') < strpos($mail, '.')) {
            $mail_parts = explode("@", $mail);
            if(strlen($mail_parts[0]) < 3 || strlen($mail_parts[1]) < 5) {
                return false;
            } else {
                $domain_ext = explode(".", $mail_parts[1]);
                $extension_list = ["it","com","net","co.uk","fr","eu","biz","us","de"];
                count($domain_ext) >= 3 ? $extension = $domain_ext[1] . ".$domain_ext[2]" : $extension = $domain_ext[1];
                return in_array($extension, $extension_list);
            }
        } else {
            return false;
        }
    }
    // PHP Snack 2 - Ends
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
            <ul><?php echo $html_snack1; ?></ul>
        </div>
        <div id="php-snack-2">
            <h1>Php Snack 2</h1>
            <ul>
                <li><?php echo $output_1; ?></li>
                <li><?php echo $output_2; ?></li>
            </ul>
        </div>
    </main>
</body>
</html>