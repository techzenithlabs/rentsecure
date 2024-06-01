function takeAction(event, user_Id, action) {
    event.preventDefault();
    let userId = user_Id;
    let Useraction = action;
    $(".verifiedsuccess").text("");
    $(".verifiedsuccess").hide();
    $(".verifiedfailed").text("");
    $(".verifiedfailed").hide();

    let userconfirm = "";
    if (action == 1) {
        userconfirm = confirm("Are you Sure you want to Approve ?");
    } else {
        userconfirm = confirm("Are you Sure you want to Reject ?");
    }
    let formData = {
        userId: userId,
        action: Useraction,
    };
    if (userconfirm == true && Useraction == 1) {
        $.ajax({
            url: baseURL + "/admin-action",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            type: "POST",
            data: formData,
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    $(".verifiedfailed").hide();
                    $(".verifiedfailed").text("");
                    $(".verifiedsuccess").show();
                    $(".verifiedsuccess").text(response.message);
                    setTimeout(function () {
                        $(".verifiedsuccess").hide();
                        $(".verifiedsuccess").text("");
                    }, 6000);
                } else {
                    $(".verifiedsuccess").hide();
                    $(".verifiedsuccess").text("");
                    $(".verifiedfailed").show();
                    $(".verifiedfailed").text(response.message);

                    setTimeout(function () {
                        $(".verifiedfailed").hide();
                        $(".verifiedfailed").text("");
                    }, 6000);
                }
            },
            error: function (response) {
                $(".verifiedfailed").show();
                $(".verifiedfailed").text(response);

                setTimeout(function () {
                    $(".verifiedfailed").hide();
                    $(".verifiedfailed").text("");
                }, 6000);
            },
        });
    } else if (userconfirm == true && Useraction == 2) {
        $.ajax({
            url: baseURL + "/admin-action",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            type: "POST",
            data: formData,
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    $(".verifiedfailed").hide();
                    $(".verifiedfailed").text("");
                    $(".verifiedsuccess").show();
                    $(".verifiedsuccess").text(response.message);
                    setTimeout(function () {
                        $(".verifiedsuccess").hide();
                        $(".verifiedsuccess").text("");
                    }, 5000);

                    setTimeout(function () {
                        location.reload();
                    }, 5200);
                } else {
                    $(".verifiedsuccess").hide();
                    $(".verifiedsuccess").text("");
                    $(".verifiedfailed").show();
                    $(".verifiedfailed").text(response.message);
                    setTimeout(function () {
                        $(".verifiedfailed").hide();
                        $(".verifiedfailed").text("");
                    }, 5000);

                    setTimeout(function () {
                        location.reload();
                    }, 5200);
                }
            },
            error: function (response) {
                $(".verifiedfailed").show();
                $(".verifiedfailed").text(response);

                setTimeout(function () {
                    $(".verifiedfailed").hide();
                    $(".verifiedfailed").text("");
                }, 5000);

                setTimeout(function () {
                    location.reload();
                }, 5200);
            },
        });
    } else {
    }
}

