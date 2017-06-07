<?php
namespace App;
class Common{
    public static  function https_request($url,$data = null){
        $curl = curl_init();
        //设置选项，包括URL
        curl_setopt($curl,CURLOPT_URL,$url);
        //安全性要求
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);

        if(!empty($data)){
            curl_setopt($curl,CURLOPT_POST,1);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }

        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}