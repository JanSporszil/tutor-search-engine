<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/registerAccountStyle.css">
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
        <p class="text"><?php
            if(isset($messages))
                foreach ($messages as $message)
                    echo $message;
            ?></p>
        <form class="adding" action="register" method="post">

            <input name="Name" type="text" class="regInput" placeholder="Imię">
            <input name="Surname" type="text" class="regInput" placeholder="Nazwisko">
            <input name="Email" type="text" class="regInput" placeholder="Adres email">
            <input name="Username" type="text" class="regInput" placeholder="Nazwa Użytkownika">
            <input name="Password" type="password" class="regInput" placeholder="Hasło">
                <!--dodac inputa z wyborem konta -->
            <div class="choose">
                <span>Student <input type="radio" value="1" name="AccountType"/></span>
                <span>Nauczyciel <input type="radio" value="2" name="AccountType"/></span>

            </div>
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