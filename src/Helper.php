<?php

namespace WarpDrivenWpCore;
use Dotenv\Dotenv;
class Helper
{
    private static $WARP_API_HOST;
    private static $WARP_AI_HOST;
    private static $WARP_DATA_HOST;
    private static $WARP_ERP_HOST;
    public  static $WARP_INIT_PAGE;

    public static function init()
    {
        
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));

        $dotenv->safeLoad();

        $_ENV['WARP_MODEL'] = $_ENV['WARP_MODEL'] === 'STG'?"_".$_ENV['WARP_MODEL']:'';
        
        self::$WARP_API_HOST = $_ENV['WARP_API_HOST'.$_ENV['WARP_MODEL']];
        self::$WARP_AI_HOST = $_ENV['WARP_AI_HOST'.$_ENV['WARP_MODEL']];
        self::$WARP_DATA_HOST = $_ENV['WARP_DATA_HOST'.$_ENV['WARP_MODEL']];
        self::$WARP_ERP_HOST = $_ENV['WARP_ERP_HOST'.$_ENV['WARP_MODEL']];
        self::$WARP_INIT_PAGE = $_ENV['WARP_INIT_PAGE'.$_ENV['WARP_MODEL']];
        
    }

    /**
     * Query similar products according to product ID
     *
     * $search_url       address
     * $api_key          authorization key
     * $website_code    Visual Search Website identity
     * $product_id      product ID
     *
     * return
     * [
     *      {
     *          "product_id": 956,
     *          "distance": 0.11267366409301759,
     *          "recall_type": "1"
     *      },
     *      ... ...
     * ]
     */
    public static function visual_search($api_key, $product_id)
    {
        $search_url =  self::$WARP_AI_HOST.'/vs/internal_search';
        $search_url .= '?' . http_build_query(array(
                    'shop_variant_id' => $product_id
                )
            );
        $response = wp_remote_post($search_url,array("headers"=>array("X-API-Key"=>$api_key),"timeout"=>1200));
        if (!is_wp_error($response)) {
            $result = json_decode($response['body']);
            if(!is_array($result)){
                return array(); 
            };
            return $result;
        }else{
            return array();
        }
    }

    /**
     * Image Processing History
     * 
     * $api_key          authorization key
     * $page_no         page number
     * $page_size       page Size
     * 
     */
    public static function handle_history($api_key, $page_no,$page_size)
    {
        $search_url = self::$WARP_DATA_HOST.'/product/handle_history';
        $search_url .= '?' . http_build_query(array(
                    'page_no' => $page_no,
                    'page_size' => $page_size
                )
            );
        $response = wp_remote_get($search_url,array("headers"=>array("X-API-Key"=>$api_key),"timeout"=>1200));
        return self::response($response);
    }


        /**
     * Initialize product image
     * 
     * $api_key          authorization key
     * $args            init args
     */
    public static function init_products($api_key, $args)
    {
        $search_url = self::$WARP_DATA_HOST.'/product/upsert/';
        $response = wp_remote_post($search_url,array("headers"=>array("X-API-Key"=>$api_key,"Content-Type"=>"application/json"),"body"=>$args,"timeout"=>1200));
        return self::response($response);
    }


    /**
     * delete product
     * $api_key          authorization key
     * $args {
     *      "delete_shop_variant_ids": [
     *           "001", "002"
     *       ]
     *   }
     */
    public static function delete_product($api_key, $args)
    {
        $search_url = self::$WARP_DATA_HOST.'/product/delete';
        $response = wp_remote_request($search_url,array("method"=>"DELETE","headers"=>array("X-API-Key"=>$api_key,"Content-Type"=>"application/json"),"body"=>$args,"timeout"=>1200));
        return self::response($response);
    }

    /**
     * Get category status stats
     * $api_key          authorization key
     */
    public static function get_category_status_stats($api_key)
    {
        $search_url = self::$WARP_DATA_HOST.'/product/get_category_status_stats';
        $response = wp_remote_get($search_url,array("headers"=>array("X-API-Key"=>$api_key)),array("timeout"=>1200));
        return self::response($response);
    }

    /**
     * Get initialization status
     * $api_key          authorization key
     */
    public static function get_vs_credit_status($api_key)
    {
        $search_url = self::$WARP_AI_HOST.'/vs/get_vs_credit_status?plan_id=1';
        $response = wp_remote_get($search_url,array("headers"=>array("X-API-Key"=>$api_key),"timeout"=>1200));
        return self::response($response);
    }


    /**
     * Get initialization products list 
     * $api_key          authorization key
     */
    public static function get_products_by_status_list($api_key,$status=1)
    {
        $search_url = self::$WARP_DATA_HOST.'/product/get_products_by_status?status='.$status;
        $response = wp_remote_get($search_url,array("headers"=>array("X-API-Key"=>$api_key),"timeout"=>1200));
        return self::response($response);
    }

    /**
     * get_erp_website
     *         
     */
    public static function get_erp_website()
    {
       return self::$WARP_ERP_HOST;
    }


    /**
     * get_user_exsited
     * $email         email
     */
    public static function get_user_exsited($email)
    {
        $search_url = self::$WARP_API_HOST.'/erp_user?erp_user_email='.$email;
        $response = wp_remote_get($search_url,array("timeout"=>1200));
        return self::response($response);
    }
    

     /**
     * create_erp_user
     * $arg           Erp User
     */
    public static function create_erp_user($args)
    {
        $search_url = self::$WARP_API_HOST.'/erp_user/create';
        $response = wp_remote_post($search_url,array("headers"=>array("Content-Type"=>"application/json"),"body"=>$args,"timeout"=>1200));
        return self::response($response);
    }


    /**
     * create_erp_user
     * $arg           Erp User
     */
    public static function my_website($args)
    {
        $search_url = self::$WARP_API_HOST.'/my_website';
        $response = wp_remote_post($search_url,array("headers"=>array("Content-Type"=>"application/json"),"body"=>$args,"timeout"=>1200));
        return self::response($response);
    }

     /**
     * create_my_website
     * $arg           Erp User
     */
    public static function create_my_website($args)
    {
        $search_url = self::$WARP_API_HOST.'/my_website/create';
        $response = wp_remote_post($search_url,array("headers"=>array("Content-Type"=>"application/json"),"body"=>$args,"timeout"=>1200));
        return self::response($response);
    }

    
    /**
     * Standard return results
     */
    public static function response($response,$args='{}'){
        error_log(print_r($response, true));
        if (!is_wp_error($response)) {
            $result = json_decode($response['body']);
            $result->code = $response['response']?$response['response']['code']:200;
            if($result->detail){
                $result->status = false;
                $result->msg = $result->detail;
            }
            return $result;
        }else{
            return $response;
        }
    }

    /**
     * Standard return results
     */
    public static function response_by_get($response,$args='{}'){
        if (!is_wp_error($response)) {
            $result = json_decode($response['body']);
            if(!$result) return $response;
            $result->code = $response['response']?$response['response']['code']:200;
            if($result->detail){
                $result->status = false;
                $result->msg = $result->detail;
            }
            return $result;
        }else{
            return $response;
        }
    }
}
