<?php

/**
 * Template Name: Litter Cam Login
 */

session_start();

get_header();
?>

<h1 class="title has-text-centered">Welcome back to <?= bloginfo("name"); ?></h1>
<p class="paragraph has-text-centered">Catching litterers everyday</p>

<form class="p-5" method="POST" action="/admin">
    <div class="is-flex is-flex-direction-column">
        <label for="user-email">Email</label>
        <input type="email" name="user-email" class="input" id="user-email" required>
    </div>

    <div class="is-flex is-flex-direction-column">
        <label for="pswd">Password</label>
        <input type="password" name="pswd" class="input" id="pswd" required>
        <div>
            <label for="show-pswd">Show password</label>
            <input type="checkbox" id="show-pswd">
        </div>
    </div>

    <button type="submit" class="button mt-3">Log In</button>
    <p>Forgot password? <a href="reset-password.php">reset password</a></p>
</form>

<?php
get_footer();
