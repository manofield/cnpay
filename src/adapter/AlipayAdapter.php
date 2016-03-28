<?php
namespace manofield\cnpay\adapter;
use manofield\cnpay\AdapterPayment;
use manofield\cnpay\PaymentConfig;
use manofield\cnpay\PayException;

class AlipayAdapter implements AdapterPayment
{
    private $config;
    public function __construct(PaymentConfig $config){
        $this->config=$config;
        if(!$this->alipayCfg){
            throw new PayException('Not find the configration of alipay');
        }
    }
       
    public function orderid(string $orderid)
    {
        $this->config->with("out_trade_no",$orderid);
        return $this;
    }
    public function money(float $money)
    {
        $this->config->with("total_fee",$money);
        return $this;
    }
    public function subject(string $subject)
    {
        $this->config->with("subject",$subject);
        return $this;
    }
    public function notifyurl(string $url)
    {
        $this->config->with("notify_url",$url);
        return $this;
    }
    public function callbackurl(string $url)
    {
        $this->config->with("call_back_url",$url);
        return $this;
    }

    public function merchanturl(string $url)
    {
        $this->config->with("merchant_url",$url);
        return $this;
    }

    public function qrcode()
    {
        return $this;
    }

    public function display($capture){
        $xml=$this->config->getPackage();
        echo $xml;
    }
}
