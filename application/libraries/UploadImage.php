<?php

class UploadImage {
    
    public function __construct()
    {
    }


    public function uploadImage($tmpName){
        // $handle = fopen($tmpName, "r");
        // $data = fread($handle, filesize($tmpName));
        // $envio = array('image' => base64_encode($data));
        // var_dump($envio);die;
        $base64 = base64_encode(file_get_contents($tmpName));
        $envio = array("image" => $base64);

        $s = curl_init();
        curl_setopt($s, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($s,CURLOPT_URL,"https://api.imgur.com/3/image");
        // 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW', 
        curl_setopt($s,CURLOPT_HTTPHEADER,array("Authorization: Client-ID 7441f1c7e9b9edf")); 
        curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($s,CURLOPT_POSTFIELDS,$envio);
        $data = curl_exec($s);
        curl_close($s);
        
        $data = json_decode($data);

        if($data->status == 200){
            return $data->data->link;
        }

        return false;
    }
}