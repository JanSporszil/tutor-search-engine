<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/styleStudentSignIn.css">
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
            <p class="text">Tworzenie konta</p>
            <form class="adding" action="registerStudent" method="post">
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
                <button class="buttonReg" type="submit">
                    Zarejestruj
                </button>
            </form>
        </div>

</div>
</body>

</html>