  <footer class="p-5 bg-light">
    <div class="row">
      <div class="col-12 col-md">
        <p class="fs-4">PPL SAKATO</p>
        <small class="d-block mb-3 text-muted">&copy; 2006–2022</small>
      </div>
    </div>
  </footer>

    
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
    
  <script src="<?= base_url();?>public_assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
  
  <?php if($content == 'profile' || $content == 'register'){?>
  <script>
    $('document').ready(function(){
      let province = <?= json_encode($province); ?>;
      let city = <?= json_encode($city); ?>;
      
      $("#provinsi").on('change',function(){
        $("#kota").html('');
        for(let x of city[this.value]){
          $("#kota").append($('<option>', {
              value: x.city_id,
              text: x.city_name
          }));
          // console.log(x);
        }
      });
      
      $("#kota").html('');
      for(let x of city[$("#provinsi").attr('data-opt')]){
        $("#kota").append($('<option>', {
            value: x.city_id,
            text: x.city_name
        }));
        console.log(x);
      }
    });

  </script>
  <?php } ?>
  <?php if($this->session->flashdata('is_message') == true){?>
    <script>
      $('document').ready(function(){
        $("#flashDataModal").modal('show');
      });
    </script>
  <?php } 
    if($content == 'checkout'){
  ?>
    <script>
      $('document').ready(function(){
        var temp_service = [];
        var service_toko = ['Layanan Toko'];
        let total_harga = $("#total_harga").val();
        
        $("#ekspedisi").on('change', function(){
          let total_berat = $("#total_berat").val();
          let ekspedisi = $("#ekspedisi").val();
          if(ekspedisi != 'et'){
            $.ajax({
              url: "<?= base_url().'main/get_cost'; ?>",
              type: 'POST',
              data: {
                  "weight": total_berat,
                  "courier": ekspedisi
              },
              dataType: 'json',
              success: function(data) {
                temp_service = data['0']['costs'];
                $("#service").html("");
                for (let x of data['0']['costs']) {
                  $("#service").append($('<option>', {
                    value: x['service'],
                    text: x['service']+" - "+x['description']
                  }));
                }

                $('#ongkir').val(temp_service['0'].cost['0'].value); 
                $('#etd').val(temp_service['0'].cost['0'].etd); 
                $('#total_biaya').val(parseInt(total_harga) + parseInt(temp_service['0'].cost['0'].value));
              },
            });

          }else{
            
            $("#service").html("");

            $("#service").append($('<option>', {
              value: 'Layanan Toko',
              text: 'Layanan Toko'
            }));

            $('#ongkir').val(0); 
            $('#etd').val(' - '); 
            $('#total_biaya').val(parseInt(total_harga));
          }
        });

        $("#service").on('change', function(){
          let service = $("#service").val();
          for(let x of temp_service){
            if(x.service == service){
              $('#ongkir').val(x.cost['0'].value);   
              $('#etd').val(x.cost['0'].etd);    
              $('#total_biaya').val((parseInt(total_harga) + parseInt(x.cost['0'].value)));
            }
          }
        });

      });
    </script>
  <?php
    }else if($content = 'profile'){
  ?>

  <?php
    }
  ?>
  <script>
    $(document).ready(function() {
      
      $('#do_this').on('click',function(){
        // console.log($('#ekspedisi').val());
        if($('#ekspedisi').val() == null){
          alert('Pilih Ekspedisi Terlebih Dahulu!');
        }else if($('#service').val() == null){
          alert('Pilih Layanan Ekspedisi Terlebih Dahulu!');
        }else{
          // console.log('oke');
          $('#f-'+$(this).attr('data-form')).submit();
        }
      })

      $("#check_all").on('change', function(){
        if(this.checked){
          $(".check_one").prop('checked', this.checked);
        }else{
          $(".check_one").prop('checked', this.checked);
        }
      });

      $('.check_one').on('change', function(){
        if(!this.checked){
          $("#check_all").prop('checked', '');
        }else{
          let temp_check = 0;
          $('.check_one').each( function(index){
            if(!this.checked){
              temp_check++;
            }
          });
          if(temp_check == 0){
            $("#check_all").prop('checked', 'checked');
          }
        }
      });

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
  </body>
</html>