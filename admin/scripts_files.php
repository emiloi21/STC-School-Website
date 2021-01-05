<!-- JavaScript files-->
    

    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    
    <!-- Main File-->
    <script src="js/front.js"></script>
    
    
    <script>
    $(document).ready(function() {
    $('table.display').DataTable();
    } );
    </script>
    
    <script>
 
    $('#password, #confirm_password').on('keyup', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
      } else 
        $('#message').html('Not Matching').css('color', 'red');
    });
    
    </script>
    
    <script>
    
    function openCity(evt, cityName) {
        
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
        
        for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
        }
        
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>
    
    <script>
    document.onreadystatechange = function () {
      var state = document.readyState
      if (state == 'interactive') {
           document.getElementById('contents').style.visibility="hidden";
      } else if (state == 'complete') {
          setTimeout(function(){
             document.getElementById('interactive');
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('contents').style.visibility="visible";
          },1000);
      }
    }
    
    </script>
 

    <script>
    document.onreadystatechange = function () {
      var state = document.readyState
      if (state == 'interactive') {
           document.getElementById('contents').style.visibility="hidden";
      } else if (state == 'complete') {
          setTimeout(function(){
             document.getElementById('interactive');
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('contents').style.visibility="visible";
          },1000);
      }
    }
    
    </script>
    
    
    <script>
        
        $(document).ready(function() {
          $("#checkAll").on("click", function() {
            $(this)
              .closest("table")
              .find("tbody :checkbox")
              .prop("checked", this.checked)
              .closest("tr")
              .toggleClass("selected", this.checked);
          });
        
          $("tbody :checkbox").on("click", function() {
            // toggle selected class to the checkbox in a row
            $(this)
              .closest("tr")
              .toggleClass("selected", this.checked);
        
            // add selected class on check all
            $(this).closest("table")
              .find("#checkAll")
              .prop("checked",
                $(this)
                  .closest("table")
                  .find("tbody :checkbox:checked").length ==
                  $(this)
                    .closest("table")
                    .find("tbody :checkbox").length
              );
          });
        });
        
        
    </script>