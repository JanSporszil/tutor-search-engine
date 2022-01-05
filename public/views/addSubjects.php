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

    </div>
    <div class="content">
        <form class="addSubjects" action="addSubject" method="post">
            <p class="text">Dodaj lub usuń swoje przedmioty</p>

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
                    Zatwierdź
                </button>

            </div>
        </form>
    </div>


</div>
</body>

</html>