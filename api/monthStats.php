<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  
  $statsModel = new StatsModel();


  $data = json_decode(file_get_contents("php://input"));
  // Stats query
  $results = $statsModel->stats_month($data->year, $data->month);

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
        'category_name' => $category_name,
        'total' => $total,
        'waluta' => $waluta,
        'id_kategorii' => $id_kategorii
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