<?php

function log_in_user(): bool
{

    if (!isset($_POST['user-email'])) {
        return false;
    }

    $email = $_POST["user-email"];
    $password = $_POST["pswd"];

    $user = get_user_log_in_results($email, $password);

    $_SESSION["user"] = $user;

    return true;
}


function get_user_log_in_results(string $email, string $password): array
{
    global $wpdb;


    // dont want to save password to session, if we need it we can get with the user id
    $statement = "SELECT user_id, company_id, first_name, last_name, email FROM users WHERE email = %s AND password = %s";
    $results = $wpdb->prepare($statement, $email, $password);

    $user = $wpdb->get_results($results, ARRAY_A);

    return $user;
}


function get_all_videos_by_company_id(int $company_id, string $status = null): array
{
    global $wpdb;

    $statement = "";

    if (!empty($status)) {
        $status = ltrim(strtoupper($status));
    }


    // dont want to save password to session, if we need it we can get with the user id
    switch ($status) {
        case "N":
            $statement = "SELECT * FROM videos WHERE company_id = %d AND is_approved = %s";
            $results = $wpdb->prepare($statement, $company_id, $status);
            break;
        case "Y":
            $statement = "SELECT * FROM videos WHERE company_id = %d AND is_approved = %s";
            $results = $wpdb->prepare($statement, $company_id, $status);
            break;
        default:
            $statement = "SELECT * FROM videos WHERE company_id = %d";
            $results = $wpdb->prepare($statement, $company_id);
    }


    $videos = $wpdb->get_results($results);



    return $videos;
}


function print_video_card($video_id, $is_approved, $approved_by, $status_updated, $video_sent, $video_url): string
{

    if (!empty($is_approved)) {
        ($is_approved === "N") ? $approval_string = sprintf("This was rejected by %s on %s", $approved_by, $status_updated) : sprintf("This was approved by %s on %s", $approved_by, $status_updated);
    } else {
        $approval_string = "";
    }

    if (!$approval_string) {
        $change_video_status_string = "<button class='button is-success' id='approve-video'>Approve</button><button class='button is-danger' id='reject-video'>Reject</button>";
    } else {
        $change_video_status_string = "";
    }


    $html = sprintf("<div class='card'>
    <div class='card-header'>
        <p class='card-header-title'>Litter Video %d</p>
    </div>
    <div class='card-content'>
    <iframe width='560' height='315' src='https://www.youtube.com/embed/ePSODRMZvy8' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
        <div class='content'>
        <p>This video was sent on %s</p>
            <div>
                %s
                %s
            </div>
        </div>
    </div>
</div>
<br />
<br />", $video_id, $approval_string, $change_video_status_string, $video_sent);

    return $html;
}


function enqueue_all_styles() {
    
};