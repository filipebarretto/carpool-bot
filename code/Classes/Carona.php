<?php 

    class Carona{

        private $chat_id;
        private $user_id;
        private $username;
        private $timestamp;
        private $spots;
        private $route;

        public function __construct($data){
            $this->chat_id = $data["chat_id"];
			$this->user_id = $data["user_id"];
			$this->username = $data["username"];
			$this->timestamp = $data["timestamp"];
			$this->spots = $data["spots"];
			$this->location = $data["location"];
			$this->route = $data["route"];
        }
        
		public function __toString() {
            
			if (!empty($this->spots) && !empty($this->location)) {
				return "\n" . self::timestampToString($this->timestamp) . " - @" . $this->username . "\n" . $this->spots . " vagas (" . $this->location . ")";
			} else {
				return "\n" . self::timestampToString($this->timestamp) . " - @" . $this->username;
			}
            
		}
		
		public function ehIda(){
			return $this->route == 0;
		}
        
        private function timestampToString($timestamp) {
            date_default_timezone_set('America/Sao_Paulo');
            return date("H:i", $timestamp);
        }
        
    }

    
