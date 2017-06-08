<?php

require 'class.CurlWrapper.php';

/**
 * LoLWPAPI - PHP wrapper for the LoLWallpapers API
 *
 * @author Artyum <artyum@protonmail.com>
 * @link https://github.com/ArtyumX/php-lolwp-api
 */
class LoLWPAPI {
    
    private $apiLink = 'https://api.lolwallpapers.net/alpha/';
    
    private $apiKey;
    
    private $Endpoint;
    
    private $curl;
    
    private $params = array();
    
    private $outputType;
    
    function __construct($apiKey) {
        $this->curl = new CurlWrapper();
        $this->apiKey = $apiKey;
    }
    
    public function result() {
        if (!$this->Endpoint) {
            throw new Exception("Endpoint cannot be null.");
        }
        $this->curl->addHeader('Authorization', $this->apiKey);
        $reponse = $this->curl->get($this->apiLink . $this->Endpoint, $this->params);
        if ($this->outputType == 'json') {
            return $reponse;
        } else {
            return json_decode($reponse, TRUE);
        }
    }
    
    public function setOutputType($type) {
        $this->outputType = $type;
    }
    
    /* Endpoints */
    public function getWallpapers($ID = NULL) {
        if ($ID) {
            $this->Endpoint = 'wallpapers/' . $ID;
        } else {
            $this->Endpoint = 'wallpapers';
        }
        return $this;
    }
    
    public function getCategories($ID = NULL) {
        if ($ID) {
            $this->Endpoint = 'categories/' . $ID;
        } else {
            $this->Endpoint = 'categories';
        }
        return $this;
    }
    
    public function getArtists($ID = NULL) {
        if ($ID) {
            $this->Endpoint = 'artists/' . $ID;
        } else {
            $this->Endpoint = 'artists';
        }
        return $this;
    }
    
    public function getComments($ID = NULL) {
        if ($ID) {
            $this->Endpoint = 'comments/' . $ID;
        } else {
            $this->Endpoint = 'comments';
        }
        return $this;
    }
    
    /* Query Parameters */
    public function page($page) {
        $this->params['page'] = $page;
        return $this;
    }
    
    public function limit($limit) {
        $this->params['limit'] = $limit;
        return $this;
    }
    
    public function order($order) {
        $this->params['order'] = $order;
        return $this;
    }
    
    public function orderby($orderby) {
        $this->params['orderby'] = $orderby;
        return $this;
    }
    
    public function category_ID($ID) {
        $this->params['category_ID'] = $ID;
        return $this;
    }
    
    public function artist_ID($ID) {
        $this->params['artist_ID'] = $ID;
        return $this;
    }
    
    public function search($search_query) {
        $this->params['search'] = $search_query;
        return $this;
    }
    
    public function hide_empty($hide_empty) {
        $this->params['hide_empty'] = $hide_empty;
        return $this;
    }
    
    public function childof($ID) {
        $this->params['childof'] = $ID;
        return $this;
    }
    
    public function childless($childless) {
        $this->params['childless'] = $childless;
        return $this;
    }
    
    public function wallpaper_ID($ID) {
        $this->params['wallpaper_ID'] = $ID;
        return $this;
    }
    
    public function parent_ID($ID) {
        $this->params['parent_ID'] = $ID;
        return $this;
    }
    
    function __destruct() {
        curl_close($this->curl);
    }
    
}
