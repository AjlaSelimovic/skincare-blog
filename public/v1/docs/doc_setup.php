<?php

/**
 * @OA\Info(
 *   title="API",
 *   description="Web programming Project",
 *   version="1.0",
 *   @OA\Contact(
 *     name="Ajla"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
