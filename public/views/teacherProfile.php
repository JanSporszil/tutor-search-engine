<html>

<head>
    <link rel="stylesheet" type="text/css" href="public/styles/teacherProfile.css">
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
                <a href="editProfile"><button class="acceptButton">Edytuj profil</button></a>
            </div>

                <div class="classesAvailable">
                    <a href="classesAvailability"><button class="availButton">Dyspozycja</button> </a>
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


            <div class="subjects">
                <p class="subjectList"><?php if($subjects == null || $user->getSubjects() == "")
                        echo "Tutaj są twoje przedmioty";
                    else{
                        $array = $user->getSubjects();
                        $size = sizeof($array);
                        echo $array[0];
                        for($i = 1; $i < $size; $i++) {
                            echo ", ";
                            echo $array[$i];
                        }
                        echo $array[$size].".";
                    }
                    ?></p>
                <a href="addSubjects"> <button class="chooseSub">Wybierz przedmioty</button> </a>
            </div>



        </div>

    </div>

</div>

</body>

</html>