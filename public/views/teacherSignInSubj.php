<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/teacherSignInSubjStyles.css">
    <title>
        Projekt PAI
    </title>
</head>

<body>
<div class="container">
    <div class="header">
        <p class="logo">SQUANCHU</p>
    </div>


    <div class="form">
        <form class="addDescription" action="addInfoCont" method="post">
            <p class="text">Pracuj z nami</p>

            <select name="City" class="selectSubj">
                <option value="" selected disabled hidden>Wybierz miasto</option>
                <option value="Krakow">Krakow</option>
                <option value="Warszawa">Warszawa</option>
                <option value="Poznan">Poznan</option>
                <option value="Łódź">Łódź</option>
                <option value="Białystok">Białystok</option>
                <option value="Tarnów">Tarnów</option>
            </select>

            <input name="Description" type="text" class="regDescription" placeholder="Twój opis">

            <div class="buttons">

                <button class="cancelButt">
                    Anuluj
                </button>

                <button class="registerButt" type="submit">
                    Zatwierdź
                </button>

            </div>
        </form>
    </div>

</div>
</body>

</html>