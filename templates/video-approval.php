<?php 

/**
 * Template Name: Litter Cam Video Approval
 */

if (isset($_GET["id"])) {
    echo "<h1>" . $_GET["id"] . "</h1>";
}

echo "<pre>";
print_r($_POST);
echo "</pre>";