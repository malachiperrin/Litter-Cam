<?php

/**
 * Template Name: Litter Cam Profile
 */

 session_start();

get_header();

// echo "<pre>";

// print_r($_SESSION["user"]);

// echo "</pre>";

$user = $_SESSION["user"];

?>

<div id="app">

    <h1 class="title has-text-right p-5" style="width: 100%;">Hello, <?= $user[0]["first_name"]; ?></h1>
    <section class="main-content columns is-fullheight">

        <?php get_template_part( "template-parts/side", null, null ); ?>


        <div class="container column is-10">
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">My Profile</p>
                    </div>
                    <div class="card-content">
                        <img class="profile-page-user-image" src="https://uproxx.com/wp-content/uploads/2021/06/coi-leray-grid-1.jpeg?w=710" alt="" srcset="">
                        <div class="content">
                            <form id="user-profile-form">
                                <div>
                                    <label class="m-3" for="user_id">User ID</label>
                                    <input type="text" class="input m-3" id="user_id" value="<?= $user[0]["user_id"]; ?>" disabled />
                                </div>

                                <div>
                                    <label class="m-3" for="first_name">First Name</label>
                                    <input type="text" class="input m-3" id="first_name" value="<?= $user[0]["first_name"]; ?>" disabled />
                                </div>

                                <div>
                                    <label class="m-3" for="last_name">Last Name</label>
                                    <input type="text" class="input m-3" id="last_name" value="<?= $user[0]["last_name"]; ?>" disabled />
                                </div>

                                <div>
                                    <label class="m-3" for="change-user-email">Email</label>
                                    <input type="email" class="input m-3" id="change-user-email" value="<?= $user[0]["email"]; ?>" minlength="1" />
                                </div>

                                <div>
                                    <button id="submit-user-profile-form" class="button is-success m-3" disabled>Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </section>

</div>




<?php
get_footer();
