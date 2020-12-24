<?php

use Wepesi\App\Core\{
    Controller,
    EventEmitter,
    Validate,
    Input,
    Token,
    Redirect,
    Session
};
use Wepesi\App\Users;
Controller::useController("viewCtrl");

    class usersCtrl extends viewCtrl{
        private $validate,$users,$emitter;

        function __construct()
        {
            $this->validate= new Validate();
            $this->users=new Users();
            $this->emitter=EventEmitter::getInstance();
        }
        function login(){
            $pages="";
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $this->validate->check($_POST,[
                        "username"=>[
                            "required"=>true,
                            "min"=>3,
                            "max"=>30
                        ],
                        "password"=>[
                            "required"=>true,
                            "min"=>3,
                        ]
                    ]);
                    if(!$this->validate->passed()){
                        $this->exception($this->validate->errors());
                        Redirect::to(WEB_ROOT);
                    }
                    $data=[
                        "username"=>Input::get("username"),
                        "password"=>Input::get("password")
                    ];
                    $result=$this->users->login($data);
                    $this->emitter->on("login",function($a,$b){
                        echo "your username is {$a} and password is {$b}<br>";
                    });   
                    
                    
                    if(!$result){
                        $this->exception("user does not existe");                    
                        Redirect::to(WEB_ROOT);
                    }else{      
                        Session::put("loged",true);
                        Session::put("username",$result['username']);
                        Session::put("name",$result['name']);
                        Session::put("ustoken",$result['token']);
                        Session::put("id",$result['id']);
                        $pages="users/profil";
                    }
                }else{
                    $this->exception();
                }
            }            
            Redirect::to(WEB_ROOT.$pages);
        }

        function register(){
            if(Input::exists()){
                $this->validate->check($_POST,[
                    "name"=>[
                        "required"=>true,
                        "min"=>3,
                        "max"=>30
                    ],
                    "username"=>[
                        "required"=>true,
                        "min"=>3,
                        "max"=>30
                    ],
                    "password"=>[
                        "required"=>true,
                        "min"=>3,
                    ]
                ]);
                if(!$this->validate->passed()){
                    $this->exception($this->validate->errors());
                    Redirect::to(WEB_ROOT);
                }else{
                    $data = [
                        "id" => Date('YmdHis'),
                        "username" => Input::get("username"),
                        "password" => Input::get("password"),
                        "name" => Input::get("name"),
                    ];
                    $result=$this->users->register($data);
                    if(!$result){
                        $this->exception("the user name already exist");
                        Redirect::to(WEB_ROOT);
                    }else{
                        Session::put("success",1);
                        $this->view("home",$result);
                    }
                }
            }else{
                Redirect::to(WEB_ROOT);
            }
        }
        function getusers($token=null){            
            $result=$this->users->getusers();
            $this->view("user",$result);           
        }
        function apiregister(){
            // Response::send($data,200);
        }
        function logout(){
            Session::delete("loged");
            Session::delete("username");            
            Session::delete("id");
            Redirect::to(WEB_ROOT);
        }
    }
?>