<?php

// return the numbers and names of avaliable performances in json 
function return_parastaseis($parastaseis){
    
    $num=sizeof($parastaseis);
    $response['numOfPerformances']=$num;
    for($i=0;$i<$num;$i++){
        $response['performance'.$i]=$parastaseis[$i];
    }
    $json_response = array();
    $json_response['performances'] = $response;
    print_r(json_encode($json_response));
}
// return infos(theatre,performance_name,avaliable seats) about the selected performance that user has request in json
function deliver_response($theatro, $parastasi,$data){
    //header("HTTP/1.1 $status $theatro $parastasi $data");
    $response['theatro']=$theatro;
    $response['parastasi']=$parastasi;
    $response['theseisAvl']=$data;
    //$json_response=json_encode($response);
    //echo $json_response;
    $json_response = array();
    $json_response['infos'] = $response;
    print_r(json_encode($json_response));

}
// return the success code of the reservation in json
function new_kratisi($success){
    $response['success']=$success;
    $json_response = array();
    $json_response['kratisi'] = $response;
    print_r(json_encode($json_response));	
}

?>