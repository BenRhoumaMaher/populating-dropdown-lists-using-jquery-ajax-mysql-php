<?php
function view($page) {
    GLOBAL $countries;
    require(APP_PATH . "view/$page.view.php");
};