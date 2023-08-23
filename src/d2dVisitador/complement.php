<!-- jQuery -->
<script src="/d2dVisitador/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/d2dVisitador/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/d2dVisitador/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/d2dVisitador/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline
<script src="/d2dVisitador/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="/d2dVisitador/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/d2dVisitador/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/d2dVisitador/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/d2dVisitador/plugins/moment/moment.min.js"></script>
<script src="/d2dVisitador/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/d2dVisitador/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/d2dVisitador/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/d2dVisitador/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/d2dVisitador/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/d2dVisitador/dist/js/demo.js"></script>
<script src="https://kit.fontawesome.com/56ef72515a.js" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="/d2dVisitador/dist/js/pages/dashboard.js"></script>-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<link rel="icon" type="image/x-icon" href="/d2dVisitador/Modules/ModulesImage/door2door.png">


<script>
    
    history.forward();    
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
    window.onhashchange=function(){
       // window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button";
    }
    
    window.addEventListener('popstate', function(event) {
	    history.pushState(null, null, window.location.pathname);
	    history.pushState(null, null, window.location.pathname);
	}, false);

</script>


