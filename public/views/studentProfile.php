<html>

<head>

    <link rel="stylesheet" type="text/css" href="public/styles/studentProfile.css">
    <?php include 'metatags.php'; ?>
    <?php include 'favAndTitle.php'; ?>

</head>

<body>

<div class="container">
    <div class="header">
        <p class="logo">SQUANCHU</p>
    </div>

    <div class="content">
        <div class="leftSide">
            <div class="left">
            <div class="profilePic" hidden>
                <!-- miejsce przeznaczone na zdjecie profilowe, zostanie dodane -->
            </div>

            <div class="name&Surname">
                <textarea class="nameArea" disabled><?php echo $_SESSION['user']->getName()." ".$_SESSION['user']->getSurname(); ?></textarea>
            </div>

            <div class="city">
                <textarea class="cityArea" disabled><?php if($userInfo == null || $userInfo->getCity() == "")
                        echo "Nie wybrano miasta";
                    else
                        echo $userInfo->getCity();
                    ?></textarea>
            </div>

            <div class="acceptDiv">
                <a href="/editProfile"><button class="acceptButton">Edytuj profil</button></a>
            </div>

            <div class="searchClass">
                <a href="/getClasses"><button class="searchClassButton">Szukaj zajęć</button></a>
            </div>


            <form class="logout" action="logout" method="post">
                <button class="logoutButton" type="submit">Wyloguj</button>
            </form>
            </div>
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