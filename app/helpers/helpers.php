<?php

/**
 * @param array $data | phone, message
 */
function sendSMS(array $data)
{

    $curl = curl_init();
    // $sender = "Molly MFB";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.bulksmsnigeria.com/api/v2/sms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('body' => $data["message"], 'from' => $data["sender"] ?? $sender, 'to' => $data["phone"], 'api_token' => '83TwlBsekwu7ncGnsVHCfgxBzgq1rG6Dr7K3rOcuF2AhrgoLEOf2ZNJL49x3'),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

    // try {
    //     $query = http_build_query([
    //         'username' => "devten",
    //         'password' => "Alonso652@..",
    //         'sender' => $sender,
    //         'recipient' => $data["phone"],
    //         "message" => $data["message"],
    //     ]);
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.loftysms.com/simple/sendsms?' . $query,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //     ));

    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);
    //     if ($err) return $err;
    //     return $response;
    // } catch (\Throwable $th) {
    //     return $th->getMessage();
    // }