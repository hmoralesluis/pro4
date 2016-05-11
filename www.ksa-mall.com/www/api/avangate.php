<?php
class Avangate {
    private $merchant_id = null;
    private $merchant_secret = null;
    private $host_url = 'https://secure.avangate.com';
    private $api_url = '/api/order/2.3/rpc/';
    
    private $session_id = null;
    
    public function __construct($merchant_id, $merchant_secret) {
        $this->merchant_id = $merchant_id;
        $this->merchant_secret = $merchant_secret;
        
        $this->ping_session();
    }
    
    public function login(){
        if($this->get_session_id()){
            return array(
                'status' => 'success'
            );
        }
        
        date_default_timezone_set("UTC");
        $now = date("Y-m-d H:i:s", time());
        $string = strlen($this->merchant_id) . $this->merchant_id . strlen($now) . $now;
        $hash = $this->hmac($this->merchant_secret, $string);
        
        $i = 1;
	$jsonRpcRequest = new stdClass();
	$jsonRpcRequest->jsonrpc = '2.0';
	$jsonRpcRequest->method = 'login';
	$jsonRpcRequest->params = array($this->merchant_id, $now, $hash);
	$jsonRpcRequest->id = $i++;
        
        $session_id = $this->callRPC($jsonRpcRequest, $this->api_url, true);
        if($session_id['status'] == 'success'){
            $this->set_session_id($session_id['response']->result);
            return array(
                'status' => 'success'
            );
        }else{
            return array(
                'status' => 'error',
                'msg' => $session_id['error']
            );
        }
    }
    
    public function set_session_id($session_id){
        $_SESSION['avangate']['session_id'] = $session_id;
        $this->session_id = $session_id;
    }
    
    public function get_session_id(){
        if(isset($_SESSION['avangate']['session_id'])){
            return $this->session_id = $_SESSION['avangate']['session_id'];
        }else{
            return $this->session_id = null;
        }
    }
    
    public function set_currency($currency){        
        $i = 1;
	$jsonRpcRequest = new stdClass();
	$jsonRpcRequest->jsonrpc = '2.0';
	$jsonRpcRequest->method = 'setCurrency';
	$jsonRpcRequest->params = array($this->get_session_id(), $currency);
	$jsonRpcRequest->id = $i++;
        
        return $this->callRPC($jsonRpcRequest, $this->api_url, true);
    }
    
    public function get_all_products(){
        $i = 1;
	$jsonRpcRequest = new stdClass();
	$jsonRpcRequest->jsonrpc = '2.0';
	$jsonRpcRequest->method = 'searchProducts';
	$jsonRpcRequest->params = array($this->get_session_id(), array(
            'category'=> 'Subscriptions',
        ));
	$jsonRpcRequest->id = $i++;
        
        return $this->callRPC($jsonRpcRequest, $this->api_url, true);
    }
    
    public function get_product_by_id($product_id){
        $i = 1;
	$jsonRpcRequest = new stdClass();
	$jsonRpcRequest->jsonrpc = '2.0';
	$jsonRpcRequest->method = 'getProductById';
	$jsonRpcRequest->params = array($this->get_session_id(), $product_id);
	$jsonRpcRequest->id = $i++;
        
        return $this->callRPC($jsonRpcRequest, $this->api_url, true);
    }
    
    public function update_product($product_id, $price){
        $product_res = $this->get_product_by_id($product_id);
        
        if($product_res['status'] == 'success'){
            $product = $product_res['response']->result;            
            $product->price = $price;
            
            $this->host_url = '';
            $host = 'https://api.avangate.com/product/2.5/rpc/';

            date_default_timezone_set("UTC");
            $now = date("Y-m-d H:i:s", time());
            $string = strlen($this->merchant_id) . $this->merchant_id . strlen($now) . $now;
            $hash = $this->hmac($this->merchant_secret, $string);

            $i = 1;
            $jsonRpcRequest = new stdClass();
            $jsonRpcRequest->jsonrpc = '2.0';
            $jsonRpcRequest->method = 'login';
            $jsonRpcRequest->params = array($this->merchant_id, date('Y-m-d H:i:s'), $hash);
            $jsonRpcRequest->id = $i++;
            $sessionID = $this->callRPC($jsonRpcRequest, $host);

            
            $jsonRpcRequest = array (
                'jsonrpc' => '2.0',
                'id' => $i++,
                'method' => 'getPricingConfigurations',
                'params' => array($sessionID['response']->result, $product->ProductCode)
            );
            $price_configuration_res = $this->callRPC($jsonRpcRequest, $host);
            $price_configuration = $price_configuration_res['response']->result;
            
            $price_configuration[0]->Prices->Regular[0]->Amount = $price;
            
            $jsonRpcRequest = array (
                'jsonrpc' => '2.0',
                'id' => $i++,
                'method' => 'updatePricingConfiguration',
                'params' => array($sessionID['response']->result, $price_configuration[0], $product->ProductCode) //Use product ID and not product code for API versions smaller than 2.5
	);
            return $updatedProduct = $this->callRPC($jsonRpcRequest, $host);
        }
        return false;
    }
    
    public function callRPC ($Request, $url, $debug) {
        $curl = curl_init($this->host_url . $url);        
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSLVERSION, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        
        $RequestString = json_encode($Request);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $RequestString);
            
        if ($debug) {
            $RequestString;
        }

        $ResponseString = curl_exec($curl);
        if ($debug) {
            $ResponseString;
        }
        
        if (!empty($ResponseString)) {
            $Response = json_decode ($ResponseString);
            if (isset($Response->error)) {
                return array(
                    'status' => 'error',
                    'error' => $Response->error->message
                );
            }
            
            if (json_last_error() == JSON_ERROR_NONE) {
                return array(
                    'status' => 'success',
                    'response' => $Response
                );
            } else {
                return array(
                    'status' => 'error',
                    'msg' => $ResponseString
                );
            }
        } else {
            return array(
                'status' => 'error',
                'msg' => 'RESPONSE_EMPTY'
            );
        }
    }
    
    private function hmac ($key, $data){
        $b = 64; // byte length for md5
        if (strlen($key) > $b) {
            $key = pack("H*",md5($key));
        }
        
        $key = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad ;
        $k_opad = $key ^ $opad;
        return md5($k_opad . pack("H*",md5($k_ipad . $data)));
    }
    
    private function ping_session(){
        $session_id = $this->get_session_id();
        
        if($session_id == null){
            unset($_SESSION['avangate']['session_id']);
            $this->login();
            return;
        }
        
        $i = 1;
	$jsonRpcRequest = new stdClass();
	$jsonRpcRequest->jsonrpc = '2.0';
	$jsonRpcRequest->method = 'setCurrency';
	$jsonRpcRequest->params = array($this->get_session_id(), "USD");
	$jsonRpcRequest->id = $i++;
        
        $result = $this->callRPC($jsonRpcRequest, $this->api_url, true);
        if($result['status'] == 'error'){
            if(strpos($result['error'], 'FORBIDDEN') !== false){
                unset($_SESSION['avangate']['session_id']);
                $this->login();
                return;
            }
        }
    }
}
?>
