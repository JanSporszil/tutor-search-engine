<?php

echo '<div class="header">';
        echo '<p class="logo">SQUANCHU</p>';

        echo '<div class="buttons">';
                if($_SESSION['user']->getGroupID() == 1)
              echo '<a href="/teacherProfile"><button class="profile" value="teacherProfile">teacherProfile</button></a>';
                else if($_SESSION['user']->getGroupID() == 2)
                    echo '<a href="/studentProfile"><button class="profile" value="studentProfile">profile</button></a>';
        echo '</div>';

    echo '</div>';



