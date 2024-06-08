$(document).ready(function(){
    $('#country').select2({
        placeholder: 'Select Country'
    });
    $('#state').select2({
        placeholder: 'Select State'
    });
    $('#filename').hide();
    $('#filename').html('');


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

document.getElementById('uploadBtn').addEventListener('change', function(event) {
    const files = event.target.files;
    const fileList = document.getElementById('fileList');
    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'image/gif'];

    fileList.innerHTML = ''; // Clear any existing file names
    $('.invalid-file').hide();
    $('.invalid-file').html('')

    for (let i = 0; i < files.length; i++) {
        const file = files[i];

        // Check if the file type is allowed
        if (!allowedTypes.includes(file.type)) {
            $('.invalid-file').show()
            $('.invalid-file').html('File type not allowed: ' + file.name)
            continue;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            const div = document.createElement('div');
            div.classList.add('file-item');

            // Create file name text
            const fileName = document.createElement('p');
            fileName.textContent = file.name;
            div.appendChild(fileName);

            // Check if file is an image


            fileList.appendChild(div);
        };

        reader.readAsDataURL(file);
    }
});



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




