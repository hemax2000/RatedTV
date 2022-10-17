
<html>
<head >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
<!--SJ-->
    
    <style>
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


.cont_login {
  position: relative;
  width: 640px;
left: 50%;
margin-left: -320px;
  
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


/* ----------------------------------
background text    
------------------------------------
 */

.cont_form_login {
  position: relative;
  opacity: 1;
    margin-top: 30%;
    left:50%;
  width: 320px;
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
    
    <!-- CSS only -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"crossorigin="anonymous">-->
    </head>
    <body > 
   
    
<div class="cotn_principal">

<?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?>
  

      <div class="col_md_login">

        
 
     <form class ="cont_form_login" action = "checkforget.php"method="post">


       <h2>Change Password</h2>

 <input type="text" placeholder="Username" name="username" />
<input type="password" placeholder="New Password" name="pwd"/>

<button class="btn_login" name="login">CHANGE</button>
     <br><br>

  </form>
  
    </div>
    


    
   
    
</div>
        
        </body>
    </html>