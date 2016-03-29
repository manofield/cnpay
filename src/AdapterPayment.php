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
    public function orderid($orderid);
    public function money($money);
    public function subject($name);
    public function notifyurl($url);
    public function callbackurl($url);
    public function merchanturl($url);
    public function qrcode();
    public function display($capture=false);
}
