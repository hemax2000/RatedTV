
<html>
<head >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--SJ-->
    <script>
  
function cambiar_login() {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
document.querySelector('.cont_form_login').style.display = "block";
document.querySelector('.cont_form_sign_up').style.opacity = "0";               

setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
  
setTimeout(function(){    
document.querySelector('.cont_form_sign_up').style.display = "none";
},200);  
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";
  
setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);  

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);  


}    



function ocultar_login_sign_up() {

document.querySelector('.cont_forms').className = "cont_forms";  
document.querySelector('.cont_form_sign_up').style.opacity = "0";               
document.querySelector('.cont_form_login').style.opacity = "0"; 

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);  
  
  }


    </script>
    <style>
    /* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/
.alert {
      position: relative;
      padding: 1rem 1rem;
      margin-bottom: 1rem;
      border: 1px solid transparent;
      border-radius: 0.25rem;
    }
    .alert-danger {
      color: #842029;
      background-color: #f8d7da;
      border-color: #f5c2c7;
    }.alert-danger .alert-link {
      color: #6a1a21;
    }
    .alert-success {
      color: #0f5132;
      background-color: #d1e7dd;
      border-color: #badbcc;
    }
    .alert-success .alert-link {
      color: #0c4128;
    }

* {
  margin: 0px auto;
  padding: 0px;
  text-align: center;
  font-family: 'Open Sans', sans-serif;
}

.cotn_principal {
  position: absolute;
  width: 100%;
  height: 100%;
 background-size: cover; 
    
background-image: linear-gradient(to bottom left ,black,#131a20);


}

        input{
            background-color: #131a20;
        }
.cont_centrar {
  position: relative;
  float: left;
   width: 100%;
   
}

.cont_login {
  position: relative;
  width: 640px;
left: 50%;
margin-left: -320px;
  
}

.cont_back_info {  
   /* المستطيل اللي ورا */
position: absolute;
  float: left;
  width: 640px;
  height: 280px;
overflow: hidden;
  background-color: #131a20;
 display: block;

margin-top: 200px;
box-shadow: 1px 10px 30px -10px rgba(0,0,0,0.5);
}

.cont_forms {
/*المربع الاسود*/
       background-position: center;
  position: absolute;
  overflow: hidden;
 top: 200px;
left: 0px;
  width: 320px;
  height: 280px;
  background-color: #000;
transition: all 0.5s;
}

.cont_forms_active_login {
box-shadow: 1px 10px 30px -10px rgba(0,0,0,0.5);
  height: 420px;  
top:130px;
left: 0px;
transition: all 0.5s;

}

.cont_forms_active_sign_up {
box-shadow: 1px 10px 30px -10px rgba(0,0,0,0.5);
  height: 420px;  
top:130px;
left:320px;

transition: all 0.5s;
}

.cont_img_back_grey {
  position: absolute;
  width: 950px;
top:-80px;
  left: -116px;
}
@keyframes animar_fondo {
  from { 
transform: scale(2) translate(60px); }
  to { 
transform: scale(1) translate(0px); }
}
.cont_img_back_grey > img {
  width: 100%;
     filter: grayscale(100%);
opacity: 0.2;
animation-name: animar_fondo;
  animation-duration: 20s;
animation-timing-function: linear;
animation-iteration-count: infinite;
animation-direction: alternate;
    filter: blur(2px);
}

.cont_img_back_ {
  position: absolute;
  width: 950px;
top:-80px;
  left: -116px;
}

.cont_img_back_ > img {
  width: 100%;
opacity: 0.3;
animation-name: animar_fondo;
animation-duration: 20s;
animation-timing-function: linear;
animation-iteration-count: infinite;
animation-direction: alternate;
    filter: blur(2px);
}

.cont_forms_active_login > .cont_img_back_ {
top:0px;  
transition: all 0.5s;
}

.cont_forms_active_sign_up > .cont_img_back_ {
top:0px;  
left: -435px;

transition: all 0.5s;
}
 

.cont_info_log_sign_up {
position: absolute;
  width: 640px;
  height: 280px;
  margin-top: 300px;
z-index: 1;
} 

.col_md_login {
  position: relative;
  float: left;
  width: 50%;
}

.col_md_login > h2 {
  font-weight: 400;
margin-top: 70px;
    color: #757575;
}

.col_md_login > p {
 font-weight: 400;
margin-top: 15px;
width: 80%;
    color: #37474F;
}

.btn_login { 
background-color: #26C6DA;
  border: none;
  padding: 10px;
width: 200px;
border-radius:3px;
box-shadow: 1px 5px 20px -5px rgba(0,0,0,0.4);
  color: #fff;
margin-top: 10px;
cursor: pointer;
}

.col_md_sign_up {
  position: relative;
  float: left;
  width: 50%;  
}

.cont_ba_opcitiy > h2 {
  font-weight: 400;
  color: #fff;
}

.cont_ba_opcitiy > p {
 font-weight: 400;
margin-top: 15px;
 color: #fff;
}



.cont_ba_opcitiy {
    /*المربع اللي داخل */
  position: relative;
  background-color: rgba(120, 144, 156, 0.55);
  width: 80%;
  border-radius:3px ;
margin-top: -30px;
padding: 15px 0px;
}

.btn_sign_up { 
background-color: #ef5350;
  border: none;
  padding: 10px;
width: 200px;
border-radius:3px;
box-shadow: 1px 5px 20px -5px rgba(0,0,0,0.4);
  color: #fff;
margin-top: 10px;
cursor: pointer;
}
.cont_forms_active_sign_up {
z-index: 2;  
}

@keyframes identifier {
  from { 

transform: scale(1); }
  to { 

transform: scale(1.5); }
}
.cont_form_login {
  position: absolute;
  opacity: 0;
display: none;
  width: 320px;
transition: all 1s;
}

.cont_forms_active_login {
z-index: 2;  
}

.cont_form_sign_up {
  position: absolute;
  width: 320px;
float: left;
  opacity: 0;
display: none;
transition: all 1s;
}

  
.cont_form_sign_up > input {
text-align: left;
  padding: 15px 5px;
margin-left: 10px;
margin-top: 20px;
  width: 260px;
border: none;
    color: aliceblue;}

.cont_form_sign_up > h2 {
margin-top: 50px; 
font-weight: 400;
  color: #757575;
}


.cont_form_login > input {
  padding: 15px 5px;
margin-left: 10px;
margin-top: 20px;
  width: 260px;
border: none;
text-align: left;
  color: aliceblue;;
}

.cont_form_login > h2 {
margin-top: 110px; 
font-weight: 400;
  color: #757575;
}
.cont_form_login > a,.cont_form_sign_up > a  {
  color: #757575;
    position: relative;
    float: left;
    margin: 10px;
margin-left: 30px;
}
        
    /* My class */

    </style>
    </head>
    <body > 
    
    
<div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p>I have an account!</p>
   <button href="review.html" class="btn_login" onclick="cambiar_login()">LOGIN</button>
 
        </a>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>SIGN UP</h2>

  
  <p>I'm a new watcher!</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://i0.wp.com/thebutlercollegian.com/wp-content/uploads/2019/03/netflix-image.jpg?w=1920&ssl=1"alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://i0.wp.com/thebutlercollegian.com/wp-content/uploads/2019/03/netflix-image.jpg?w=1920&ssl=1" alt="" />
       </div>
    
       
       <form class ="cont_form_login" action="checkLogin.php" method="post">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="fa fa-close">
</i></a>

       <h2>LOGIN</h2>

 <input type="text" placeholder="Username" name="username"  />
<input type="password" placeholder="Password" name="pwd"/>

<button class="btn_login" onclick="cambiar_login()" name="login">LOGIN</button>
     <br><br>
     
     <a href="forget.php">Forget password?</a>
  </form>
  

	<form class="cont_form_sign_up" action="checkSignup.php" method="post">

<a href="#" onclick="ocultar_login_sign_up()"><i class="fa fa-close"></i></a>
     <h2>SIGN UP</h2>
<input type="text" placeholder="Email" name="Semail" />
<input type="text" placeholder="User" name="suser" />
<input type="password" placeholder="Password" name="spass"/>
<input type="password" placeholder="Confirm Password" name="respass" />
<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
       </form>
       

    </div>

    <?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?>
  </div>
 </div>
</div>
        </body>
    </html>