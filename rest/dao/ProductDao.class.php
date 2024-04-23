<?php

require_once __DIR__.'/BaseDao.class.php';

class ProductDao extends BaseDao {

  /**
   * Constructor of dao class
   */
  public function __construct(){
    parent::__construct("Products");
  }

  public function get_product_by_id($product_id){
    return $this->query_unique("SELECT * FROM Products WHERE product_id = :product_id", ['product_id' => $product_id]);
  }

  public function add_product($product){
    return $this->add($product);
  }

  public function get_all_products(){
    return $this->get_all();
  }

  public function update_product($product_id, $product){
    return $this->update($product_id, $product);
  }

  public function delete_product($product_id){
    $this->deleteproduct($product_id);
  }

}
?>
