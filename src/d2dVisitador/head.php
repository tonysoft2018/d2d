<?php header("Content-Type: text/html;charset=utf-8"); ?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/d2dVisitador/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/d2dVisitador/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/d2dVisitador/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/d2dVisitador/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/d2dVisitador/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/d2dVisitador/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/d2dVisitador/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="/d2dVisitador/plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


<link rel="icon" type="image/x-icon" href="/d2dVisitador/Modules/ModulesImage/door2door.png">
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

    .custom-input-file {
        border-radius: 15px;
        background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        margin: 0 auto 0;
        min-height: 20px;
        overflow: hidden;
        padding: 10px;
        position: relative;
        text-align: center;

    }

    .custom-input-file .input-file {
        border-radius: 15px;
        border: 10000px solid transparent;
        cursor: pointer;
        font-size: 10000px;
        margin: 0;
        opacity: 0;
        outline: 0 none;
        padding: 0;
        position: absolute;
        right: -1000px;
        top: -1000px;
    }
            
    
</style>
	