<?php
class Model
{
    public $string;

    public function __construct(){}

    public function getResponses() {
        $count = filter_input(INPUT_GET,'count');
        $reponseArray = array();
        $nodes = array();

        for ($i = 0; $i < $count; $i++) {
            $nodes[$i] = 'http://postman-echo.com/delay/3';
        }

        $node_count = count($nodes);
        $curl_arr = array();
        $master = curl_multi_init();

        for($i = 0; $i < $node_count; $i++)
        {
            $url =$nodes[$i];
            $curl_arr[$i] = curl_init($url);
            curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }

        do {
            curl_multi_exec($master,$running);
        } while($running > 0);

        for($i = 0; $i < $node_count; $i++)
        {
            $results = curl_multi_getcontent  ($curl_arr[$i]);
            array_push($reponseArray, json_decode($results));
        }

        $this->string = json_encode($reponseArray);
    }
}