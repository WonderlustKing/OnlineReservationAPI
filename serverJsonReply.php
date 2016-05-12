<?php
    header("Content-Type:application/json");
	//connect with DB
    include('dbCon.php');
    include('functions.php');
    $theatroName="theatro1"; //theatro name
    // a whitelist with the avaliable performances for GET method
    $white_list=array();
    $length=0;
    $result=$link->prepare("SELECT name FROM parastaseis");
    $result->execute();
    $result->store_result();
    $result->bind_result($name_parastasis);
    while($result->fetch()){
        $white_list[$length]=$name_parastasis;
        //echo $white_list[$length];
        $length++;
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
        //Get GET data
        if(isset($_GET['theatro'])){
            $theatro=urldecode($_GET['theatro']);
            if($theatro==$theatroName){
                //get the performances from db
                $result=$link->prepare("SELECT name FROM parastaseis");
                $result->execute();
                $result->store_result();
                $result->bind_result($name_parastasis);
                $i=0;
                while($result->fetch()){
                    $parastaseis[$i]=$name_parastasis;
                    $i++;
                }
                // call the return_parastaseis method with arg the avaliable performances
                return_parastaseis($parastaseis);
            }
        }
        else if(isset($_GET['parastasi'])){
            //check the whitelist
            if(in_array($_GET['parastasi'], $white_list)){
                $parastasi =urldecode($_GET['parastasi']);
                $result=$link->prepare("SELECT seats FROM theseis S,parastaseis P WHERE S.id=P.id AND P.name=?");
                $result->bind_param('s',$parastasi);
                $result->execute();
                $result->store_result();
                $result->bind_result($theseis);
                $result->fetch();
                deliver_response($theatroName, $parastasi, $theseis);
            }
        }
    // POST method when the client insert or update things
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['parastasi']) && isset($_POST['kratisi'])){
            //check the whitelist
            if(in_array($_POST['parastasi'], $white_list)){
                $kratiseis_num=urldecode($_POST['kratisi']);
                $parastasi =urldecode($_POST['parastasi']);
                //update seats after reservation number request
                $result=$link->prepare("UPDATE theseis SET seats=(seats-$kratiseis_num) WHERE id=(SELECT id FROM parastaseis WHERE name=?)");
                $result->bind_param('s',$parastasi);
                $result->execute();
                if($result) $success=1;
                else $success=0;
                new_kratisi($success);
            } 
        }

    }
	

?>