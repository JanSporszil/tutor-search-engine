<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/teacherSignInMainStyle.css">
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
        <p class="text">Pracuj z nami</p>
        <form class="adding" action="registerTeacher" method="post">
                <?php
                if(isset($messages))
                    foreach ($messages as $message)
                        echo $message;
                ?>
            <input name="Name" type="text" class="regInput" placeholder="Imię">
            <input name="Surname" type="text" class="regInput" placeholder="Nazwisko">
            <input name="Email" type="text" class="regInput" placeholder="Adres email">
            <input name="Username" type="text" class="regInput" placeholder="Nazwa Użytkownika">
            <input name="Password" type="text" class="regInput" placeholder="Hasło">

                <div class="buttons">
                    <button class="buttNext">
                       Zarejestruj
                    </button>
                </div>
        </form>
    </div>
    </div>

</div>
</body>

</html>