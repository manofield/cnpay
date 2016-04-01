<?php
namespace manofield\cnpay;

class PaymentFacade
{
    public static function payWith($config)
    {
        $mgr=new PaymentManager();
        return $mgr->getDriver($config); 
    }
}
