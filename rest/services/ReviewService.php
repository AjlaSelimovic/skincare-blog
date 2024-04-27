<?php 
require_once dirname(__FILE__).'/BaseService.php';
require_once dirname(__FILE__).'/../dao/ReviewDao.class.php';

class ReviewService extends BaseService {

    public function __construct(){
        $this->reviewDao = new ReviewDao();
    }

    public function add_review($review){
        return $this->reviewDao->add_review([
            "review_id" => $review["review_id"],
            "user_id" => $review["user_id"],
            "product_id" => $review["product_id"],
            "rating" => $review["rating"],
            "review_text" => $review["review_text"]
        ]);
    }

    public function get_review_by_id($review_id){
        return $this->reviewDao->get_review_by_id($review_id);
    }

}
?>
