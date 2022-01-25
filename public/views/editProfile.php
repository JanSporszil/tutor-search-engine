<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/editProfileStyle.css">
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
            <p class="text">Edytuj swoj profil</p>

            <select name="City" class="selectCity">
                <option value="" selected disabled hidden>Wybierz miasto</option>
                <option value="Krakow">Krakow</option>
                <option value="Warszawa">Warszawa</option>
                <option value="Poznan">Poznan</option>
                <option value="Łódź">Łódź</option>
                <option value="Białystok">Białystok</option>
                <option value="Tarnów">Tarnów</option>
            </select>

            <textarea name="Description" type="text" class="regDescription" placeholder="Twój opis"></textarea>

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