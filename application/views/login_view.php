<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
<!-- CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/floating-labels.css">
</head>
<body>
    <form id="logForm" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/img/hogwarts.png" alt="" width="182" height="182">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      </div>
      <div class="form-label-group">
        <input name="email" class="form-control" placeholder="Email address" required="" autofocus="" type="email">
        <label for="inputEmail">Email address</label>
      </div>
      <div class="form-label-group">
        <input name="password" class="form-control" placeholder="Password" required="" type="password">
        <label for="inputPassword">Password</label>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input value="remember-me" type="checkbox"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"><span id="logText"></span></button>
      <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
        <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
        <span id="message"></span>
      </div>
      <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
    </form>
</body>
<!--JS-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#logText').html('Sign in');
        $('#logForm').submit(function(e){
          e.preventDefault();
          $('#logText').html('Validando...');
          var url = '<?php echo base_url(); ?>';
          var user = $('#logForm').serialize();
          var login = function(){
            $.ajax({
              type: 'POST',
              url: url + 'Login/login',
              dataType: 'json',
              data: user,
              success:function(response){
                $('#message').html(response.message);
                $('#logText').html('Ingresar');
                if(response.error){
                  $('#responseDiv').removeClass('alert alert-success').addClass('alert alert-danger').show();
                } else {
                  
                  $('#logForm')[0].reset();
                  setTimeout(function(){
                    location.reload();
                  }, 0);
                }
              }
            });
          };
          setTimeout(login, 0);
        });
        $(document).on('click', '#clearMsg', function(){
          $('#responseDiv').hide();
        });
      });
    </script>
</body>
</html>
