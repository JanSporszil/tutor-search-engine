<?php

echo '<div class="header">';
        echo '<p class="logo">SQUANCHU</p>';

        echo '<div class="buttons">';

                if(!isset($_SESSION['user']))
                    echo '<a class="abutton" href="/home"><button class="profile" value="studentProfile">Home</button></a>';

                else if($_SESSION['user']->getGroupID() == 1)
                    echo '<a href="/teacherProfile"><button class="profile" value="teacherProfile">Teacher Profile</button></a>';

                else if($_SESSION['user']->getGroupID() == 2)
                    echo '<a href="/studentProfile"><button class="profile" value="studentProfile">Profile</button></a>';

        echo '</div>';

    echo '</div>';



