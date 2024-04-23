<?php 

Flight::route('POST /reviews/add', function(){
    $data = Flight::request()->data->getData();
    Flight::reviewService()->add_review($data);
    Flight::json(["message"=> "Review added successfully"]);
});

Flight::route('GET /reviews/@id', function($id){
    Flight::json(Flight::reviewService()->get_review_by_id($id));
});

?>
