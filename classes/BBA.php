<?php

class BBA {

	public function __construct($user, $password, $database, $host = 'localhost') {
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->host = $host;
	}

	protected function connect() {
		return new mysqli($this->host, $this->user, $this->password, $this->database);
	}

	public function query($query) {
		$db = $this->connect();
		$result = $db->query($query);

		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}

		return $results;
	}

  public function db_query($query) {
		$db = $this->connect();
		$result = $db->query($query);

		return $result;
	}

	public function submitIdea($si_user, $si_title, $si_coin = NULL, $si_chartURL = NULL, $si_notes = NULL){
		if(isset($si_coin) || !empty($si_coin)){
			$si_coin = $this->connect()->real_escape_string($si_coin);
		}
		if(isset($si_notes) || !empty($si_notes)){
			$si_notes = $this->connect()->real_escape_string($si_notes);
		}
		if(isset($si_chartURL) || !empty($si_chartURL)){
			$si_chartURL = $this->connect()->real_escape_string($si_chartURL);
		}

		$si_title = $this->connect()->real_escape_string($si_title);

		$query = 'INSERT INTO `trade_ideas`
             (`ti_user`, `ti_title`, `ti_coin`, `ti_chart_url`, `ti_notes`)
             VALUES (\'' . $si_user . '\', \'' . $si_title . '\', \'' . $si_coin . '\', \'' . $si_chartURL . '\', \'' . $si_notes . '\')';
		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function updateIdea($ui_id, $ui_title, $ui_coin = NULL, $ui_chartURL = NULL, $ui_notes = NULL){
		if(isset($ui_coin) || !empty($ui_coin)){
			$ui_coin = $this->connect()->real_escape_string($ui_coin);
		}
		if(isset($ui_notes) || !empty($ui_notes)){
			$ui_notes = $this->connect()->real_escape_string($ui_notes);
		}
		if(isset($ui_chartURL) || !empty($ui_chartURL)){
			$ui_chartURL = $this->connect()->real_escape_string($ui_chartURL);
		}

		$ui_title = $this->connect()->real_escape_string($ui_title);

		$query = 'UPDATE `trade_ideas`
						SET `ti_title` = \'' . $ui_title . '\',
						`ti_coin` = \'' . $ui_coin . '\',
						`ti_chart_url` = \'' . $ui_chartURL . '\',
						`ti_notes` = \'' . $ui_notes . '\'
						WHERE `ti_id` = \'' . $ui_id . '\' ';
		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function submitVideo($sv_title, $sv_videoID){
		$sv_title = $this->connect()->real_escape_string($sv_title);
		$sv_videoID = $this->connect()->real_escape_string($sv_videoID);

		$query = 'INSERT INTO `videos`
             (`v_title`, `v_videoID`)
             VALUES (\'' . $sv_title . '\', \'' . $sv_videoID . '\')';
		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function submitFeedback($f_user, $f_feedback){
		$f_user = $this->connect()->real_escape_string($f_user);
		$f_feedback = $this->connect()->real_escape_string($f_feedback);

		$query = 'INSERT INTO `feedback`
             (`f_user`, `f_feedback`)
             VALUES (\'' . $f_user . '\', \'' . $f_feedback . '\')';
		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function delete($table, $id) {
		// Connect to the database
		$db = $this->connect();

		// Prepary our query for binding
		$stmt = $db->prepare("DELETE FROM {$table} WHERE ID = ?");

		// Dynamically bind values
		$stmt->bind_param('d', $id);

		// Execute the query
		$stmt->execute();

		// Check for successful insertion
		if ( $stmt->affected_rows ) {
			return true;
		}
	}

}