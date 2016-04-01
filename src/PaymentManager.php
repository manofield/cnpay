<?php
namespace manofield\cnpay;

class PaymentManager
{
    private $cfgdata;
    private $order;
    private $gate;
    private $adapter;
    /**
     * __construct 
     * initialize the table of adpater
     * @access public
     * @return void
     */
    public function __construct()
    {
       $this->adapter['alipay']=adapter\AlipayAdapter::class;
    }

    /**
     * getDriver 
     * 工厂方法，返回真正的支付实例
     * @param mixed $config 
     * @access public
     * @return void
     */
    public function getDriver($config)
    {
        if( !array_key_exists($config['driver'],$config) ){
            throw new PaymentException(sprintf('Not find driver configration:[%s]',$config['driver']));
        }
        if( array_key_exists($config['driver'],$this->adapter)){
            $this->cfgdata=$config[$config['driver']];
            return new $this->adapter[$config['driver']]($this);
        }
        throw new PaymentException(sprintf('Not find driver:[%s]',$config['driver']));
    }

    /**
     * __get 
     * read config data
     * @param mixed $key 
     * @access public
     * @return void
     */
    public function __get($key){
        if( array_key_exists($key,$this->cfgdata) ){
            return $this->cfgdata[$key];
        }
        throw new PaymentException(sprintf('Not find property:[%s] in configration',$key));
    }
    /**
     * with 
     * Tools function for xml
     * @param mixed $key 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function with($key,$value)
    {
        $this->order.=sprintf("<%s>%s</%s>",$key,$value,$key);
        return $this;
    }

    public function getPackage(){
        return $this->order;
    }
}
