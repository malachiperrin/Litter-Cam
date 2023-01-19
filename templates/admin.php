<?php

/**
 * Template Name: Litter Cam Admin Page
 */

session_start();

global $user;

if (!isset($_SESSION["user"]) && !isset($_GET['status'])) {
    $isUserLoggedIn = log_in_user();

    if (!$isUserLoggedIn) {
        wp_redirect("/");
    }
}


// echo "<pre>";

// print_r($_SESSION["user"]);

// echo "</pre>";

get_header();

$user = $_SESSION["user"];
?>

<div id="app">

<h1 class="title has-text-right p-5" style="width: 100%;">Hello, <?= $user[0]["first_name"]; ?></h1>
    <section class="main-content columns is-fullheight">

        <?php 
        get_template_part( "template-parts/side", null, null );

        if(isset($_GET['status'])) {
            $status = strtoupper($_GET['status']);
        } else {
            $status = '';
        }

        
        $videos = get_all_videos_by_company_id((int)$user[0]["company_id"], $status);

        // print_r($videos);

        ?>

        <div class="container column is-10">
            <div class="section">

                <?php

                    if(empty($videos)) {
                        echo "NO VIDEOS";
                    } else {
                        
                        for($i = 0; $i < count($videos); $i++) {
                            
                            is_null($videos[$i]->status_updated) ? $status_updated = "" : $status_updated = $videos[$i]->status_updated;
    
                            is_null($videos[$i]->video_sent) ? $video_sent = "" : $videos_sent = $videos[$i]->video_sent;
    
                            $video_card = print_video_card($videos[$i]->video_id, $videos[$i]->is_approved, $videos[$i]->approved_by, $status_updated, $video_sent, $videos[$i]->video_url);
                            echo $video_card;
                        }
                    }

                ?>

            </div>
        </div>

    </section>

</div>




<?php
get_footer();
