<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091800543481",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEA4+K0Fx82m3g1nEygcbawqNhrJr+gEEgQpXZkgYjfjOvtxVSaQfK0Yj7felGF0GKtRa3BwkvKnkkCsB60cmwQOph3Uuf8zPktS/IYq3/fXJJuOn68ytZvKj/0VzoqiEoBe/o6ffqWbiKIytKy+KWb0mOU0VRjdv55IU4Doa4Brr0bE8/coNkmhZ+1BPOI/7SmdyFu6qbt8QJ1tMFW44CzuIcK+Gve6yEs6kOLz9QmpDuxoYslTovwa3RB8HmPD03aQcyLlNdQH4zVZRSG74ZEX+weCuMbAfWcFzt8+uLm6YwXTwNXrZ3xxijPQjNJH1HURDE4zwpy0ueuIXjIDNG1oQIDAQABAoIBAQCgxofiLD5dj4DbReCIeajHZvCqBNYLxpwf8JhWH1gA108IQnkWgAItskf+x1dOPuAaYc1qpAhOhhokYXVTqNQGUx0UW+GqRz5i72niTTQr3o9wK4xM2t7RAxADHmF1iCjl7BOqX8oT5790wRRNgqGd3G3ZBd2qzTxud9juD5LWUPWKSTjo2EgiaPiRR+Q32nOFOaQJgJ8EghBGMSWcPuTwceM3iTRSVetKIMO44d2+URTXD22kNe2BXx7AVwr10uu8xM2VTwf+/9RTMHCess0G+Gl2QrCjvbA8FT3v/wt1cGbcZCsRzuGlnoI3iVTVg7M+q8HoYQdsDNq3IxGPTdO1AoGBAPydJZ1xIK1LY4ZDr0KRFQ59DB6V2yHqhIlmyRXyQFCfuN8Xpo3re5ovnCFCm07wtpeqTFOg0G0zeQWiS5EdYwg7TczAJMjyF2nSKouWrrl5qhb5ChMh5P0SgLEvSYRQ+SqpSbrDbsPkkYWBk5QaZ7rZpCqMvZYZIu78TXw/LyjvAoGBAObws1evluTEsjKEvK8wD4V2x5xEI1iGEst54msGTJmajwWSpU3VjMsCYxVMtIugR+i3VXin+3Os71vSvuydqoULgLhXWrbkghjxtusAgHDclTg0QemxPq5YZcNx1Te3mMZoFbxDfzcRwPgehH9sxMzH43aw+ThzmyaalkFuVGpvAoGAYOErwdvW+l8FRkLC/jaB6tKOSVSTe8hjGAbxa5dCjykST4zUdW0wNAu6Rw8yXO34OOY464GrLZYl/cEmVfr9NfT4e2PdN6uQyyas5mfdjohYcQMFmBzRozTrYgiOm04qoO/XtOaqnjoUjS0KmiweSAyb5y2er+fn+9uLI/FfdsUCgYBB64UVy35D8M141CDT1OEpVJ1nwp9gPm0Q/cqeiB7HXbHjgleDHyjgLd9AjjOfA3JjQCm6liCVhVCRoldzTRIGhiEI/Y5cVF+6ZQy0ieEf1icV8vy5iyl8NKlfn5egHt0SDVXe9llSy9OMP5HMmayXU5tfHucUsRMhctDe/nJEKwKBgFv6tt4IBlgcRKcFrou5oGXkKU8xOK1QvjN7KnL42tcym5nR9yLX9W+aR9T+9XyxvqeaNg4y5bSGoJlKFPfMUZusHD0VpknpOcnm3jKXGiCEQGlxY/J2zvjAevjWsot27E2R6RffFoiQHvU/XYF9Nan8Ow6KNAiEKunfDPKZtXzB",
		
		//异步通知地址
		'notify_url' => "http://www.shop.com/Api/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.shop.com/Home/Payment/AlipayReturnUrl.html",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs3S5MZsj2WounkpFCNISrYEjQCh/XUyO8blffQ8UnM5kB64MEqphz7eVlzwpgUOjXhtrdEd/lT4UrEUVOCzWza+MkQWAqSDNpJkcRMjudN6AJj4a+QnvOap0TfcRcUROB4KvzvQyDmadXMG8ZOK+QMvxCqkP9q+Q9IyUam7TcyPdd2CYAnqGth0FdnHn8Ydxpr0AXJ1JqWUYGjRc1ycE4GrCv/8U4IAkAJGtE02dlh16GdnjT0tcCubOZVN/WnayhOLRvVaaL+2Ip+r6tCrsPZhtdUGA62Phfc7S6ky0lVr/xudHi1jMvJt55nCmGFrKohpEMQYY/y7y7fxFcl02FQIDAQAB"
    );