<?php
    function clean($p, $type) {
        switch ($type) {
            case 1:
                strip_tags($p);
                filter_var($p, FILTER_SANITIZE_STRING);
                break;
        }

        return $p;
    }
?>