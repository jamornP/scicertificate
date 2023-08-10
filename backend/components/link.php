<link rel="icon" type="image/png" sizes="16x16" href="/parttime/favicons/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="/parttime/favicons/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="57x57" href="/parttime/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/parttime/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/parttime/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/parttime/favicons/apple-touch-icon-76x76.png">
<link rel="icon" type="image/png" sizes="96x96" href="/parttime/favicons/apple-touch-icon-96x96.png">
<link rel="apple-touch-icon" sizes="114x114" href="/parttime/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/parttime/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/parttime/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/parttime/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/parttime/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="/parttime/favicons/android-icon-192x192.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/scicertificate/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/scicertificate/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/scicertificate/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/scicertificate/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="/scicertificate/plugins/summernote/summernote-bs4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/scicertificate/dist/css/adminlte.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/scicertificate/plugins/daterangepicker/daterangepicker.css">
<!-- bs-stepper -->
<link rel="stylesheet" href="/scicertificate/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- icheck-bootstrap -->
<link rel="stylesheet" href="/scicertificate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/scicertificate/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/scicertificate/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- jQuery -->
<script src="/scicertificate/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="/scicertificate/theme/css/toastr.min.css">
<script src="/scicertificate/theme/js/toastr.min.js"></script>
<script>
  function alertSuccess(massage, url) {
    $(function() {
      toastr.options.onHidden = function() {
        window.location.href = url;
      }
      toastr.success(massage, 'Success', {
        timeOut: 2000
      })
    })
  }
  function alertError(massage) {
    $(function() {
      toastr.error(massage, 'Error', {
        timeOut: 2000
      })
    })
  }
</script>