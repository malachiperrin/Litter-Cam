<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: post');
header('Content-Type: application/json; charset=utf-8');

$email = sanitize_email($_POST["email"]);

$json_error_message = "There was an error!";
$json_email_message = "User email was updated to " . $email;

if(!isset($_POST["id"])) {

    http_response_code(501);
    $json = [
        "Error Message" => $json_error_message
    ];
    echo json_encode($json);

} else {

    $id = sanitize_text_field($_POST["id"]);

    $isUpdated = update_user($id, $email);
    
    if($isUpdated) {
        
        http_response_code(200);
        $json = [
            "Message" => $json_email_message,
        ];

    } else {

        http_response_code(501);
        $json = [
            "Error Message" => $json_error_message
        ];

    }
    echo json_encode($json);
}



function update_user(int $id, string $email) : bool {
    global $wpdb;
    
    $statement = "UPDATE users SET email = %s WHERE user_id = %d";

    $results = $wpdb->prepare($statement, $id, $email);

    $isUpdated =  $wpdb->query($results); 

    if (!$isUpdated) {
        return false;
    }

    return true;
}