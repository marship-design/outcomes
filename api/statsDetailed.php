<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$statsModel = new StatsModel();


// $year = Input::get(['year']);
// $category = Input::get(['category']);
$data = json_decode(file_get_contents("php://input"));


// $month = $_GET['month'];
// $year = $_GET['year'];
// $category = $_GET['kategoria'];

// Outcome query
$results = $statsModel->stats_category_detailed($data->year, $data->month, $data->category);

// Get row count
$num = $results->rowCount();

// Check if any outcomes
if($num > 0) {
  // Outcome array
  $outcomes_arr = array();
  // $posts_arr['data'] = array();
  while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $outcome_item = array(        
      'id_wydatku' => $id_wydatku,
      'kwota' => $kwota,
      'nazwa_wydatku' => $nazwa_wydatku,
      'data_wydatku' => $data_wydatku,
      'waluta' => $waluta
    );
    // Push to "data"
    array_push($outcomes_arr, $outcome_item);
    // array_push($posts_arr['data'], $post_item);
  }
  // Turn to JSON & output
  echo json_encode($outcomes_arr);
} else {
  // No Posts
  echo json_encode(
    array('message' => 'No Posts Found')
  );
}