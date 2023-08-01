<?php
class MessagesStorage{

    private array $messages;

    public function __construct(){
        $this->create_file_if_not_exists();
        $this->parce_file();
    }

    private function create_file_if_not_exists(){
        if(!file_exists(MESSAGES_FILE)){
            file_put_contents(MESSAGES_FILE, "{}");
        }
    }

    private function parce_file(){
        $file_text = file_get_contents(MESSAGES_FILE);
        $this->messages = json_decode($file_text, true);
    }

    public function get_messages() : array{
        return $this->messages;
    }

    public function add_message($message){
        $this->messages[] = $message;
    }
    
    public function __destruct(){
        $this->save_messages();
    }

    public function save_messages(){
        file_put_contents(MESSAGES_FILE, json_encode($this->messages));
    }
}


