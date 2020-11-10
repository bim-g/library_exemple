<?php

namespace Wepesi\App;

use Wepesi\App\Core\Session;
class Messages{
        function sendMessage(array $data){            
            $messages=[];
            $messages=Session::get("messages")?Session::get("messages"):[];            
            array_push($messages,$data);
            Session::put("messages",$messages);
            return $messages;
        }
        function getMessage($id=null){
            //on instatie 
            $res=null; //initialisation pour recevoir la reponse de messages stocker
            //on recupere tout les messages existant
            $messages=Session::get("messages")? Session::get("messages"):[];
            //on verifier si l'id a etait envoyer pour renvoyer le message rn fonction de l'id
            if($id){
                //on parcour tout les messages 
                foreach($messages as $item){  
                    //si l'id du message correspond on recuprer le message et on qui te le boucle                  
                    if($id==$item["id"]){
                        $res=$item;
                        break;
                    }
                }
                return $res;
            }
            return $messages;
        }
    }
