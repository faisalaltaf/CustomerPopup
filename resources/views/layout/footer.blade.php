</main>
          </div>
          <div id="PolarisPortalsContainer">
            <div data-portal-id="popover-Polarisportal3"></div>
            <div data-portal-id="modal-Polarisportal1">
              <div></div>
            </div>
            <div data-portal-id="Polarisportal2">
              <div class="Polaris-Frame-ToastManager" aria-live="assertive"></div>
            </div>
          </div>
        </div>
      </div>,<div></div>,<div class="Polaris-Frame-ToastManager" aria-live="assertive"></div>
      
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </body>
  </html>


  <script>

//   function cart_page(){
//       $('.input_show_page').val
//       console.log($('.input_show_page').value)
//   }
  $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})

$(".js-example-tags").select2({
  tags: true
});  
 
 $('select').select2({
  createTag: function (params) {
    var term = $.trim(params.term);

    if (term === '') {
      return null;
    }

    return {
      id: term,
      text: term,
      newTag: true // add additional parameters
    }
  }
}); 
$('select').select2({
  insertTag: function (data, tag) {
    // Insert the tag at the end of the results
    data.push(tag);
  }
});
  
$('select').select2({
  createTag: function (params) {
    // Don't offset to create a tag if there is no @ symbol
    if (params.term.indexOf('@') === -1) {
      // Return null to disable tag creation
      return null;
    }

    return {
      id: params.term,
      text: params.term
    }
  }
});  
  
  
$("form#data_form").submit(function(event) {
  event.preventDefault();    
    var formData = new FormData(this);
    //   console.log(formData)     
  $.ajax({
          type:'POST',
          url: "/createaudiencelist",
          data:formData,
          contentType: false,
          processData: false,
          success: (response) => {
             if (response) {
              this.reset();
              console.log((JSON.stringify(response) =='success'))
              
             
              swal("Good job!", "You clicked the button!", "success");
              window.location.reload();     
            //  
            
             }
          },
          error: function(response){
              console.log(response);
              swal("ERROR NOT SEND DATA");
          }
      });
});
      
    


</script>