<footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy; Onestop Procurement <?php echo date('Y');?>.</strong> All rights reserved.
</footer>
    </div><!-- ./wrapper -->

    
<script src="../vendor/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="../vendor/plugins/jQuery/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            lengthMenu: [ [50, 100, -1], [50, 100, 'All'], ],
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
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
<script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
	  $('body').on('click', '#check_all', function () {
	    if ($(this).hasClass('allChecked')) {
	        $('input[type="checkbox"]', '#example').prop('checked', false);
	    } else {
	        $('input[type="checkbox"]', '#example').prop('checked', true);
	    }
	    $(this).toggleClass('allChecked');
	  })
	  /*let myCheck=document.querySelectorAll('.cname')[0];
		  myCheck.addEventListener('click', (e)=> {
		    if (e.target.className.indexOf('clicked') === -1) {
		      e.target.className += ' icheckbox_flat-blue';
		    } else {
		      e.target.className = e.target.className.replace(' icheckbox_flat-blue', '');
		    }
		  })*/
	});
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
<script>
    function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        //var enteredtext = $('#text').val();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        //$('#text').html(enteredtext);
    }
</script>
<script src="../vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../vendor/plugins/jszip/jszip.min.js"></script>
<script src="../vendor/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../vendor/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../vendor/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../vendor/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../vendor/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../vendor/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="../vendor/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="../vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="../vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../vendor/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../vendor/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="../vendor/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script> -->
    <!-- Slimscroll -->
    <script src="../vendor/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../vendor/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../vendor/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../vendor/dist/js/pages/dashboard.js" type="text/javascript"></script>
<script src="../vendor/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../vendor/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>