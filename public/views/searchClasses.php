<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/searchClasses.css">
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
                <div class="subjSearch">
                    <input type="text" class="subjSearching" value="Przedmiot">
                </div>

                <div class="citySearch">
                    <input type="text" class="citySearching" value="Miasto">
                </div>
            </div>



            <div class="teachers">
                <?php
                if(isset($classesAvailability)) {
                    foreach ($classesAvailability as $class) {

                        ?>
                <div class="teacher" id="<?= $class['id'] ?>">
                    <div class="leftSide">
                        <div class="picture">

                        </div>
                    </div>
                    <div class="teacherInfo">
                        <div class="upper">
                            <div class="name&surname">
                                <p class="name"><?= $class['Name']." ".$class['Surname'];

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