
<body>
<div class="hero-wrap hero-bread" style="background-image: url('assets/images/background_3.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shipping Information</span></p>
            <h1 class="mb-0 bread">Shipping information</h1>
          </div>
        </div>
      </div>
    </div>
    <br><br><br>
<div class="container">
        <div class="row">
        
            <div class="col-md-12">
                    <div class="panel-body">
                            <div>
                                <?php
                                //Get Data Kabupaten
                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                        "key: 9c3bf3f6e3bb10b2052294e294d8f6d6"
                                    ),
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                curl_close($curl);
                                echo "
                                <div class= \"form-group\">
                                <label for=\"asal\">Origin City</label>
                                <select class=\"form-control\" name='asal' id='asal'>";
                                echo "<option>Choose City</option>";
                                $data = json_decode($response, true);
                                for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                }
                                echo "</select>
                                </div>";
                                //Get Data Kabupaten
                                //-----------------------------------------------------------------------------

                                //Get Data Provinsi
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                    "key: 9c3bf3f6e3bb10b2052294e294d8f6d6"
                                    ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    echo "
                                    <div class= \"form-group\">
                                        <label for=\"provinsi\">Destination Province</label>
                                        <select class=\"form-control\" name='provinsi' id='provinsi'>";
                                            echo "<option>Choose Province</option>";
                                            $data = json_decode($response, true);
                                            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                                            }
                                            echo "</select>
                                        </div>";
                                        //Get Data Provinsi
                                        ?>

                                        <div class="form-group">
                                            <label for="kabupaten">Destination City</label><br>
                                            <select class="form-control" id="kabupaten" name="kabupaten"></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kurir">Courier</label><br>
                                            <select class="form-control" id="kurir" name="kurir">
                                                <option value="jne">JNE</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="pos">POS INDONESIA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="berat">Weight (gram)</label><br>
                                            <input class="form-control" id="berat" type="text" name="berat" value="500" />
                                        </div>
                                        <br><br>
                                        <button class="btn btn-primary check" id="cek" type="submit" name="button">Check</button>
                                    </div>
                            </div>
                    </div>
                    
            </div>
            <br><br>
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="ongkir"></div>   
                </div>
                
            </div>
        </div>

</body>
<br><br><br>

<script type="text/javascript">

$(document).ready(function(){
    $('#provinsi').change(function(){

        //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
        var prov = $('#provinsi').val();

          $.ajax({
            type : 'GET',
               url : 'http://localhost:80/Bettakunew/user/layout/cek_kabupaten.php',
            data :  'prov_id=' + prov,
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                $("#kabupaten").html(data);
            }
          });
    });

    $("#cek").click(function(){
        //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
        var asal = $('#asal').val();
        var kab = $('#kabupaten').val();
        var kurir = $('#kurir').val();
        var berat = $('#berat').val();

          $.ajax({
            type : 'POST',
               url : 'http://localhost:80/Bettakunew/user/layout/cek_ongkir.php',
            data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                success: function (data) {

                //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                $("#ongkir").html(data);
            }
          });
    });
});
</script>
