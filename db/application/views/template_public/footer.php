  <footer class="p-5 bg-light">
      <div class="row">
        <div class="col-12 col-md">
          <p class="fs-4">PPL SAKATO</p>
          <small class="d-block mb-3 text-muted">&copy; 2006–2022</small>
        </div>
      </div>
    </footer>

    <script src="<?= base_url();?>public_assets/dist/js/bootstrap.bundle.min.js"></script>
    
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  
  <script src="<?= base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      var myTable = $("#x-data-tables").DataTable({
        responsive: true,
        autoWidth:false,
        bInfo:false,
        // lengthChange:false,
        dom:'lrtp',
        // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
  
  <script>
    $('document').ready(function() {
        let kota;
        $("#provinsi").on('change', function() {
            $("#kota").empty();
            var id_province = $(this).val();
            $.ajax({
                url: "<?= site_url('pelanggan/getCity') ?>",
                type: 'GET',
                data: {
                    'id_province': id_province,
                },
                dataType: 'json',
                success: function(data) {
                    var results = data["rajaongkir"]["results"];
                    kota = data["rajaongkir"]["results"];
                    for (var i = 0; i < results.length; i++) {
                        $("#kota").append($('<option>', {
                            value: results[i]["city_id"],
                            text: results[i]['city_name']
                        }));
                    }
                },

            });
        });

        $("#kota").on('change', function() {
            for (let i = 0; i < kota.length; i++) {
                if (kota[i]['city_id'] == this.value) {
                    $('#post_code').val(kota[i]['postal_code']);
                }
            }
        });
    });
  </script>

  </body>
</html>