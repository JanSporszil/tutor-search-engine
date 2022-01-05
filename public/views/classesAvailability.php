<html>

<head>
    <script type="text/javascript" src="public/assets/js/teacherAvailability.js"></script>
    <link rel="stylesheet" type="text/css" href="public/styles/classesAvailability.css">
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

        <div class="addingAvailability">
            <p><?php
            if(isset($messages))
                foreach ($messages as $message)
                    echo $message;
                ?></p>
            <select class="selectDay">
                <option value="" selected disabled hidden>Wybór Dnia</option>
                <option value="Poniedziałek">Poniedziałek</option>
                <option value="Wtorek">Wtorek</option>
                <option value="Środa">Środa</option>
                <option value="Czwartek">Czwartek</option>
                <option value="Piątek">Piątek</option>
                <option value="Sobota">Sobota</option>
            </select>

            <select class="selectTime">
                <option value="" selected disabled hidden>Wybór Godziny</option>
                <option value="7:00-8:00">7:00-8:00</option>
                <option value="8:00-9:00">8:00-9:00</option>
                <option value="9:00-10:00">9:00-10:00</option>
                <option value="10:00-11:00">10:00-11:00</option>
                <option value="11:00-12:00">11:00-12:00</option>
                <option value="12:00-13:00">12:00-13:00</option>
                <option value="13:00-14:00">13:00-14:00</option>
                <option value="14:00-15:00">14:00-15:00</option>
                <option value="15:00-16:00">15:00-16:00</option>
                <option value="16:00-17:00">16:00-17:00</option>
                <option value="17:00-18:00">17:00-18:00</option>
                <option value="18:00-19:00">18:00-19:00</option>
                <option value="19:00-20:00">19:00-20:00</option>
                <option value="20:00-21:00">20:00-21:00</option>
            </select>

            <button class="addButton" type="submit">Dodaj</button>


        </div>


        <div class="displayAvailability">
            <div class="disp">

                <div class="day">
                    Poniedziałek
                </div>
                <div class="time">
                    7:00-8:00
                </div>
                <div class="deleteAvail">
                    X
                </div>
            </div>

            <div class="disp">
                <div class="day">
                    Środa
                </div>
                <div class="time">
                    8:00-9:00
                </div>
                <div class="deleteAvail">
                    X
                </div>
            </div>

        </div>


    </div>

</div>
</body>

</html>