<?php 

<<<<<<< HEAD
/**
 * @OA\Post(
 *      path="/products/add",
 *      tags={"Products"},
 *      summary="Add a new product",
 *      operationId="addProduct",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="product_id",
 *                      type="integer",
 *                      description="ID of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="product_name",
 *                      type="string",
 *                      description="Name of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="brand",
 *                      type="string",
 *                      description="Brand of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="number",
 *                      format="float",
 *                      description="Price of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="description",
 *                      type="string",
 *                      description="Description of the product"
 *                  )
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product added successfully",
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
Flight::route('POST /products/add', function(){
    $data = Flight::request()->data->getData();
    Flight::productService()->add_product($data);
    Flight::json(["message"=> "Product added successfully"]);
});

<<<<<<< HEAD
/**
 * @OA\Get(
 *      path="/products/{product_id}",
 *      tags={"Products"},
 *      summary="Get product by ID",
 *      operationId="getProductById",
 *      @OA\Parameter(
 *          name="product_id",
 *          in="path",
 *          description="ID of the product",
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
 *                  property="product_id",
 *                  type="integer",
 *                  description="ID of the product"
 *              ),
 *              @OA\Property(
 *                  property="product_name",
 *                  type="string",
 *                  description="Name of the product"
 *              ),
 *              @OA\Property(
 *                  property="brand",
 *                  type="string",
 *                  description="Brand of the product"
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="number",
 *                  format="float",
 *                  description="Price of the product"
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  description="Description of the product"
 *              )
 *          )
 *      )
 * )
 */
=======
>>>>>>> 26b0542b2a9824839738183c2e3325e85daa1ac0
Flight::route('GET /products/@product_id', function($product_id){
    Flight::json(Flight::productService()->get_product_by_id($product_id));
});

<<<<<<< HEAD
/**
 * @OA\Get(
 *      path="/products",
 *      tags={"Products"},
 *      summary="Get all products",
 *      operationId="getAllProducts",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(
 *              type="array",
 *              @OA\Items(
 *                  @OA\Property(
 *                      property="product_id",
 *                      type="integer",
 *                      description="ID of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="product_name",
 *                      type="string",
 *                      description="Name of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="brand",
 *                      type="string",
 *                      description="Brand of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="number",
 *                      format="float",
 *                      description="Price of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="description",
 *                      type="string",
 *                      description="Description of the product"
 *                  )
 *              )
 *          )
 *      )
 * )
 */
=======
>>>>>>> 26b0542b2a9824839738183c2e3325e85daa1ac0
Flight::route('GET /products', function(){
    Flight::json(Flight::productService()->get_all_products());
});

<<<<<<< HEAD
/**
 * @OA\Put(
 *      path="/products/{product_id}",
 *      tags={"Products"},
 *      summary="Update product by ID",
 *      operationId="updateProductById",
 *      @OA\Parameter(
 *          name="product_id",
 *          in="path",
 *          description="ID of the product",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="product_name",
 *                      type="string",
 *                      description="Name of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="brand",
 *                      type="string",
 *                      description="Brand of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="number",
 *                      format="float",
 *                      description="Price of the product"
 *                  ),
 *                  @OA\Property(
 *                      property="description",
 *                      type="string",
 *                      description="Description of the product"
 *                  )
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product updated successfully",
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
Flight::route('PUT /products/@product_id', function($product_id){
    $data = Flight::request()->data->getData();
    Flight::productService()->update_product($product_id, $data);
    Flight::json(["message"=> "Product updated successfully"]);
});

<<<<<<< HEAD
/**
 * @OA\Delete(
 *      path="/products/{product_id}",
 *      tags={"Products"},
 *      summary="Delete product by ID",
 *      operationId="deleteProductById",
 *      @OA\Parameter(
 *          name="product_id",
 *          in="path",
 *          description="ID of the product",
 *          required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product deleted successfully",
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
Flight::route('DELETE /products/@product_id', function($product_id){
    Flight::productService()->delete_product($product_id);
    Flight::json(["message"=> "Product deleted successfully"]);
});
<<<<<<< HEAD
?>

=======

?>
>>>>>>> 26b0542b2a9824839738183c2e3325e85daa1ac0
