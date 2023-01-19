"use-strict";

// Usually I would make separate scripts for each function but for easy navigation I put them all in one file.

$(document).ready(function () {

    // show password functionality

    $("#show-pswd").on("change", () => {
        if ($("#show-pswd").prop("checked")) {
            $("#pswd").attr("type", "text");
        } else {
            $("#pswd").attr("type", "password");
        }
    });

    // change email
    $("#change-user-email").on("change", () => {
        $(".button.is-success.m-3").prop("disabled", false);
        $(".button.is-danger.m-3").prop("disabled", false);
    });


    // approve or reject video
    $("#approve-video").on("click", function () { changeVideoApprovalStatus(true, 1); });
    $("#reject-video").on("click", function () { changeVideoApprovalStatus(false, 1); });


    // update user profile
    $("#user-profile-form").submit( function (e) {
        e.preventDefault();
        let url = `http://localhost:9000/api/user/update.php`;
        let userID = $("#user_id").val();
        let email = $("#change-user-email").val();
        let isConfirmed;
            $.ajax({
                type: "POST",
                url: url,
                data: {"id": userID, "email": email},
                dataType: "json",
                success: function (response) {
                    window.alert(`Your email has been updated to ${$email}. You will now be logged out to sign in with your new credentials.`);
                    location.href = "http://localhost:9000/logout.php";
                }
            });

            
    });

});


function changeVideoApprovalStatus(isApproved, videoID) {

    if (isApproved) {
        videoApprovalAlert(isApproved, videoID, `Litter video ${videoID} will be approved. Are you sure?`);
    } else {
        videoApprovalAlert(isApproved, videoID, `Litter video ${videoID} will be rejected. Are you sure?`);
    }

}


function videoApprovalAlert(isApproved, videoID, alertMessage) {
    isConfirmed = window.confirm(alertMessage);
    if (isConfirmed) {
        let data = {
            isApproved: isApproved,
            videoID: videoID
        }

        let url = `http://localhost:9000/video-approval.php?id=${videoID}`;

        if (isApproved === false) {
            $.ajax({
                type: "POST",
                // url: url,
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });

        } else {
            $.ajax({
                type: "POST",
                // url: url,
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
    }
}

$(document).ajaxStart(function() {
   $("#loader").css("display", "flex"); 
});

$(document).ajaxStop(function() {
    $("#loader").css("display", "none"); 
 });