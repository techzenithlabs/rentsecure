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

document.addEventListener("DOMContentLoaded", function () {
    var successMessage = document.getElementById("success-error-message");
    if (successMessage) {
        setTimeout(function () {
            successMessage.style.display = "none";
        }, 5000); // 5000 milliseconds = 5 seconds
    }
});

function uploadProperty(event) {
    const file = event.target.files[0];
    $(".invalidfile").text("");
    const allowedMimes = [
        "application/msword",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        "application/pdf",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        "text/plain",
    ];
    imagePreview.style.display = "none";
    if (file) {
        if (!allowedMimes.includes(file.type)) {
            $(".invalidfile").text(
                "Invalid file type. Please select a DOC, DOCX, PDF, XLSX, or TXT file."
            );
            event.target.value = ""; // Clear the file input
            return;
        }
        const reader = new FileReader();

        reader.onload = function (e) {
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.innerText = file.name;
            imagePreview.style.display = "block";
        };

        reader.readAsDataURL(file);
    }
}

function changeStatus(event, status, landlord_id, property_id) {
    event.preventDefault();
    $(".screeningsuccessstatus").hide();
    $(".screeningsuccessstatus").html("");
    $(".screeningerrortatus").hide();
    $(".screeningerrortatus").html("");
    let data = {};

    if (status == "approve") {
        data = {
            landlord_id: landlord_id,
            property_id: property_id,
            status: status,
        };
        let approve = confirm("Are you sure you want to Approve ?");
        if (approve && approve == true) {
            $.ajax({
                url: baseURL + "/screening-action",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                type: "POST",
                data: data,
                success: function (response) {
                    if (response.status == 1) {
                        $(".screeningerrortatus").hide();
                        $(".screeningerrortatus").html("");
                        $(".screeningsuccessstatus").show();
                        $(".screeningsuccessstatus").html(response.message);

                        setTimeout(function () {
                            $(".screeningsuccessstatus").hide();
                            $(".screeningsuccessstatus").html("");
                            location.reload();
                        }, 5000);
                    } else {
                        $(".screeningsuccessstatus").hide();
                        $(".screeningsuccessstatus").html("");
                        $(".screeningerrortatus").show();
                        $(".screeningerrortatus").html(response.message);

                        setTimeout(function () {
                            $(".screeningerrortatus").hide();
                            $(".screeningerrortatus").html("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (response) {
                    $(".screeningerrortatus").show();
                    $(".screeningerrortatus").html(response);
                },
            });
        }
    } else {
        let reject = confirm("Are you sure you want to Reject ?");
        if (reject && reject == true) {
            data = {
                landlord_id: landlord_id,
                property_id: property_id,
                status: status,
            };
            $.ajax({
                url: baseURL + "/screening-action",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                type: "POST",
                data: data,
                success: function (response) {
                    if (response.status == 1) {
                        $(".screeningerrortatus").hide();
                        $(".screeningerrortatus").html("");
                        $(".screeningsuccessstatus").show();
                        $(".screeningsuccessstatus").html(response.message);

                        setTimeout(function () {
                            $(".screeningsuccessstatus").hide();
                            $(".screeningsuccessstatus").html("");
                            location.reload();
                        }, 5000);
                    } else {
                        $(".screeningsuccessstatus").hide();
                        $(".screeningsuccessstatus").html("");
                        $(".screeningerrortatus").show();
                        $(".screeningerrortatus").html(response.message);

                        setTimeout(function () {
                            $(".screeningerrortatus").hide();
                            $(".screeningerrortatus").html("");
                            location.reload();
                        }, 5000);
                    }
                },
                error: function (response) {
                    $(".screeningerrortatus").show();
                    $(".screeningerrortatus").html(response);
                },
            });
        }
    }
}

function uploadReport(event, landlord_id, property_id) {
    event.preventDefault();
    $(".screeningsuccessstatus").hide();
    $(".screeningsuccessstatus").html("");
    $(".screeningerrorstatus").hide();
    $(".screeningerrorstatus").html("");
    let documentPreview = document.getElementById("documentpreview");
    documentPreview.style.display = "none";
    const file = event.target.files[0];

    let formData = new FormData();
    formData.append("landlord_id", landlord_id);
    formData.append("property_id", property_id);
    formData.append("upload-report", file);
    $.ajax({
        url: baseURL + "/upload-approved-documents",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == 1) {
                documentPreview.style.display = "block";
                documentPreview.innerText = file.name;

                let resMsg = response.message;
                $(".screeningerrortatus").hide();
                $(".screeningerrortatus").html("");
                $(".screeningsuccessstatus").show();
                $(".screeningsuccessstatus").html(resMsg);

                setTimeout(function () {
                    $(".screeningsuccessstatus").hide();
                    $(".screeningsuccessstatus").html("");
                    location.reload();
                }, 5000);
            } else {
                let resMsg = response.message;
                $(".screeningsuccessstatus").hide();
                $(".screeningsuccessstatus").html("");
                $(".screeningerrortatus").show();
                $(".screeningerrortatus").html(resMsg);

                setTimeout(function () {
                    $(".screeningerrortatus").hide("");
                    $(".screeningerrortatus").html("");
                    location.reload();
                }, 5000);
            }
        },
        error: function (xhr, status, error) {
            //console.error(xhr.responseText);

            $(".screeningsuccessstatus").hide();
            $(".screeningsuccessstatus").html("");
            $(".screeningerrortatus").show();
            $(".screeningerrortatus").html(xhr.responseText);

            setTimeout(function () {
                $(".screeningerrortatus").hide("");
                $(".screeningerrortatus").html("");
                location.reload();
            }, 5000);
        },
    });
}

function downloadReport(filePath) {
    // Open a new window or tab with the file download URL
    let storedPath = baseURL + "/storage/app/";
    let filefullPath = storedPath + filePath;
    window.location.href = filefullPath;
    //window.open(filefullPath, '_blank');
}

let paymentInfo = document.querySelectorAll(".payInfo-sec > ul > li");
paymentInfo.forEach(function (e, i) {
    e.addEventListener("click", function (event) {
        event.preventDefault();

        let checkinfo = this.getAttribute("data-info");
        if (checkinfo == "landlord") {
            this.style.border = "1px solid grey";
            let nextElem = this.nextElementSibling;
            nextElem.style.border = "1px solid  #f3f3f3";
        } else {
            this.style.border = "1px solid grey";
            let prevElem = this.previousElementSibling;
            prevElem.style.border = "1px solid  #f3f3f3";
        }
        document.getElementById("paymentinfo").value = checkinfo;
    });
});

$(document).ready(function () {
    /****Landlord Form SUbmission ****/
    $("#formstep3").on("submit", function (event) {
        $(".screeningsuccess").hide();
        $(".screeningsuccess").text("");
        $(".screeningerror").hide();
        $(".screeningerror").text("");
        // Get all form data
        // Get serialized array
        var serializedArray = $(this).serializeArray();

        // Convert array to object
        var formData = {};
        $.each(serializedArray, function () {
            formData[this.name] = this.value;
        });
        let country = formData.country;
        let paymentInfo = formData.paymentinfo;
        let firstName = formData.firstname;
        let lastName = formData.lastname;
        let middleName = formData.middlename;
        let sin = formData.sin;
        let dob = formData.dob;
        let address = formData.address;
        let applicant_confirm = formData.applicant_confirm;
        let applicant_consignment = formData.applicant_consignment;

        let formValid = false;
        if (paymentInfo === null) {
            $(".paymentinfoerror").text(
                "kindly Go back and select payment info (Landlord /Tenant)"
            );
            formValid = false;
        } else {
            $(".paymentinfoerror").text("");
            formValid = true;
        }

        if (country === null) {
            $(".countryerror").text(
                "kindly Go back and Select country (USA / Canada)"
            );
            formValid = false;
        } else {
            $(".countryerror").text("");
            formValid = true;
        }

        if (firstName.length <= 0) {
            $(".firstnameerror").text("Kindly enter first name");
            formValid = false;
        } else {
            $(".firstnameerror").text("");
            formValid = true;
        }

        if (lastName.length <= 0) {
            $(".lastnameerror").text("Kindly enter last name");
            formValid = false;
        } else {
            $(".lastnameerror").text("");
            formValid = true;
        }

        if (middleName.length <= 0) {
            $(".middlenameerror").text("Kindly enter middle name");
            formValid = false;
        } else {
            $(".middlenameerror").text("");
            formValid = true;
        }

        if (sin.length <= 0) {
            $(".sinerror").text("Kindly select sin");
            formValid = false;
        } else {
            $(".sinerror").text("");
            formValid = true;
        }

        if (dob.length <= 0) {
            $(".doberror").text("Kindly select date of birth");
            formValid = false;
        } else {
            $(".doberror").text("");
            formValid = true;
        }

        if (address.length <= 0) {
            $(".addresserror").text("Kindly enter valid address");
            formValid = false;
        } else {
            $(".addresserror").text("");
            formValid = true;
        }

        if (typeof applicant_confirm == "undefined") {
            $(".applicant_confirmerror").text("Kindly accept applicant form");
            formValid = false;
        } else {
            $(".applicant_confirmerror").text("");
            formValid = true;
        }

        if (typeof applicant_consignment == "undefined") {
            $(".applicant_consignmentrror").text(
                "Kindly accept agreement form"
            );
            formValid = false;
        } else {
            $(".applicant_consignmentrror").text("");
            formValid = true;
        }

        if (formValid == false) {
            event.preventDefault();
        } else {
            return true;
        }
    });

    $("#formstep4").on("submit", function (event) {
        event.preventDefault();
        $(".screeningsuccess").hide();
        $(".screeningsuccess").text("");
        $(".screeningerror").hide();
        $(".screeningerror").text("");
        // Get all form data
        // Get serialized array
        var serializedArray = $(this).serializeArray();

        // Convert array to object
        var formData = {};
        $.each(serializedArray, function () {
            formData[this.name] = this.value;
        });

        let country = formData.country;
        let paymentInfo = formData.paymentinfo;
        let firstName = formData.firstname;
        let lastName = formData.lastname;
        let middleName = formData.middlename;
        let sin = formData.sin;
        let dob = formData.dob;
        let address = formData.address;
        let applicant_confirm = formData.applicant_confirm;
        let applicant_consignment = formData.applicant_consignment;

        let landlord_property = formData.property;
        let tenant_first_name = formData.tenant_first_name;
        let tenant_last_name = formData.tenant_last_name;
        let tenant_email = formData.tenant_email;

        let formValid = false;
        if (paymentInfo === null) {
            $(".paymentinfoerror").text(
                "kindly Go back and select payment info (Landlord /Tenant)"
            );
            formValid = false;
        } else {
            $(".paymentinfoerror").text("");
            formValid = true;
        }

        if (country === null) {
            $(".countryerror").text(
                "kindly Go back and Select country (USA / Canada)"
            );
            formValid = false;
        } else {
            $(".countryerror").text("");
            formValid = true;
        }

        if (firstName.length <= 0) {
            $(".firstnameerror").text("Kindly enter first name");
            formValid = false;
        } else {
            $(".firstnameerror").text("");
            formValid = true;
        }

        if (lastName.length <= 0) {
            $(".lastnameerror").text("Kindly enter last name");
            formValid = false;
        } else {
            $(".lastnameerror").text("");
            formValid = true;
        }

        if (middleName.length <= 0) {
            $(".middlenameerror").text("Kindly enter middle name");
            formValid = false;
        } else {
            $(".middlenameerror").text("");
            formValid = true;
        }

        if (sin.length <= 0) {
            $(".sinerror").text("Kindly select sin");
            formValid = false;
        } else {
            $(".sinerror").text("");
            formValid = true;
        }

        if (dob.length <= 0) {
            $(".doberror").text("Kindly select date of birth");
            formValid = false;
        } else {
            $(".doberror").text("");
            formValid = true;
        }

        if (address.length <= 0) {
            $(".addresserror").text("Kindly enter valid address");
            formValid = false;
        } else {
            $(".addresserror").text("");
            formValid = true;
        }

        if (typeof applicant_confirm == "undefined") {
            $(".applicant_confirmerror").text("Kindly accept applicant form");
            formValid = false;
        } else {
            $(".applicant_confirmerror").text("");
            formValid = true;
        }

        if (typeof applicant_consignment == "undefined") {
            $(".applicant_consignmentrror").text(
                "Kindly accept agreement form"
            );
            formValid = false;
        } else {
            $(".applicant_consignmentrror").text("");
            formValid = true;
        }

        if (landlord_property == "") {
            $(".propertyerror").text("Kindly select property");
            formValid = false;
        } else {
            $(".propertyerror").text("");
            formValid = true;
        }

        if (tenant_first_name.length <= 0) {
            $(".firstnameerror").text("Kindly enter tenant firstname");
            formValid = false;
        } else {
            $(".firstnameerror").text("");
            formValid = true;
        }

        if (tenant_last_name.length <= 0) {
            $(".lastnameerror").text("Kindly enter tenant lastname");
            formValid = false;
        } else {
            $(".lastnameerror").text("");
            formValid = true;
        }

        if (tenant_email.length <= 0) {
            $(".emailerror").text("Kindly enter tenant email");
            formValid = false;
        } else {
            $(".emailerror").text("");
            formValid = true;
        }
        if (formValid == true) {
            let data = {
                country: country,
                paymentinfo: paymentInfo,
                firstname: firstName,
                middlename: middleName,
                lastname: lastName,
                sin: sin,
                dob: dob,
                address: address,
                landlord_property: landlord_property,
                tenant_first_name: tenant_first_name,
                tenant_last_name: tenant_last_name,
                tenant_email: tenant_email,
            };

            $.ajax({
                url: baseURL + "/landlord/tenant-screening",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                type: "POST",
                data: data,
                success: function (response) {
                    if (response.status == 1) {
                        console.log("success");
                        $("#tenatmodal").modal("show");
                        $(".screeningsuccess").show();
                        $(".screeningsuccess").text(response.message);
                        setTimeout(function () {
                            $(".screeningsuccess").hide();
                            $(".screeningsuccess").text("");
                        }, 5000);
                    } else {
                        $(".screeningerror").show();
                        $(".screeningerror").text(response.message);

                        setTimeout(function () {
                            $(".screeningerror").hide();
                            $(".screeningerror").text("");
                        }, 5000);
                    }
                },
                error: function (response) {
                    console.log(response);
                },
            });
        }
    });

   /****Landlord Form SUbmission ****/



    /***Tenant Form Submission *****/

    $("#tenantformstep2").on("submit", function (event) {


        $(".screeningsuccess").hide();
        $(".screeningsuccess").text("");
        $(".screeningerror").hide();
        $(".screeningerror").text("");
        // Get all form data
        // Get serialized array
        var serializedArray = $(this).serializeArray();

        // Convert array to object
        var formData = {};
        $.each(serializedArray, function () {
            formData[this.name] = this.value;
        });

       // let country = formData.country;


        let firstName = formData.firstname;
        let lastName = formData.lastname;
        let middleName = formData.middlename;
        let dob = formData.dob;
        let sin = formData.sin;

        let address = formData.address;
        let postalcode=formData.postalcode
        let city=formData.city
        let province=formData.province;


        let formValid = false;


        if (firstName.length <= 0) {
            $(".firstnameerror").text("Kindly enter first name");
            formValid = false;
        } else {
            $(".firstnameerror").text("");
            formValid = true;
        }

        if (lastName.length <= 0) {
            $(".lastnameerror").text("Kindly enter last name");
            formValid = false;
        } else {
            $(".lastnameerror").text("");
            formValid = true;
        }

        if (dob.length <= 0) {
            $(".doberror").text("Kindly select date of birth");
            formValid = false;
        } else {
            $(".doberror").text("");
            formValid = true;
        }

        if (sin.length <= 0) {
            $(".sinerror").text("Kindly select sin");
            formValid = false;
        } else {
            $(".sinerror").text("");
            formValid = true;
        }



        if (address.length <= 0) {
            $(".addresserror").text("Kindly enter valid address");
            formValid = false;
        } else {
            $(".addresserror").text("");
            formValid = true;
        }


        if (postalcode.length <= 0) {
            console.log("eror")
            $(".postalcodeeerror").text("Kindly enter valid postalcode");
            formValid = false;
        } else {
            $(".postalcodeeerror").text("");
            formValid = true;
        }


        if (city.length <= 0) {
            $(".cityerror").text("Kindly enter valid city");
            formValid = false;
        } else {
            $(".cityerror").text("");
            formValid = true;
        }

        if (province.length <= 0) {
            $(".provinceerror").text("Kindly enter valid province");
            formValid = false;
        } else {
            $(".provinceerror").text("");
            formValid = true;
        }






        if (formValid == false) {
            event.preventDefault();

        } else {
            return true;
        }
    });

    $("#tenantformstep3").on("submit", function (event) {
        event.preventDefault();
        console.log("third")
        $(".screeningsuccess").hide();
        $(".screeningsuccess").text("");
        $(".screeningerror").hide();
        $(".screeningerror").text("");
        // Get all form data
        // Get serialized array
        var serializedArray = $(this).serializeArray();

        // Convert array to object
        var formData = {};
        $.each(serializedArray, function () {
            formData[this.name] = this.value;
        });

        let country = formData.country;
        let paymentInfo = formData.paymentinfo;
        let firstName = formData.firstname;
        let lastName = formData.lastname;
        let middleName = formData.middlename;
        let sin = formData.sin;
        let dob = formData.dob;
        let address = formData.address;
        let applicant_confirm = formData.applicant_confirm;
        let applicant_consignment = formData.applicant_consignment;

        let landlord_property = formData.property;


        let formValid = false;


        if (firstName.length <= 0) {
            $(".firstnameerror").text("Kindly enter first name");
            formValid = false;
        } else {
            $(".firstnameerror").text("");
            formValid = true;
        }

        if (lastName.length <= 0) {
            $(".lastnameerror").text("Kindly enter last name");
            formValid = false;
        } else {
            $(".lastnameerror").text("");
            formValid = true;
        }



        if (sin.length <= 0) {
            $(".sinerror").text("Kindly select sin");
            formValid = false;
        } else {
            $(".sinerror").text("");
            formValid = true;
        }

        if (dob.length <= 0) {
            $(".doberror").text("Kindly select date of birth");
            formValid = false;
        } else {
            $(".doberror").text("");
            formValid = true;
        }

        if (address.length <= 0) {
            $(".addresserror").text("Kindly enter valid address");
            formValid = false;
        } else {
            $(".addresserror").text("");
            formValid = true;
        }

        if (typeof applicant_confirm == "undefined") {
            $(".applicant_confirmerror").text("Kindly accept applicant form");
            formValid = false;
        } else {
            $(".applicant_confirmerror").text("");
            formValid = true;
        }

        if (typeof applicant_consignment == "undefined") {
            $(".applicant_consignmentrror").text(
                "Kindly accept agreement form"
            );
            formValid = false;
        } else {
            $(".applicant_consignmentrror").text("");
            formValid = true;
        }


        if (formValid == true) {
            let data = {
                country: country,
                paymentinfo: paymentInfo,
                firstname: firstName,
                middlename: middleName,
                lastname: lastName,
                sin: sin,
                dob: dob,
                address: address,
                landlord_property: landlord_property,
                tenant_first_name: tenant_first_name,
                tenant_last_name: tenant_last_name,
                tenant_email: tenant_email,
            };

            // $.ajax({
            //     url: baseURL + "/landlord/tenant-screening",
            //     headers: {
            //         "X-CSRF-TOKEN": csrfToken,
            //     },
            //     type: "POST",
            //     data: data,
            //     success: function (response) {
            //         if (response.status == 1) {
            //             console.log("success");
            //             $("#tenatmodal").modal("show");
            //             $(".screeningsuccess").show();
            //             $(".screeningsuccess").text(response.message);
            //             setTimeout(function () {
            //                 $(".screeningsuccess").hide();
            //                 $(".screeningsuccess").text("");
            //             }, 5000);
            //         } else {
            //             $(".screeningerror").show();
            //             $(".screeningerror").text(response.message);

            //             setTimeout(function () {
            //                 $(".screeningerror").hide();
            //                 $(".screeningerror").text("");
            //             }, 5000);
            //         }
            //     },
            //     error: function (response) {
            //         console.log(response);
            //     },
            // });
        }
    });

    /***Tenat Form Submission *****/
});

$(document).ready(function(){
    $('#save_cmsblock').on('submit',function(event){
        event.preventDefault();
        var form = $(this);
        var formData = new FormData(form[0]);
        let checkForm=$('input[name="pagename"]').val();

        switch(checkForm){
            case 'about-us':
                let homeStoryFile = $('#home_story')[0].files[0];
                if (homeStoryFile) {
                    formData.append('home_story', homeStoryFile);
                }
                $.ajax({
                    url: baseURL + "/save-cms-block",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                       if(response.status==1){
                       $('.savedmessage ').show();
                       $('.savedmessage ').html(response.message);
                       setTimeout(function(){
                        $('.savedmessage ').hide();
                        $('.savedmessage ').html("")
                         $('#openblock').modal('hide')
                         location.reload();

                       },3000);
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

                break;
            case 'blog':


                $.ajax({
                    url: baseURL + "/save-cms-block",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                       if(response.status==1){
                       $('.savedmessage ').show();
                       $('.savedmessage ').html(response.message);
                       setTimeout(function(){
                        $('.savedmessage ').hide();
                        $('.savedmessage ').html("")
                         $('#openblock').modal('hide')
                         location.reload();

                       },3000);
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
                break;
            case 'testimonial':
                let testimonialData = [];
                // $('.testimonials').each(function(index) {
                //     var desc = $(this).find('textarea[name="testimonial_desc[]"]').val().trim();
                //     var star = $(this).find('input[name="testimonial_star[]"]:checked').val();
                //     var author = $(this).find('input[name="testimonial_author"]').val().trim();
                //     var desg = $(this).find('input[name="testimonial_desg"]').val().trim();

                //     if (desc === '' || star === undefined || star === '' || (author === '' && desg === '')) {
                //         isValid = false;
                //         return false; // Exit each loop early
                //     }
                // });


                // $('.testimonials').each(function(index) {
                //     var clonedData = {
                //         'testimonial_desc': $(this).find('textarea[name="testimonial_desc[]"]').val(),
                //         'testimonial_star': $(this).find('input[name="testimonial_star[]"]:checked').val(),
                //         'testimonial_author': $(this).find('input[name="testimonial_author"]').val(),
                //         'testimonial_desg': $(this).find('input[name="testimonial_desg"]').val()
                //         // Add more fields as needed
                //     };
                //     testimonialData.push(clonedData);
                // });

                // formData.append('testimonial_data', JSON.stringify(testimonialData));
                    $.ajax({
                        url: baseURL + "/save-cms-block",
                        headers: {
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                           if(response.status==1){
                           $('.savedmessage ').show();
                           $('.savedmessage ').html(response.message);
                           setTimeout(function(){
                            $('.savedmessage ').hide();
                            $('.savedmessage ').html("")
                             $('#openblock').modal('hide')
                             location.reload();

                           },3000);
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
                    break;
                    case 'contact-us':
                        $.ajax({
                            url: baseURL + "/save-cms-block",
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                               if(response.status==1){
                               $('.savedmessage ').show();
                               $('.savedmessage ').html(response.message);
                               setTimeout(function(){
                                $('.savedmessage ').hide();
                                $('.savedmessage ').html("")
                                 $('#openblock').modal('hide')
                                // location.reload();

                               },3000);
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
                    break;
        }

        // Check if 'home_story' file input has a file selected




    })
})

let testimonialIndex = 1; // Start from 1 to avoid updating the initial set

function clonetestimonial(event) {
    event.preventDefault();
    // Get the original testimonial div
    var original = document.getElementById('testimonials');

    // Clone the original testimonial div
    var clone = original.cloneNode(true);

    // Update the name attributes to be unique for the cloned element
    let radioButtons = clone.querySelectorAll('input[type="radio"]');
    radioButtons.forEach((radio) => {
        radio.name = `testimonial_star[${testimonialIndex}]`;
    });
    testimonialIndex++;

    // Create the remove button
    var removeButton = document.createElement('button');
    removeButton.innerText = 'Remove';
    removeButton.classList.add('btn', 'btn-danger', 'float-end', 'ms-2');
    removeButton.style = "float: right;margin-bottom: 14px;";
    removeButton.setAttribute('onclick', 'removeTestimonial(this)');

    // Append the remove button next to the "Add More" button in the cloned testimonial div
    var addButton = clone.querySelector('#removebtn');
    addButton.parentNode.insertBefore(removeButton, addButton.nextSibling);

    // Append the cloned testimonial div after the original
    original.parentNode.appendChild(clone);

    // Optionally, you can reset the values of the cloned inputs
    var inputs = clone.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type === 'file' || inputs[i].type === 'text') {
            inputs[i].value = '';
        } else if (inputs[i].type === 'radio') {
            inputs[i].checked = false;
        }
    }

    var textareas = clone.getElementsByTagName('textarea');
    for (var i = 0; i < textareas.length; i++) {
        textareas[i].value = '';
    }
}

function removeTestimonial(button) {
    let testimonial = button.parentNode;
    testimonial.parentNode.removeChild(testimonial);
}

