<?php
require_once __DIR__.'/BaseDao.class.php';

class ReviewDao extends BaseDao {

  /**
   * Constructor of dao class
   */
  public function __construct(){
    parent::__construct("Reviews");
  }

  public function get_review_by_id($review_id){
    return $this->query_unique("SELECT * FROM Reviews WHERE review_id = :review_id", ['review_id' => $review_id]);
  }

  public function add_review($review){
    return $this->add($review);
  }

}
?>
