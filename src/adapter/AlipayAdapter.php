<?php
namespace manofield\cnpay\adapter;
use manofield\cnpay\AdapterPayment;
use manofield\cnpay\PaymentManager;
use manofield\cnpay\PaymentException;
class AlipayAdapter implements AdapterPayment
{
    private $config;
    public function __construct(PaymentManager $mgr){
        $this->config=$mgr;
        if(!$this->config){
            throw new PaymentException('Not find the configration of alipay');
        }
    }
       
    public function orderid($orderid)
    {
        $this->config->with("out_trade_no",$orderid);
        return $this;
    }
    public function money($money)
    {
        $this->config->with("total_fee",$money);
        return $this;
    }
    public function subject($subject)
    {
        $this->config->with("subject",$subject);
        return $this;
    }
    public function notifyurl($url)
    {
        $this->config->with("notify_url",$url);
        return $this;
    }
    public function callbackurl($url)
    {
        $this->config->with("call_back_url",$url);
        return $this;
    }

    public function merchanturl($url)
    {
        $this->config->with("merchant_url",$url);
        return $this;
    }

    public function qrcode()
    {
        return $this;
    }

    public function display($capture=false){
        $xml=$this->config->getPackage();
        echo $xml;
    }
}
