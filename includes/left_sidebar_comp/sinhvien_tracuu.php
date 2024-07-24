 <!-- Tra cứu qua mã sinh viên -->
 <div class="tra_cuu_msv">
            <style>
              .tra_cuu_msv {
                display: none;
                padding-left: 25px;
                padding-right: 25px;
              }

              th {
                color: green;
              }

              #msv {
                width: 100%;
              }
            </style>
            <h2>Tra cứu sinh viên theo mã sinh viên</h2>
            <form action="#" method="post">
              <label for="msv">Mã sinh viên:</label>
              <input type="text" name="msv" id="msv" class="form-control" required>
              <button type="button" onclick="traCuu()" class="btn btn-primary">Tra cứu</button>
            </form>
            <div class="ketqua_tracuu">
              <!-- kết quả hiển thị ở đây -->
            </div>
            <script>
              function traCuu() {
                var msv = $('#msv').val();

                $.ajax({
                  type: 'POST',
                  url: 'includes/chuc_nang/tracuu_msv_process.php',
                  data: {
                    msv: msv
                  },
                  success: function(response) {
                    $('.ketqua_tracuu').html(response);
                  }
                });
              }

              function hienTraCuu() {
                $('.thongke').hide();
                $('.tra_cuu_msv').show();
              }
            </script>
            <div class="tablesv">
              
            </div>
          </div>