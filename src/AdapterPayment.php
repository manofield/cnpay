<?php
namespace manofield\cnpay;
/**
 * AdapterPayment 
 * 
 * @package manofield
 * @version 0.0.1
 * @copyright 2014-2015 ryanli.net
 * @author Liruiyan <canbetter@qq.com> 
 * @license MIT
 */
interface AdapterPayment
{
    public function orderid(string $orderid);
    public function money(float $money);
    public function subject(string $name);
    public function notifyurl(string $url);
    public function callbackurl(string $url);
    public function merchanturl(string $url);
    public function description(string $content);
    public function qrcode();
    public function display($capture=false);
}
