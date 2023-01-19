<?php

/**
 * Template Name: Litter Cam Logout
 */

// removes all assigned user data
session_destroy();
get_header();

?>

<div id="app">

    <h1>You have been logged out.</h1>
    <p><a href="/">Return to log in.</a></p>

</div>




<?php
get_footer();
