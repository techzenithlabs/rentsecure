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

function downloadReport(filePath) {
    // Open a new window or tab with the file download URL
    let storedPath=baseURL+'/storage/app/';
    let filefullPath=storedPath+filePath;
    window.location.href=filefullPath;
    //window.open(filefullPath, '_blank');
}

let paymentInfo=document.querySelectorAll('.payInfo-sec > ul > li');
paymentInfo.forEach(function(e,i){
    e.addEventListener('click',function(event){
        event.preventDefault();


        let checkinfo=this.getAttribute('data-info');
       document.getElementById('paymentinfo').value=checkinfo

    })
})


$(document).ready(function(){
$('#formstep3').on('submit',function(event){

    $('.screeningsuccess').hide();
    $('.screeningsuccess').text('');
    $('.screeningerror').hide();
    $('.screeningerror').text('');
     // Get all form data
    // Get serialized array
    var serializedArray = $(this).serializeArray();

    // Convert array to object
    var formData = {};
    $.each(serializedArray, function() {
        formData[this.name] = this.value;
    });
    let country=formData.country;
    let paymentInfo=formData.paymentinfo;
    let firstName=formData.firstname;
    let lastName=formData.lastname;
    let middleName=formData.middlename;
    let sin=formData.sin;
    let dob=formData.dob;
    let address=formData.address;
    let applicant_confirm=formData.applicant_confirm;
    let applicant_consignment=formData.applicant_consignment;


    let formValid=false;
    if(paymentInfo===null){
        $('.paymentinfoerror').text("kindly Go back and select payment info (Landlord /Tenant)")
        formValid=false;
    }else{
        $('.paymentinfoerror').text("")
        formValid=true;
    }


    if(country===null){
        $('.countryerror').text("kindly Go back and Select country (USA / Canada)")
        formValid=false;
    }else{
        $('.countryerror').text("")
        formValid=true;
    }


    if(firstName.length<=0){
        $('.firstnameerror').text("Kindly enter first name");
        formValid=false;
    }else{
        $('.firstnameerror').text("");
        formValid=true;
    }


    if(lastName.length<=0){
        $('.lastnameerror').text("Kindly enter last name");
        formValid=false;
    }else{
        $('.lastnameerror').text("");
        formValid=true;
    }


    if(middleName.length<=0){
        $('.middlenameerror').text("Kindly enter middle name");
        formValid=false;
    }else{
        $('.middlenameerror').text("");
        formValid=true;
    }


    if(sin.length<=0){
        $('.sinerror').text("Kindly select sin");
        formValid=false;
    }else{
        $('.sinerror').text("");
        formValid=true;
    }


    if(dob.length<=0){
        $('.doberror').text("Kindly select date of birth");
        formValid=false;
    }else{
        $('.doberror').text("");
        formValid=true;
    }

    if(address.length<=0){
        $('.addresserror').text("Kindly enter valid address");
        formValid=false;
    }else{
        $('.addresserror').text("");
        formValid=true;
    }



    if(typeof(applicant_confirm)=='undefined'){
        $('.applicant_confirmerror').text("Kindly accept applicant form");
        formValid=false;
    }else{
        $('.applicant_confirmerror').text("");
        formValid=true;
    }


    if(typeof(applicant_consignment)=='undefined'){

        $('.applicant_consignmentrror').text("Kindly accept agreement form");
        formValid=false;
    }else{
        $('.applicant_consignmentrror').text("");
        formValid=true;
    }

    if(formValid==false){
        event.preventDefault();
    }else{
        return true;
    }


})

$('#formstep4').on('submit',function(event){
    event.preventDefault();
    $('.screeningsuccess').hide();
    $('.screeningsuccess').text('');
    $('.screeningerror').hide();
    $('.screeningerror').text('');
     // Get all form data
    // Get serialized array
    var serializedArray = $(this).serializeArray();

    // Convert array to object
    var formData = {};
    $.each(serializedArray, function() {
        formData[this.name] = this.value;
    });



    let country=formData.country;
    let paymentInfo=formData.paymentinfo;
    let firstName=formData.firstname;
    let lastName=formData.lastname;
    let middleName=formData.middlename;
    let sin=formData.sin;
    let dob=formData.dob;
    let address=formData.address;
    let applicant_confirm=formData.applicant_confirm;
    let applicant_consignment=formData.applicant_consignment;

    let landlord_property=formData.property;
    let tenant_first_name=formData.tenant_first_name;
    let tenant_last_name=formData.tenant_last_name;
    let tenant_email=formData.tenant_email;


    let formValid=false;
    if(paymentInfo===null){
        $('.paymentinfoerror').text("kindly Go back and select payment info (Landlord /Tenant)")
        formValid=false;
    }else{
        $('.paymentinfoerror').text("")
        formValid=true;
    }


    if(country===null){
        $('.countryerror').text("kindly Go back and Select country (USA / Canada)")
        formValid=false;
    }else{
        $('.countryerror').text("")
        formValid=true;
    }


    if(firstName.length<=0){
        $('.firstnameerror').text("Kindly enter first name");
        formValid=false;
    }else{
        $('.firstnameerror').text("");
        formValid=true;
    }


    if(lastName.length<=0){
        $('.lastnameerror').text("Kindly enter last name");
        formValid=false;
    }else{
        $('.lastnameerror').text("");
        formValid=true;
    }


    if(middleName.length<=0){
        $('.middlenameerror').text("Kindly enter middle name");
        formValid=false;
    }else{
        $('.middlenameerror').text("");
        formValid=true;
    }


    if(sin.length<=0){
        $('.sinerror').text("Kindly select sin");
        formValid=false;
    }else{
        $('.sinerror').text("");
        formValid=true;
    }


    if(dob.length<=0){
        $('.doberror').text("Kindly select date of birth");
        formValid=false;
    }else{
        $('.doberror').text("");
        formValid=true;
    }

    if(address.length<=0){
        $('.addresserror').text("Kindly enter valid address");
        formValid=false;
    }else{
        $('.addresserror').text("");
        formValid=true;
    }



    if(typeof(applicant_confirm)=='undefined'){
        $('.applicant_confirmerror').text("Kindly accept applicant form");
        formValid=false;
    }else{
        $('.applicant_confirmerror').text("");
        formValid=true;
    }


    if(typeof(applicant_consignment)=='undefined'){

        $('.applicant_consignmentrror').text("Kindly accept agreement form");
        formValid=false;
    }else{
        $('.applicant_consignmentrror').text("");
        formValid=true;
    }

    if(landlord_property==""){
        $('.propertyerror').text("Kindly select property")
        formValid=false;
    }else{
        $('.propertyerror').text('')
        formValid=true;
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
    if(formValid==true){
        let data={
            country:country,
            paymentinfo:paymentInfo,
            firstname:firstName,
            middlename:middleName,
            lastname:lastName,
            sin:sin,
            dob:dob,
            address:address,
            landlord_property:landlord_property,
            tenant_first_name:tenant_first_name,
            tenant_last_name:tenant_last_name,
            tenant_email:tenant_email,
        }

        $.ajax({
            url: baseURL + "/landlord/tenant-screening",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            type: "POST",
            data: data,
            success: function (response) {
                if(response.status==1){
                    console.log("success")
                    $('#tenatmodal').modal('show');
                    $('.screeningsuccess').show();
                    $('.screeningsuccess').text(response.message);
                    setTimeout(function(){
                        $('.screeningsuccess').hide();
                        $('.screeningsuccess').text('');
                    },5000)

                }else{
                    $('.screeningerror').show();
                    $('.screeningerror').text(response.message)

                    setTimeout(function(){
                        $('.screeningerror').hide();
                        $('.screeningerror').text('');
                    },5000)
                }
            },
            error: function (response) {
              console.log(response)

            },
        });

    }





})
})

