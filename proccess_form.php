<?php
if ($_GET) {
    if (CHECK_CURRENT_PASSWORD) {
        if (!checkCurrentPassword($_GET['inputEmail'], $_GET['inputPasswordCurrent'])) {
            die("<h2 class='error'>Entered current password is worng!</h2>");
        }
    }
}

setNewPassword($_GET['inputEmail'], $_GET['inputPasswordCurrent']);