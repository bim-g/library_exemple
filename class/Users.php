<?php
    class Users{
        function register(array $data){        
            $users=[]; //users contiendra tout les utilisateur qui existant deja
            $state=false; // permetra de ssavoir si un utilisateur existe deja ou pas
            
            //on recupere tout les utilisateur qui existe avant de proceder a l'ajout              
            $users=Session::get("users")?Session::get("users"):[];
            //on parcours dans le tableau pour verifier si l'utisateur existe deja
            foreach($users as $item){
                // on verifier d'abord si cette utilisateur existe avant tout
                if($data["username"]==$item["username"]){
                    $state=true;
                    break;
                }
            }
            //si l'utilisateur n'existe pas on l'ajoute le cas contraire on retourne false
            if(!$state){
                array_push($users,$data);
                //on le stock pour une utilisateur ulterieur
                Session::put("users",$users); 
                //si tout se passe bien on retourne true
                return $users;
            }            
            // le cas contraire on retourne false
            return false;        
        }

        function login(array $data){
            //on instancie les variable avant les utilisateurs            
            $loged=[]; //loged stockera les information de l'tulisatuer qui est vien de se connectez ave le token
            $users=[]; // stockera les utilisateurs existant
            //on recupere les informations envoyer pas l'utilisateur
            $username=$data["username"];
            $password=$data["password"];            
            //on recupere tout les utilisateurs qui existe
            $users=Session::get("users")? Session::get("users"):[];            
            foreach($users as $item){
                //on everifier si l'utilisateur existe
                if($item['username']==$username && $item['password']==$password){                                    
                    $loged=$item;
                    break;
                }
            }  
            //si tout se bien passer on retourne les information sur l'utilisateur          
            if($loged){
                return $loged;
            }
            //en cas d'echec on retourne false
            return false;
        }
        function getusers(){
            $users=Session::get("users");
            return $users;
        }        
    }