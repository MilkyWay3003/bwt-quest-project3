$(function() {      
   
    $('input:checkbox').change(function() {

        var settings = {
            headers: {       
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }
        var id, url, show = 0;

        if (this.checked) {  
            id = this.value;
            url = '/participant' + '/' + id; 
            show = 1; 
        } else {
            id = this.value;
            url = '/participant' + '/' + id; 
            show = 0;           
        } 
            var userShowId = new FormData();
            userShowId.append('_method', 'PUT');
            userShowId.append('show', show);            

            axios.post(url, userShowId, settings)
            .then(function (response) {
              console.log(response);              
            })
            .catch(function (error) {
              console.log(error.response);
            }); 
                   

     //log.innerHTML = show;
    });     
        
});
            