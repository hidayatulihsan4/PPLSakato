    <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#">
                  <!-- About Us -->
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            Copyright &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
  <script src="<?= base_url();?>assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="<?= base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      var myTable = $("#x-data-tables").DataTable({
        responsive: true,
        autoWidth:false,
        bInfo:false,
        // lengthChange:false,
        dom:'lrtp',
        // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });

      $('#mySearch').on( 'keyup', function () {
        myTable.search( this.value ).draw();
      });
      
      $(function(){
        $('select').each( function(){
            if($(this).attr('data-opt') !== ''){
              $(this).val($(this).attr('data-opt'));
            }
        })
      });

      $(function(){
        let nav = $('#side-navigator').attr('data-nav');
        $('#'+nav).addClass('active');
      });
    });
  </script>
</body>

</html>