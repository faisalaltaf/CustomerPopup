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
  </body>
  </html>


  <script>
  
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
              swal("Good job!", "You clicked the button!", "success");
              window.location.reload();
             }
          },
          error: function(response){
              console.log(response);
              swal("ERROR NOT SEND DATA");
          }
      });
});
      
    


</script>