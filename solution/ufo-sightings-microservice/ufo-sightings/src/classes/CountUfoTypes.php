<?php
class CountUfoTypes {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getCount($params = array()) {
	$sql = "SELECT COUNT(DISTINCT shape) AS count FROM ufo_sightings_bookeeper WHERE shape <> ''";
	if(!empty($params)){
		$sql .= " AND";
		foreach($params as $index=>$value){
			$sql .= " {$index}='{$value}' ";
		}
	}
	$stmt = $this->db->query($sql);
	$query_result = $stmt->fetchAll();
	$result = $query_result[0];
	return $result;
    }
}
