<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/loginStyle.css">
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
            <div class="textSide">
                <div class="textArea">
                <p class="text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                </div>
            </div>

            <div class="loginSide">
                <div class="formDiv">
                <form class="form" action="loginIn" method="post">
                    <?php
                    if(isset($messages))
                        foreach ($messages as $message)
                            echo $message;
                    ?>
                    <input name ="username" type="text" class="loginInp" placeholder="Login">
                    <input name="password" type="text" class="passwInp" placeholder="Haslo">
                    <div class="buttonDiv">
                    <button class="buttonLogin" type="submit">
                        Zaloguj
                    </button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>