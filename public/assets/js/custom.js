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

document.addEventListener('DOMContentLoaded', function () {
    var successMessage = document.getElementById('success-error-message');
    if (successMessage) {
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds
    }
});

function uploadProperty(event){
    const file = event.target.files[0];
    imagePreview.style.display='none';
    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
}

function changeStatus(event,status,landlord_id,property_id){
    event.preventDefault();
    $('.screeningsuccessstatus').hide();
    $('.screeningsuccessstatus').html('')
    $('.screeningerrortatus').hide();
    $('.screeningerrortatus').html('')
    let data={}

    if(status=="approve"){
         data={
            landlord_id:landlord_id,
            property_id:property_id,
            status:status,
        }
      let approve=confirm("Are you sure you want to Approve ?");
      if(approve && approve==true){
        $.ajax({
            url: baseURL + "/screening-action",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            type: "POST",
            data: data,
            success: function (response) {
               if(response.status==1){
                $('.screeningerrortatus').hide()
                $('.screeningerrortatus').html('')
                $('.screeningsuccessstatus').show()
                $('.screeningsuccessstatus').html(response.message);

                setTimeout(function(){
                    $('.screeningsuccessstatus').hide()
                    $('.screeningsuccessstatus').html('')
                    location.reload();
                },5000)

               }else{
                $('.screeningsuccessstatus').hide()
                $('.screeningsuccessstatus').html('');
                $('.screeningerrortatus').show()
                $('.screeningerrortatus').html(response.message)

                setTimeout(function(){
                    $('.screeningerrortatus').hide()
                    $('.screeningerrortatus').html('')
                    location.reload();
                },5000)

               }
            },
            error: function (response) {
                $('.screeningerrortatus').show()
                $('.screeningerrortatus').html(response)

            },
        });
      }
    }else{
      let reject=confirm("Are you sure you want to Reject ?");
      if(reject && reject==true){
        data={
            landlord_id:landlord_id,
            property_id:property_id,
            status:status,
        }
        $.ajax({
            url: baseURL + "/screening-action",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            type: "POST",
            data: data,
            success: function (response) {
               if(response.status==1){
                $('.screeningerrortatus').hide()
                $('.screeningerrortatus').html('')
                $('.screeningsuccessstatus').show()
                $('.screeningsuccessstatus').html(response.message);

                setTimeout(function(){
                    $('.screeningsuccessstatus').hide()
                    $('.screeningsuccessstatus').html('')
                    location.reload();
                },5000)

               }else{
                $('.screeningsuccessstatus').hide()
                $('.screeningsuccessstatus').html('');
                $('.screeningerrortatus').show()
                $('.screeningerrortatus').html(response.message)

                setTimeout(function(){
                    $('.screeningerrortatus').hide()
                    $('.screeningerrortatus').html('')
                    location.reload();
                },5000)

               }
            },
            error: function (response) {
                $('.screeningerrortatus').show()
                $('.screeningerrortatus').html(response)
            },
        });
      }

    }

}

function uploadReport(event,landlord_id,property_id){
    event.preventDefault();
    $('.screeningsuccessstatus').hide();
    $('.screeningsuccessstatus').html('');
    $('.screeningerrorstatus').hide();
    $('.screeningerrorstatus').html('')
    let documentPreview=document.getElementById('documentpreview');
    documentPreview.style.display='none';
    const file = event.target.files[0];

    let formData = new FormData();
    formData.append('landlord_id', landlord_id);
    formData.append('property_id', property_id);
    formData.append('upload-report', file);
    $.ajax({
        url: baseURL + "/upload-approved-documents",
        type: 'POST',
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
           if(response.status==1){
            documentPreview.style.display="block";
            documentPreview.innerText=file.name;

            let resMsg=response.message;
            $('.screeningerrortatus').hide();
            $('.screeningerrortatus').html('');
            $('.screeningsuccessstatus').show();
            $('.screeningsuccessstatus').html(resMsg)

            setTimeout(function(){
                $('.screeningsuccessstatus').hide();
                $('.screeningsuccessstatus').html('')
                location.reload();
            },5000)

           }else{
            let resMsg=response.message;
            $('.screeningsuccessstatus').hide();
            $('.screeningsuccessstatus').html('')
            $('.screeningerrortatus').show();
            $('.screeningerrortatus').html(resMsg);

            setTimeout(function(){
                $('.screeningerrortatus').hide('');
                $('.screeningerrortatus').html('');
                location.reload();
            },5000)

           }
        },
        error: function(xhr, status, error) {
            //console.error(xhr.responseText);

            $('.screeningsuccessstatus').hide();
            $('.screeningsuccessstatus').html('')
            $('.screeningerrortatus').show();
            $('.screeningerrortatus').html(xhr.responseText);

            setTimeout(function(){
                $('.screeningerrortatus').hide('');
                $('.screeningerrortatus').html('');
                location.reload();
            },5000)
        }
    });

}

function saveFilePath(filePath, landlord_id, property_id) {
    // Write code to save the file path in the database
}
