<?php
namespace manofield\cnpay;

class PaymentConfig
{
    private $data;
    private $order;
    private $gate;
    public function __construct($config)
    {
    }
    public function alipay()
    {
        return Array();
    }
    public function wechatpay()
    {
        return Array();
    }
    public function unionpay()
    {
        return Array();
    }

    public function with(string $key,$value)
    {
        $this->order.=sprintf("<%s>%s</%s>",$key,$value,$key);
        return $this;
    }

    public function getPackage(){
        return $this->order;
    }
}
