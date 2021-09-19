<?php
    function greeting() {
        $greetings;

        if (date("a") == 'am') {
            $greetings = array('Morning ' . $_SESSION['NAME'] . '!',
                               'Howdy ' . $_SESSION['NAME'] . '!',
                               'Ola ' . $_SESSION['NAME'] . '!',
                               'Hey ' . $_SESSION['NAME'] . ', welcome back!',
                          );
        }
        else {
            $greetings = array('Hey ' . $_SESSION['NAME'] . ', need some coffee?',
                               'Afternoon ' . $_SESSION['NAME'],
                               'Take a break, have a Kit-Kat!',
                               'I like to move it move it, you like to?'
                         );
        }

        return $greetings[array_rand($greetings)];
    }
?>