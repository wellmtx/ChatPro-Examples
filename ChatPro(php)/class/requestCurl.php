<?php

class requestCurl 
{
    private $url;
    private $method;
    private $send;
    private $header = array("Authorization: [seuToken]", "cache_control: no-cache", "Content-Type: application/json");

    public function setUrl($url) 
    {
        $this->url = $url;
    }

    public function setMethod($method) 
    {
        $this->method = $method;
    }

    public function setSend($send) 
    {
        $this->send = $send;
    }

    public function request() 
    {
        if ($this->method === "GET") 
        {
            $ch = curl_init();

            curl_setopt_array($ch, array
            (
                CURLOPT_URL => $this->url ,
                CURLOPT_CUSTOMREQUEST => "GET" ,
	        CURLOPT_RETURNTRANSFER => true ,
                CURLOPT_HTTPHEADER => $this->header
            ));

            $response = curl_exec($ch);

            curl_close($ch);

            return json_decode($response, true);
        }

        if ($this->method === "POST") 
        {
            $ch = curl_init();

            curl_setopt_array($ch, array
            (
                CURLOPT_URL => $this->url ,
                CURLOPT_CUSTOMREQUEST => "POST" ,
	        CURLOPT_RETURNTRANSFER => true ,
                CURLOPT_POSTFIELDS => $this->send ,
                CURLOPT_HTTPHEADER => $this->header
            ));

            $response = curl_exec($ch);

            curl_close($ch);

            return json_decode($response, true);
        }
    }
}

?>
