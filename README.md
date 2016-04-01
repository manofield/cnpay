# cnpay
###TODO:项目未完成！！！,完善中


        <?php
        require("vendor/autoload.php");
        use manofield\cnpay\PaymentFacade;
        $config=Array(
            'driver'=>'alipay',
            'alipay'=>Array(
                'appid'=>'111',
                'key'=>'222',
                'secret'=>'333'
            ),
            'wechat'=>Array(
            ),
        );
        echo PaymentFacade::payWith($config)
            ->orderid('ssssssssssss')
            ->money(10.0)
            ->subject('cccc')
            ->display();

