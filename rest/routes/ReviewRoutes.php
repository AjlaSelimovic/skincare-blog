<?php 

<<<<<<< HEAD
/**
 * @OA\Post(
 *      path="/reviews/add",
 *      tags={"Reviews"},
 *      summary="Add a new review",
 *      operationId="addReview",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="review_id",
 *                      type="integer",
 *                      description="ID of the review"
 *                  ),
 *                  @OA\Property(
 *                      property="user_id",
 *                      type="integer",
 *                      description="ID of the user submitting the review"
 *                  ),
 *                  @OA\Property(
 *                      property="rating",
 *                      type="integer",
 *                      description="Rating of the product (1-5)"
 *                  ),
 *                  @OA\Property(
 *                      property="brand",
 *                      type="string",
 *                      description="Brand of the product being reviewed"
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="number",
 *                      format="float",
 *                      description="Price of the product being reviewed"
 *                  ),
 *                  @OA\Property(
 *                      property="description",
 *                      type="string",
 *                      description="Description of the product being reviewed"
 *                  ),
 *                  @OA\Property(
 *                      property="product_id",
 *                      type="integer",
 *                      description="ID of the product being reviewed"
 *                  ),
 *                  @OA\Property(
 *                      property="review_text",
 *                      type="string",
 *                      description="Text content of the review"
 *                  )
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Review added successfully",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="message",
 *                  type="string"
 *              )
 *          )
 *      )
 * )
 */

=======
>>>>>>> 26b0542b2a9824839738183c2e3325e85daa1ac0
Flight::route('POST /reviews/add', function(){
    $data = Flight::request()->data->getData();
    Flight::reviewService()->add_review($data);
    Flight::json(["message"=> "Review added successfully"]);
});

<<<<<<< HEAD
/**
 * @OA\Get(
 *      path="/reviews/{id}",
 *      tags={"Reviews"},
 *      summary="Get review by ID",
 *      operationId="getReviewById",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the review",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="review_id",
 *                  type="integer",
 *                  description="ID of the review"
 *              ),
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer",
 *                  description="ID of the user submitting the review"
 *              ),
 *              @OA\Property(
 *                  property="rating",
 *                  type="integer",
 *                  description="Rating of the product (1-5)"
 *              ),
 *              @OA\Property(
 *                  property="brand",
 *                  type="string",
 *                  description="Brand of the product being reviewed"
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="number",
 *                  format="float",
 *                  description="Price of the product being reviewed"
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  description="Description of the product being reviewed"
 *              ),
 *              @OA\Property(
 *                  property="product_id",
 *                  type="integer",
 *                  description="ID of the product being reviewed"
 *              ),
 *              @OA\Property(
 *                  property="review_text",
 *                  type="string",
 *                  description="Text content of the review"
 *              )
 *          )
 *      )
 * )
 */

=======
>>>>>>> 26b0542b2a9824839738183c2e3325e85daa1ac0
Flight::route('GET /reviews/@id', function($id){
    Flight::json(Flight::reviewService()->get_review_by_id($id));
});

?>
