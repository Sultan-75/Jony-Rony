</div>
<!-- Footer -->
<footer class="sticky-footer bg-accent text-white pb-2">
  <div class="container my-auto">
    <div class="copyright text-center">
        <p><b> &copy;</b> <?php echo date("Y"); ?> <span class="font-weight-bold">Jony&Rony</span> | All Rights Reserved</p>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- Bootstarp bundle & jquery with easing files -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Datatables  plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- admin template js files -->
<script src="js/ruang-admin.min.js"></script>
<!-- Ajax file -->
<script src="js/ajax.js"></script>
<!-- datatabels custom scripts -->
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>

</body>

</html>