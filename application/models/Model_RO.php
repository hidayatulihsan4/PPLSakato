<?php

class Model_RO extends CI_Model {

    public function ro_api($req, $cost = ""){
		$curl = curl_init();

		if($cost != ""){
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/$req",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $cost,
				CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded",
					"key: 472d86f0e2c9f5f3d6856499248c8b6c",
				),
			));
		}else {
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/$req",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: 472d86f0e2c9f5f3d6856499248c8b6c",
				),
			));
		}
		
		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
      return json_decode($response)->rajaongkir->results;
		}
	}

	public function get_all_province(){
		return $this->ro_api("province");
	}

	public function get_province($id){
		return $this->ro_api("province?id=$id");
	}

	public function get_all_city(){
		// return $this->ro_api("city");
        $city_of = [];
        foreach($this->ro_api("city") as $city){
            if(array_key_exists($city->province_id,$city_of)){
                array_push($city_of[$city->province_id],$city);
            }else{
                $city_of[$city->province_id] = [];
                array_push($city_of[$city->province_id],$city);
            }
        }
        return $city_of;
	}

	public function get_city_by_prov($prov_id){
		return $this->ro_api("city?province=$prov_id");
	}

	public function get_city($id){
		return $this->ro_api("city?id=$id");
	}

}