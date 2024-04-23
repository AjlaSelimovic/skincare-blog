<?php 

require_once dirname(__FILE__).'/BaseService.php';
require_once dirname(__FILE__).'/../dao/ProductDao.class.php';

class ProductService extends BaseService {

    public function __construct(){
        $this->productDao = new ProductDao();
    }

    public function add_product($product){
        $product = $this->productDao->add_product([
            "product_id" => $product["product_id"],
            "product_name" => $product["product_name"],
            "brand" => $product["brand"],
            "price" => $product["price"],
            "description" => $product["description"],
        ]);
    }

    public function get_product_by_id($product_id){
        return $this->productDao->get_product_by_id($product_id);
    }

    public function get_all_products(){
        return $this->productDao->get_all_products();
    }

    public function update_product($product_id, $product){
        return $this->productDao->update_product($product_id, $product);
    }

    public function delete_product($product_id){
        $this->productDao->delete_product($product_id);
    }

}
?>
