<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/searchClasses.css">
    <script type="text/javascript" src="public/assets/js/getTeacherID.js"></script>
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
        <div class="area">
            <div class="searching">

                <form class="selecting" action="getClasses" method="post">

                    <div class="subjSearch">
                        <input name="subject" type="text" class="subjSearching" placeholder="Przedmiot">
                    </div>

                    <div class="citySearch">
                        <input name="city" type="text" class="citySearching" placeholder="Miasto">
                    </div>
                    <div class="submit">
                        <button class="submitButton" type="submit">Szukaj</button>
                    </div>

                </form>

            </div>



            <div class="teachers">
                <?php
                if(isset($classesAvailability)) {
                    foreach ($classesAvailability as $class) {

                        ?>
                <div class="teacher">
                    <div class="leftSide">
                        <div class="picture">

                        </div>
                    </div>
                    <div class="teacherInfo">
                        <div class="upper">
                            <div class="name&surname">
                                <p class="name"> <?= $class['Name']." ".$class['Surname'];
                                ?></p>
                            </div>

                            <div class="subjects">
                                <p class="subject"><?php
                                        foreach (unserialize($class['subjects']) as $sub) {
                                        echo $sub." ";
                                    }
                                    ?></p>
                            </div>
                        </div>

                        <div class="descRam">

                            <div class="description">
                                <p class="desc"><?= $class['Description'];
                                ?></p>
                            </div>

                            <div class="enroll">
                                <a href="bookClasses/<?= $class['id']; ?>"><button type="button" class="enrollButton">Wybierz</button></a>
                            </div>

                        </div>
                    </div>

                </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>


    </div>


</div>
</body>

</html>