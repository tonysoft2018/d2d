<?php header("Content-Type: text/html;charset=utf-8"); ?>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/d2dSocio/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/d2dSocio/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/d2dSocio/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/d2dSocio/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/d2dSocio/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/d2dSocio/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/d2dSocio/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="/d2dSocio/plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<link rel="icon" type="image/x-icon" href="/d2dSocio/Modules/ModulesImage/door2door.png">

<style>
   
    textarea {
        resize: none;   
    }
    .obligatorio {
        background:#D1F0F5;
    }
    .cursor{
        cursor: pointer;
    }
    
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    input[type=number] { -moz-appearance:textfield; }
    .zoom {
        transition: transform .2s; 
    }
    
    .zoom:hover {
        transform: scale(1.5); 
    }
    .form-control{        
        border-radius: 15px;
        border-width: 3px;       
    }
    

   
    .btn-primary {
        background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
    }
    
    .btn{
        border-radius:10px;
    }
 
    
    .btn-secondary  {
        background: #5a569a;
    } 
    .btn-secondary:hover  {
        background: #fff;
        color:black;
    } 
    


    .content-wrapper{
        background: #ffff;
        
        
    }
   
        
    .thead-morado{
        background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
        color:#fff;
        border-radius:10px;
    }
    .titulo-morado{
        background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
        color:#fff;
        border-radius:20px;
        margin:10px;
    }

    .active{
        background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
        border-image: linear-gradient(45deg, #5a569a,  #b75192, #ee9424) ;
    }

    .btn-outline-primary:hover{
        
        background: linear-gradient(to right, #5a569a, #b75192,  #ee9424);
       
        
    }
    .nav-sidebar>.nav-item>.nav-link:active{
        color:#fff;
    }
    a {color: #fff;  text-decoration: none;}
    a:hover {color: #fff;  text-decoration: none;}
    a:visited {color: #fff;  text-decoration: none;}

    .opacidad {                
        opacity: .4;               
        height: 100%;
        width: 100%;
        position: absolute;
        top: 10px;               
        padding-top: 1em;               
        pointer-events: none;               
    }
    .body-main {
        margin: auto;
        padding: 50px;
        font-family: 'Arial', sans-serif; 
        color: #33475b;    
    }      
    .center {
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        

    }

    .opacidad {                
        opacity: .4;               
        height: 100%;
        width: 100%;
        position: absolute;
        top: 10px;               
        padding-top: 1em;               
        pointer-events: none;               
    }
    .body-main {
        margin: auto;
        padding: 50px;
        font-family: 'Arial', sans-serif; 
        color: #33475b;    
    }      
    .center {
        height: 800px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
        
    
</style>