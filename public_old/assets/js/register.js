$(document).ready(function(){
    $('#country').select2({
        placeholder: 'Select Country'
    });
    $('#state').select2({
        placeholder: 'Select State'
    });
})

let getTabs=document.querySelectorAll('ul.nav.nav-pills > li');
getTabs.forEach(function(e){
    e.addEventListener('click',function(){
        let getdataattr=this.getAttribute('role')
        if(getdataattr=="landlord"){
            document.getElementById('user_type').value=getdataattr;
        }else if(getdataattr=="tenant"){
            document.getElementById('user_type').value=getdataattr;
        }
    })

})


function getStates(elem) {
    let selectedValue = elem.options[elem.selectedIndex].value;
    $('#state').html("<option value=''>Select State</option>");
    $.ajax({
        url:  baseURL+'/state',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token as a header
        },
        data: {
            country_id: selectedValue
        },
        success: function(response) {
            // Handle the successful response here

           if(response.status==1){
            let getdata=response.data;
            let html="";
                $.each(getdata,function(i,e){
                    html+=`<option value="${i}">${e}</option>`;
                })
                $('#state').append(html);

           }
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error(error);
        }
    });
}

