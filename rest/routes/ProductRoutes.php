<?php 

Flight::route('POST /products/add', function(){
    $data = Flight::request()->data->getData();
    Flight::productService()->add_product($data);
    Flight::json(["message"=> "Product added successfully"]);
});

Flight::route('GET /products/@product_id', function($product_id){
    Flight::json(Flight::productService()->get_product_by_id($product_id));
});

Flight::route('GET /products', function(){
    Flight::json(Flight::productService()->get_all_products());
});

Flight::route('PUT /products/@product_id', function($product_id){
    $data = Flight::request()->data->getData();
    Flight::productService()->update_product($product_id, $data);
    Flight::json(["message"=> "Product updated successfully"]);
});

Flight::route('DELETE /products/@product_id', function($product_id){
    Flight::productService()->delete_product($product_id);
    Flight::json(["message"=> "Product deleted successfully"]);
});

?>
