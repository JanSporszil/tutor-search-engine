<html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/styles/bookClasses.css">
    <script type="text/javascript" src="/public/assets/js/bookClasses.js"></script>
    <script type="text/javascript" src="/public/assets/js/displayHours.js"></script>
    <title>
        Projekt PAI
    </title>
</head>

<body>
<div class="container">
    <div class="header">
        <p class="logo">SQUANCHU</p>


    </div>
    <div class="content">

        <div class="main-content">


            <div class="left">
            <div class="paczkaLewa">
                <div class="picture">

                </div>

                <div class="name-surname">
                    <p><?= $teacherInfo['Name']." ".$teacherInfo['Surname']; ?></p>
                </div>

                <div class="city">
                    <p><?= $teacherInfo['City'] ?></p>
                </div>

                <div class="desc">
                    <p><?= $teacherInfo['Description'] ?></p>
                </div>
            </div>
            </div>


            <div class="right">

                <div class="form">

                    <select class="sub" id="subToDelete">
                        <option class="subs" value="" selected disabled hidden>Wybierz przedmiot</option>
                        <?php
                        $subjects = unserialize($teacherInfo['subjects']);
                            foreach($subjects as $sub){
                                echo '<option class="subs" value='.$sub.'>'.$sub.'</option>';
                            }
                        ?>
                    </select>

                    <select class="day">
                        <option class="days" value="" selected disabled hidden>Wybierz dzień</option>
                        <?php
                        $availability = unserialize($teacherInfo['availability']);
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

                            foreach ($days as $day) {
                                $size2 = count($availability[$day]);
                                if($size < $size2)
                                    $size = $size2;
                                echo '<option class="days" value='.$day.'>'.$day.'</option>';
                            }
                        ?>
                    </select>

                    <select class="hour" hidden>
                        <option class="hours" value="" selected disabled hidden>Wybierz godzinę</option>

                    </select>

                    <a class="abutton" href="/getClasses"><button class="signButton" teacherid="<?= $teacherid; ?>" type="button">Zapisz się</button></a>

                </div>


            </div>


        </div>


    </div>


</div>
</body>

</html>