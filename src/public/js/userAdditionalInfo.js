function validateImage() {
    var formData = new FormData();
    
 
    var file = document.getElementById("uploadPhoto").files[0];
    var doc = document.getElementById("output");
    doc.innerHTML = "";
 
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {        
        doc.innerHTML = "Please select a valid image file";
        document.getElementById("uploadPhoto").value = '';     
        return false;
    }

    if (file.size > 1024000) {        
        doc.innerHTML = "Image size should be less than 1 Mb";
        document.getElementById("uploadPhoto").value = '';       
        return false;
    }

    return true;
}

$(document).on('submit', '#userAdditionalInfo', function (event) {
     event.preventDefault();
     var userAdditionalInfo = new FormData();
     userAdditionalInfo.append('_method', 'PUT');
     userAdditionalInfo.append('company', document.getElementById('inputCompany').value);
     userAdditionalInfo.append('position', document.getElementById('inputPosition').value);
     userAdditionalInfo.append('aboutme', document.getElementById('inputAboutMe').value);

     var image = document.getElementById('uploadPhoto').files[0];     
     if(image !== undefined) {      
         userAdditionalInfo.append('photo', image); 
     }

     var settings = {
       headers: {
         'Content-Type': 'multipart/form-data',
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     };

     var url = document.getElementById('userAdditionalInfo').action;   

     axios.post(url, userAdditionalInfo, settings)
       .then(function (response) {
           $('#form-container').html(response.data);
       })
       .catch(function (error) {          
          if (!error.response.hasOwnProperty('data')) {
            console.log(error.response);
            return;
          }
          setErrors(error.response.data);
       });         

  });

  function setErrors(data) {
    $('.form-errors').remove();

    for(var field in data) {
        var errors = document.createElement("small");

        $(errors)
            .addClass('form-errors')
            .text(data[field]);

        $('#' + field).after(errors);
    }
}






