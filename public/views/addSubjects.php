<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/addSubjectStyle.css">
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
        <div class="frame">
            <form class="subjects" action="addSubjects" method="post">
                <p class="text"><?php
                    if(isset($messages))
                        foreach ($messages as $message)
                            echo $message;
                    ?></p>

                <select name="subject" class="selectSubj">
                    <option value="" selected disabled hidden>Wybierz przedmiot</option>
                    <option value="Angielski">Angielski</option>
                    <option value="Polski">Polski</option>
                    <option value="Matematyka">Matematyka</option>
                    <option value="Hiszpanski">Hiszpański</option>
                    <option value="Chemia">Chemia</option>
                    <option value="Biologia">Biologia</option>
                </select>

                <div class="buttons">

                    <button class="addSubjectButton" type="submit">
                        Dodaj
                    </button>

                </div>
            </form>
        </div>

        <div class="frame">
            <form class="subjects" action="deleteSubjects" method="post">
                <p class="text">Twoje przedmioty. Możesz je tutaj usunąć</p>

                <select name="subject" class="selectSubj">
                    <option value="" selected disabled hidden>Wybierz przedmiot</option>
                    <?php
                    if(isset($subjects))
                        foreach($subjects as $sub){
                            echo '<option value='.$sub.'>'.$sub.'</option>';
                        }
                    ?>
                </select>
                <div class="buttons">

                    <button class="deleteSubjectButton" type="submit">
                        Usuń
                    </button>

                </div>
            </form>
        </div>

    </div>


</div>
</body>

</html>