
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/scicertificate/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/scicertificate/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Summernote -->
<script src="/scicertificate/plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/scicertificate/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/scicertificate/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/scicertificate/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/scicertificate/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/scicertificate/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/scicertificate/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/scicertificate/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/scicertificate/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/scicertificate/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="/scicertificate/plugins/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="/scicertificate/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="/scicertificate/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/scicertificate/dist/js/pages/dashboard.js"></script>



<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      // responsive มือถือ
      // lengthChange จำนวนข้อมูลในแต่ละหน้า
      // autoWidth กำหนดความกว้างอัตโนมัติ
      // buttons export
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["csv", "print"]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
