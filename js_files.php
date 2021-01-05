<!-- Javascript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
     
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
    
    <script>
 
    $('#passwordz, #confirm_passwordx').on('keyup', function () {
      if ($('#passwordz').val() == $('#confirm_passwordx').val()) {
        $('#message').html('Matching').css('color', 'green');
      }else{
        $('#message').html('Not Matching').css('color', 'red');
    }});
    
    $('#passwordz2, #confirm_passwordx2').on('keyup', function () {
      if ($('#passwordz2').val() == $('#confirm_passwordx2').val()) {
        $('#message').html('Matching').css('color', 'green');
      }else{
        $('#message').html('Not Matching').css('color', 'red');
    }});
    
    </script>
    
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    
   	<script> 
		document.onreadystatechange = function() { 
			if (document.readyState !== "complete") { 
				document.querySelector( 
				"body").style.visibility = "hidden"; 
				document.querySelector( 
				"#loader").style.visibility = "visible"; 
			} else { 
				document.querySelector( 
				"#loader").style.display = "none"; 
				document.querySelector( 
				"body").style.visibility = "visible";
                
			} 
		}; 
	</script>
    
    <script>
      $(document).ready(function() {
          $("body").on("contextmenu", function(e) {
              return false;
            });
        });
    </script>
    
    