<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/addSubjectStyle.css">
    <script type="text/javascript" src="public/assets/js/deleteSubject.js"></script>
    <title>
        Projekt PAI
    </title>
</head>

<body>
<div class="container">

    <?php include 'headerwithprofile.php'; ?>

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

                <select name="subject" class="selectSubj" id="subToDelete">
                    <option class="delete" value="" selected disabled hidden>Wybierz przedmiot</option>
                    <?php
                    if(isset($subjects))
                        foreach($subjects as $sub){
                            echo '<option class="delete" value='.$sub.'>'.$sub.'</option>';
                        }
                    ?>
                </select>
                <div class="buttons">

                    <button class="deleteSubjectButton" type="button">
                        Usuń
                    </button>

                </div>
            </form>
        </div>

    </div>


</div>
</body>

</html>