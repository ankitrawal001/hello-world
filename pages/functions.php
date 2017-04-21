<?php
	function selectdata($table, $col = '*', $where , $get_count = 0){
		global $conn;

		if($where=='') {
			$q = "SELECT $col FROM $table";
		}
		else {
			$q = "SELECT $col FROM $table where $where";
		}

		$result = $conn->query($q);
		$total_rows = $result->num_rows;


		if($total_rows){
			$listingdata = array();
			while($row = $result->fetch_assoc()){
				if($col != '*') { $listingdata = $row[$col]; }
				else { $listingdata[] = $row; }
			}
		}
		else{
			$listingdata = '';
		}

		if($get_count){ return $total_rows; }
		else{ return $listingdata; }		

	}

	function selectSum($table, $col, $where){
		global $conn;

		if($where=='') {
			$q = "SELECT SUM($col) as sum FROM $table";
		}
		else {
			$q = "SELECT SUM($col) as sum FROM $table where $where";
		}
		
		$result = $conn->query($q);

		$listingdata = array();
		while($row = $result->fetch_assoc())
		return $row['sum'];
	}


	function get_total_students(){
		$table ="students";
		$col = "stud_id";
		$where = 1;
		$get_count = 1;

		return selectdata($table, $col, $where , $get_count);
	}


	function get_total_queries(){
		$table ="query";
		$col = "id";
		$where = 1;
		$get_count = 1;

		return selectdata($table, $col, $where , $get_count);
	}

	function get_total_students_on_demo(){
		$table ="students";
		$col = "stud_id";
		$where = "`Registration_Number` =''";
		$get_count = 1;

		return selectdata($table, $col, $where , $get_count);
	}

	function get_total_classes(){
		$table ="class";
		$col = "class_id";
		$where = "1";
		$get_count = 1;

		return selectdata($table, $col, $where , $get_count);
	}
?>