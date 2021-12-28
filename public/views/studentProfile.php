<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/studentProfile.css">
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
        <div class="leftSide">
            <div class="profilePic">

            </div>

            <div class="name&Surname">

            </div>

            <div class="city">
                <p><?php if($userInfo == null || $userInfo->getCity() == "")
                        echo "Nie wybrano miasta";
                    else
                        echo $userInfo->getCity();
                     ?></p>
            </div>

            <div class="acceptDiv">
                <button class="acceptButton">Edytuj profil</button>
            </div>

            <form class="logout" action="logout" method="post">
                <button class="logoutButton" type="submit">Wyloguj</button>
            </form>

        </div>

        <div class="rightSide">
            <div class="description">
                <textarea class="textArea" disabled><?php if($userInfo == null || $userInfo->getDescription() == "")
                        echo "Twój opis. Możesz go edytować.";
                    else
                        echo $userInfo->getDescription();
                    ?></textarea>
            </div>
        </div>

    </div>
</div>

</body>

</html>