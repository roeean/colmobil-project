<?php
/**
 * Plugin Name: Hyundai API
 * Description: Hyundai API
 * Version: 0.1.0
 * Author: Roee Angel
 * Author URI: https://www.linkedin.com/in/roeean/
 * License: Private
 */

 function getLevelData($id) {

    $levels = get_posts([
        'nopaging' => true,
        'post_type' => 'levels',
        'meta_query' => array(
            array(
                'key'   => 'model_id',
                'value' => $id,
            )
        )
     ]);

     $data = array(
        'prices' => array(),
        'licenseFees' => array()
    );

     foreach($levels as $level) {
        array_push($data['prices'], $level->price);
        array_push($data['licenseFees'], $level->license_fee);
     }

     return $data;
 }

 function getModels(){

     $models = get_posts([
        'nopaging' => true,
        'post_type' => 'models'
     ]);

     $data = [];

     foreach($models as $model) {

        $levels = getLevelData($model->ID);
        array_push($data, array(
            "id" => $model->ID,
            "name" => $model->post_title,
            "image" => get_the_post_thumbnail_url( $model->ID, 'large'),
            "price" => min($levels['prices']),
            "licenseFee" => min($levels["licenseFees"]),
        ));
     }

     return $data;
 }

function getModel( $params ) {

    $model = get_posts([
        'number_posts' => 1,
        'post_type' => 'models',
        'include' => $params['id']
     ])[0];

     $levels = getLevelData($model->ID);
     return array(
         "id" => $model->ID,
         "name" => $model->post_title,
         "image" => get_the_post_thumbnail_url( $model->ID, 'large'),
         "price" => min($levels['prices']),
         "licenseFee" => min($levels["licenseFees"]),
     );
}

function getLevels(){

    $levels = get_posts([
       'nopaging' => true,
       'post_type' => 'levels'
    ]);

    $data = [];

    foreach($levels as $level) {

       array_push($data, array(
           "id" => $level->ID,
           "model_id" => $level->model_id,
           "name" => $level->post_title,
           "description" => $level->description,
           "image" => get_the_post_thumbnail_url( $level->ID, 'large'),
           "price" => $level->price,
           "licenseFee" => $level->license_fee,
       ));
    }

    return $data;
}

function getLevel( $params ) {

    $level = get_posts([
        'number_posts' => 1,
        'post_type' => 'levels',
        'include' => $params['id']
     ])[0];

     return array(
        "id" => $level->ID,
        "model_id" => $level->model_id,
        "name" => $level->post_title,
        "description" => $level->description,
        "image" => get_the_post_thumbnail_url( $level->ID, 'large'),
        "price" => $level->price,
        "licenseFee" => $level->license_fee,
     );
}

 add_action('rest_api_init', function() {
     register_rest_route('v1', 'models', [
         'methods' => 'GET',
         'callback' => 'getModels'
     ]);

     register_rest_route('v1', 'models/(?P<id>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => 'getModel'
    ]);

    register_rest_route('v1', 'levels', [
        'methods' => 'GET',
        'callback' => 'getLevels'
    ]);

    register_rest_route('v1', 'levels/(?P<id>[a-zA-Z0-9-]+)', [
       'methods' => 'GET',
       'callback' => 'getLevel'
   ]);
 });