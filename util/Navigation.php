<?php
class Navigation {
	private $currentURL;
	
	private function getNavigationVar($nome, $method="get", $sanitize=true) {
		if($method == "get") $variavel = $_GET[$nome];
		if($method == "post") $variavel = $_POST[$nome];
		
		if($sanitize) return mysql_escape_string($variavel);
		else return $variavel;
	}

        public function getCurrentURL() {
            return $this->currentURL;
        }

        public function setCurrentURL($currentURL) {
            $this->currentURL = $currentURL;
            
        }

        public function goURL($url) {
            header("location:$url");
        }
}