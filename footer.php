
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAvKR6a4n54ev8PtO7BDrpZtAff73UFAnk&sensor=false&libraries=places'></script>
<script src="js/locationpicker.jquery.js"></script>

<script type="text/javascript">
$(document).ready( function(){
    if(window.location.pathname == "/activity.php"){
      $("#activity").addClass("active")
    }
    if(window.location.pathname == "/home.php"){
      $("#home").addClass("active")
    }
    if(window.location.pathname == "/hanging.php"){
      $("#hangingout").addClass("active")
    }
    if(window.location.pathname == "/education.php"){
      $("#education").addClass("active")
    }
    if(window.location.pathname == "/internship.php"){
      $("#internship").addClass("active")
    }
    if(window.location.pathname == "/profile_add.php"){
      $(".navbar-nav").hide()
    }

    //Admin
    if(window.location.pathname == "/manage_stat.php"){
      $("#admin").addClass("active")
      $("#manage_stat").addClass("active")
    }
    if(window.location.pathname == "/manage_profile.php"){
      $("#admin").addClass("active")
      $("#manage_profile").addClass("active")
    }
    if(window.location.pathname == "/manage_activity.php"){
      $("#admin").addClass("active")
      $("#manage_activity").addClass("active")
    }
    if(window.location.pathname == "/manage_edu.php"){
      $("#admin").addClass("active")
      $("#manage_education").addClass("active")
    }
    if(window.location.pathname == "/manage_family.php"){
      $("#admin").addClass("active")
      $("#manage_family").addClass("active")
    }
    if(window.location.pathname == "/manage_admin.php"){
      $("#admin").addClass("active")
      $("#manage_admin").addClass("active")
    }

})
</script>
