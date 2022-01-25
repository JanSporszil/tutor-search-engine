<html>

<head>
    <script type="text/javascript" src="public/assets/js/teacherAvailability.js"></script>
    <script type="text/javascript" src="public/assets/js/deleteAvailability.js"></script>
    <link rel="stylesheet" type="text/css" href="public/styles/classesAvailability.css">
    <script src="https://kit.fontawesome.com/9ec5fd34a1.js" crossorigin="anonymous"></script>
    <title>
        Projekt PAI
    </title>
</head>

<body>
<div class="container">
    <div class="header">
        <p class="logo">SQUANCHU</p>

        <div class="buttons">
            <a href="teacherProfile"><button class="profile" value="teacherProfile">teacherProfile</button></a>
        </div>
    </div>



    <div class="content">

        <div class="addingAvailability">
            <p><?php
            if(isset($messages))
                foreach ($messages as $message)
                    echo $message;
                ?></p>
            <select class="selectDay">
                <option class="option" value="" selected disabled hidden>Wybór Dnia</option>
                <option class="option" value="Poniedziałek">Poniedziałek</option>
                <option class="option" value="Wtorek">Wtorek</option>
                <option class="option" value="Środa">Środa</option>
                <option class="option" value="Czwartek">Czwartek</option>
                <option class="option" value="Piątek">Piątek</option>
                <option class="option" value="Sobota">Sobota</option>
            </select>

            <select class="selectTime">
                <option class="option" value="" selected disabled hidden>Wybór Godziny</option>
                <option class="option" value="07:00-08:00">07:00-08:00</option>
                <option class="option" value="08:00-09:00">08:00-09:00</option>
                <option class="option" value="09:00-10:00">09:00-10:00</option>
                <option class="option" value="10:00-11:00">10:00-11:00</option>
                <option class="option" value="11:00-12:00">11:00-12:00</option>
                <option class="option" value="12:00-13:00">12:00-13:00</option>
                <option class="option" value="13:00-14:00">13:00-14:00</option>
                <option class="option" value="14:00-15:00">14:00-15:00</option>
                <option class="option" value="15:00-16:00">15:00-16:00</option>
                <option class="option" value="16:00-17:00">16:00-17:00</option>
                <option class="option" value="17:00-18:00">17:00-18:00</option>
                <option class="option" value="18:00-19:00">18:00-19:00</option>
                <option class="option" value="19:00-20:00">19:00-20:00</option>
                <option class="option" value="20:00-21:00">20:00-21:00</option>
            </select>

            <button class="addButton" type="submit">Dodaj</button>


        </div>


        <div class="displayAvailability">
            <table class="availTable">
            <?php
            if(isset($availability) && is_array($availability)){

                uksort($availability, function($a, $b) {
                    $day = [
                        "Poniedziałek" => 1,
                        "Wtorek" => 2,
                        "Środa" => 3,
                        "Czwartek" => 4,
                        "Piątek" => 5,
                        "Sobota" => 6
                    ];
                    return $day[$a] > $day[$b];
                });

                $days = array_keys($availability);
                $size = -1;

                //table header
                echo '<tr class="head">';
                foreach ($days as $day) {
                    $size2 = count($availability[$day]);
                    if($size < $size2)
                        $size = $size2;
                    echo '<th>'.$day.'</th>';
                    sort($availability[$day]);
                }
                echo '</tr>';

                for($i = 0; $i<$size;$i++){
                    echo '<tr>';
                    foreach ($availability as $day => $hour){
                        echo '<td>';
                        $hour = array_shift($availability[$day]);
                        echo ($hour)?'<span class="hourText">'.$hour." "." "." "." ".'</span><i id="hour" data-day="'.$day.'" data-hour="'.$hour.'" class="far fa-times-circle"></i>' : '';
                        echo '</td>';
                    }
                    echo '</tr>';
                }

                }
            ?>
            </table>
        </div>


    </div>

</div>
</body>

</html>