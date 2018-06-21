<?php 

require_once 'ClassConfig.php';
	
class ClassComments{
	
	private $_username = '';
	private $_date = '';
	private $_comment = '';
	private $_i = 0;
	
	public function __construct() {	
	
	}
	
	public function printComments(){
		$link = mysqli_connect(ClassConfig::$DB_host,ClassConfig::$DB_login,ClassConfig::$DB_password,ClassConfig::$DB_name);
		
		//$CID - auto incriment
		$query = 'SELECT * FROM comments WHERE id>0 ORDER BY id DESC LIMIT 6;';
		
		//echo $query;
		$result = mysqli_query($link, $query);
		
		$this->_i = 0;
		
		$retStr='';
		
		// id / username / date / comment
		
		if (!empty($result)){
			while ($row = mysqli_fetch_assoc($result)) {
				$date = strtotime($row["date"]);
				$date = date("H:i   d.m.Y", $date);
				
				$retStr=$retStr . '<div class="users-comment ' . $row["id"] . '">';
				$retStr=$retStr . 	'<div class="UNDT">';
				$retStr=$retStr . 		'<div class="UN">';
				$retStr=$retStr . 			'<p>' . $row["username"] . '</p>';
				$retStr=$retStr . 		'</div>';
				$retStr=$retStr . 		'<div class="DT">';
				$retStr=$retStr . 			'<pre><p>' .$date . '</p></pre>';
				$retStr=$retStr . 		'</div>';
				$retStr=$retStr .	'</div>';
				$retStr=$retStr .	'<div class="UCB">';
				$retStr=$retStr .		'<p>' . $row["comment"] . '</p>';
				$retStr=$retStr .	'</div>';
				$retStr=$retStr . '</div>';
				
				$this->_i=$this->_i + 1;
			}
			mysqli_free_result($result);
		}
		
		mysqli_close($link);
		
		if ($this->_i === 0){
			$retStr='<div> Пользователи еще не оставили коментариев. </div>';
		}
		
		return $retStr;
	}
	
	public function writeComments($username, $date, $comment){
		$this->_username = $username;
		$this->_date = $date;
		$this->_comment = $comment;
		$this->filter($this->_username);
		$this->filter($this->_date);
		$this->filter($this->_comment);
		
		if ((!empty($this->_username))&&(!empty($this->_date))&&(!empty($this->_comment))){
			$ID = 0;
			$query = 'INSERT INTO comments(id, username, date, comment) VALUES (';
			$query = $query . $ID . ', ';
			$query = $query . '"' . $this->_username . '", ';
			$query = $query . '"' . $this->_date . '", ';
			$query = $query . '"' . $this->_comment . '"';
			$query = $query . ');';
			
			//echo($query);
			
			$link = mysqli_connect(ClassConfig::$DB_host,ClassConfig::$DB_login,ClassConfig::$DB_password,ClassConfig::$DB_name);
			
			mysqli_query($link, $query);
			mysqli_close($link);
		}
	}
	
	private function filter(&$str){
		$str=trim(htmlspecialchars($str));
		//так же надо проводить проверку на sql инекции но не сделано из за ограниченного времени на выполенние
	}
}
?>