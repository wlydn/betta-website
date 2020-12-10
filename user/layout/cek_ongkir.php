<?php
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 9c3bf3f6e3bb10b2052294e294d8f6d6"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, true);
	}
	?>
<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke
<?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir :
<?php echo strtoupper($kurir); ?>
<?php
	 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	?>
<div class="container">


	<div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
		<table class="table text-center">
			<thead class="thead-primary">
				<tr class="text-center">
					<th>No.</th>
					<th>Jenis Layanan</th>
					<th>ETD</th>
					<th>Tarif</th>
				</tr>
			</thead>
			<tbody>
				<?php
					for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
				?>

				<tr>
					<td><?php echo $l+1;?></td>
					<td>
						<div style="font:bold 16px Arial">
							<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
						<div style="font:normal 11px Arial">
							<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
					</td>
					<td align="center">
						&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
					<td align="right">
						<?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>


	</div>
</div>
<?php
	 }
	 ?>