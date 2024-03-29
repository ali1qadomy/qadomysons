 <!-- All Jquery -->

 <!-- ============================================================== -->
 <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap tether Core JavaScript -->
 <script src="{{ asset('admin/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
 <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
 <!-- slimscrollbar scrollbar JavaScript -->
 <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
 <!--Wave Effects -->
 <script src="{{ asset('admin/js/waves.js') }}"></script>
 <!--Menu sidebar -->
 <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
 <!--stickey kit -->
 <script src="{{ asset('admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
 <!--Custom JavaScript -->
 <script src="{{ asset('admin/js/custom.min.js') }}"></script>
 <!-- ============================================================== -->
 <!-- This page plugins -->
 <!-- ============================================================== -->
 <!--sparkline JavaScript -->
 <script src="{{ asset('admin/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
 <!--morris JavaScript -->
 <script src="{{ asset('admin/assets/plugins/morrisjs/morris.min.js') }}"></script>
 <script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js') }}"></script>
 <!-- Chart JS -->
 <script src="{{ asset('admin/js/dashboard1.js') }}"></script>
 <!-- ============================================================== -->
 <!-- This is data table -->
 <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <!-- start - This is for export functionality only -->


 <!-- -->
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <!-- end - This is for export functionality only -->
 <script>
     $(document).ready(function() {
         $('#myTable').DataTable();
         $(document).ready(function() {
             var table = $('#example').DataTable({
                 "columnDefs": [{
                     "visible": false,
                     "targets": 2
                 }],
                 "language": {
            "url": "cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
        },
                 "order": [
                     [2, 'asc']
                 ],

                 "displayLength": 25,
                 "drawCallback": function(settings) {
                     var api = this.api();
                     var rows = api.rows({
                         page: 'current'
                     }).nodes();
                     var last = null;
                     api.column(2, {
                         page: 'current'
                     }).data().each(function(group, i) {
                         if (last !== group) {
                             $(rows).eq(i).before(
                                 '<tr class="group"><td colspan="5">' + group +
                                 '</td></tr>');
                             last = group;
                         }
                     });
                 },

             });
             // Order by the grouping
             $('#example tbody').on('click', 'tr.group', function() {
                 var currentOrder = table.order()[0];
                 if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                     table.order([2, 'desc']).draw();
                 } else {
                     table.order([2, 'asc']).draw();
                 }
             });
         });
     });
     $('#example23').DataTable({
         dom: 'Bfrtip',
         buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
         ],



     });
 </script>
 <!-- Style switcher -->
 <!-- ============================================================== -->
 <script src="{{ asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
