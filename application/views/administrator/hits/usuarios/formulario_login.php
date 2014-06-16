<?php
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
<style type="text/css">
body{background: #EE8B00;}
html,body{
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.avatar{
    width: 100px;height: 100px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #aaa;
    background-size: cover;
}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box input[type="text"]{
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}
</style>
<div class="container">
    <div class="login-container">

        <div id="output"><div id="srv-resp" class="text-center">
        <?= $vcMsjSrv; ?>
    </div></div>
        <div class="avatar"></div>
        <div class="form-box">

            <form id="form-login-access" action="aut/autenticar" enctype="application/x-www-form-urlencoded" method="post" target="srv-resp">
                <input id="nombreUsuario" name="nombreUsuario" type="text" placeholder="Nombre de usuario">
                <input type="password" id="passwordUsuario" name="passwordUsuario" placeholder="Contraseña">
                <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Ingresar</button>
                <input type="hidden" id="vcForm" name="vcForm" value="<?=$vcFormName;?>">
            </form>
        </div>
    </div>
    
</div>

<script type="text/javascript">
    $('document').ready(function() {
        var passField = $('#passwordUsuario')
        passField.bind('keyup', function(event){
            if(event.keyCode == '13') {
                $('#btnSubmit').click();
            }
        });
        $('#form-login-access').viaAjax({
            'prepVars': function() {
                if(passField.val()!='') {
                    passField.val($.md5(passField.val()));
                }
            }
        });
    });
</script>
