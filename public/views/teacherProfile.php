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
                <button class="acceptButton">Zatwierdź zmiany</button>
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

            </div>

            <div class="classesAvailable">

            </div>

        </div>

    </div>

</div>

</body>

</html>