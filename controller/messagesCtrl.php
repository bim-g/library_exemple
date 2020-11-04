<?php
    Controller::useController('viewCtrl');
    class messagesCtrl extends viewCtrl{
        private $validate,$message;

        function __construct()
        {
            $this->validate= new Validate();
            $this->message= new Messages();
        }

        function getMessages(){            
            $result=$this->message->getMessage();
            $this->view("message",$result);
        }
        function postMessages(){
            if(Input::exists()){
                if(Token::check(Input::get('token'))){
                    $this->validate->check($_POST,[
                        "username"=>[
                            "require"=>true,
                            "min"=>3,
                            "max"=>30
                        ],
                        "userid"=>[
                            "require"=>true,
                            "number"=>true
                        ],
                        "message"=>[
                            "require"=>true,
                            "min"=>3,
                            "max"=>100
                        ]
                    ]);
                    
                    if(!$this->validate->passed()){
                        $this->exception($this->validate->errors());
                    }else{
                        $data = [
                            "id" => Date('YmdHis'),
                            "userid" => Input::get("userid"),
                            "username" => Input::get("username"),
                            "message" => Input::get("message")
                        ];
                        $result=$this->message->sendMessage($data);
                        if(!$result){
                            $this->exception("enable to register this messages");
                        }else{
                            Session::put("success",1);
                        }                        
                    }
                }else{
                
                    $this->exception();
                }
            }
            Redirect::to(WEB_ROOT.'messages');
        }
    }