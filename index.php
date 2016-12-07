<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>CPE Pedigree</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800|Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style>

  html,body {
    font-family: 'Kanit', sans-serif;
    width: 100%;
    height: 100%;
    display: table;
    color: #FFF;
  }

  body {
    background: url('img/bg.png');
    background-size: 1024px;
  }

  #title {
    font-size: 6.2vh;
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
    padding: 10px 20px;
    margin: 30px auto;
    background: #FFF;
    color: #333;
  }

  p {
    font-size: 1.9vh;
    margin: 30px auto;
  }

  .blue {
    color: #3BADFF;
  }

  .v-align {
    display: table-cell;
    position: relative;
    height: 100vh;
    width: 100%;
    vertical-align: middle;
    margin:auto;
    box-sizing: border-box;
    padding: 1px;
  }

  .footer {
    font-family: 'Kanit', sans-serif;
    font-size: 1.5vh;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 30px 0;
    font-weight: 100 !important;
  }
  </style>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '215231288903283',
      cookie     : true,  // enable cookies to allow the server to access
      // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });
  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  </script>

  <div class="v-align text-center">
    <div style="margin: 30px;">
      <span id="title"><span class="blue" style="font-weight:400;">CPE</span> PEDIGREE</span>
    </div>
    <div style="margin: 30px;">
      <p>
        เว็บแอพพลิเคชันสำหรับบันทึกข้อมูลนักศึกษาและศิษย์เก่า<br>ภาควิชาวิศวกรรมคอมพิวเตอร์ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี
      </p>
      <button class="btn btn-primary btn-lg" id="facebook_login"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook Login</button>
    </div>
    <div class="footer">
      THIS WEBSITE IS A PART OF <span class="blue">CPE332 DATABASE AND ERP SYSTEMS</span> CLASS OF 2016<br>
      DEVELOPED BY PIYAPHON TRANGJIRASATHIAN, WARAT KAWEEPORNPOJ, SUPANUTH ONGSUK, SIRAPAT PHOLWA AND KRIT PRASARTPORNSIRICHOKE
    </div>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
  $("#facebook_login").click(function(){
    $("#facebook_login").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...')
    FB.login(function(response)
        {
           if (response.authResponse)
           {
             console.log('Welcome!  Fetching your information.... ');
             var access_token = response.authResponse.accessToken;
             FB.api('/me', function(response) {
               console.log(response);
               console.log('Successful login for: ' + response.name);
               //document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';

               $.post("api/login.php", {FacebookID : response.id, FacebookName: response.name}, function(data){
                 console.log(data)
                 if(data.status == "success"){
                   window.location = "home.php";
                 } else if(data.status == "not_found"){
                   window.location = "profile_add.php";
                 }
               })

             });
           }
         });
  })
</script>
</body>
</html>
