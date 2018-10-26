<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016092200569139",//沙箱id
		//'app_id' => "2017020705555830",//生产环境

		//商户私钥
		'merchant_private_key' =>"MIIEpAIBAAKCAQEAp7E0iQ0RiiFOwLQw7MM8TDVQ5EL92tAtWPxNKZC687l6611gHKDD5dWYYSMDxnACkDA/yhEpxfTnLjONDWXcILQ6V9rgOibSoAHEdSYR/1rjVZQS2i1SjxXgQPbVrOOvSN1d9RUUB9KY5j2Np73ZGIwzx/2lLa381d4hCiOMwGCAC1BVPoi5XJODPPREqK2OknWZjdPSKJRSc0A7xT49ZBKN8m8POzL323eRNXBtcjlJj5evo95z3P+3F2GaLaNkWwRpFEKW7JemAcNriyRVJ/+6H6BVxwPVI2zQtfjr8Q8PJDE1xEPojH9Qcl61SR6F9uia218AJBE0/wc+DuVe1QIDAQABAoIBADD8CqSeNKls4VxZRpFi1pJMYLzM9OqeNSDxUnj51iKr48QtGo5CR/czVbfKSqgEwDruXTPhn5o71+wfEuz+/DZxbzmKrkVOYehrm7+8xzUYj5/ICVnCM4OomEFh2TkPqXxXbcLRzXAbjJ51DJQbWPdavSWGamHVmS3AHVag29S14qNXJGHZulEL5ZXcw+I8FYyiRrGU5jFoG/66ZJ6KcyckOYsAlSkuQ9tTf9XlTWFFxmCB8gZn1vNNXqjbV2AepuDZRx4yyIyLZDkR9e0af30Yf6Go8BPdRNdvO0pGZhKiNz/TQVTAv8XIOw9Cfmx3hV/OprD1thOtcId24/DJLwECgYEA0VzL+4AIV2c+mRqRrY7B8P4ZDkTjzHTRkFNKeGvRLyWtzNHK14YmLCuw1m1snB07cZo14iop31bD0Wbuy5B9ugZjCWkTVoU7TWLeSOOcTHVPmvf3QIKHIk+h7wJp1V39eWNaTRs/nNaFFDqIPhMHFu1mCORL+3iFah1V5f5L9mkCgYEAzQwZe4lAWooptqdvZ4JU/hCQ60zZBl3hLMxTAPTg5BKlyc2Y+4/GjN5td5R9TTt9C8JZUUS524Qkw3rTTHtC4kmAo4AL9yHg/U7mN/SoR7bA2qjiFFj0nLoQKtrMKxnAQYikZkDKrkIDNc5jtWE7PzoGR/Dq6gOK4WN3NYPaj40CgYBZpI8en6Jysh1Gdu7bTl3SLypRRsP2/ingzxj62MdXlZ2GLmnYwHLFxOtR1MaFTarvKGVb8ku9eiwcFCO4+6Qpq6RqGhiSmjdbGjMtKG/6+Nvd8cBnWbw8v7YJXZItLrJicFzw2PLy15NhpvJBCeqmMX3X3tB92wvc9LSb5rdlyQKBgQC0lKRYlL61PhqQfxLw0OpzOjm20F4Nal5l6qhrHj50/is997B0U+Hjq/wyJPbZLrvowEeS9/jK56zM733pTGDSEzOUSq++/Po9e9/qhbAyQDPGHpfEnbcH1CFq7HiEuNAFpwZJ+2PEZeSX3WUYl0HrY/mmH/lzEJ2d89BHtBCm/QKBgQC2CiiQIFdCqsVbGdaPYujegTrkZCYat4aFNxdETNxKyFy2yEd07gdZHtpetKvVGL0pKHnz9hWWuy99/qk/zjcLcdJ4F10Mx1lkWfkmdIcHQIOerTuu5eltELZNJhZElKNXak2zoasD5P6uEqPvJhPr7uP3hgTAK6FIdcYQ7mPysQ==",
		//签名方式
		'sign_type'=>"RSA2",
		//异步通知地址
		'notify_url' => "http://http://www.bio2377.com/mobile/view/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		//http://www.ali.cn/alipay.trade.page.pay-PHP-UTF-8/
		
		//同步跳转
		//'return_url' => "http://www.ali.cn/alipay.trade.page.pay-PHP-UTF-8/return_url.php",
		'return_url' => "http://www.bio2377.com/mobile/view/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",//生产环境

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		//'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
		//支付宝沙箱网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",



		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' =>"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2a9b8ZyMiYs6RanaV9ydv2j56R9p+1H6o114QXyyjIBbeSPKmtUT6e146+3lfBaoy30rAayRirjE1/xaVA6gCnMbPrb/eprBcNgT6IKAT6z9j3x07x/F7hn7z/YWPSNV+OfkgZll2WKjItpNn3qlmiXgyYObs7l9EwUqREzixN+iUlzKH89YxfNre0un0PS1FW4lgdqu+6xgQzGEpCsb9lbWoL677J7CwndGTa1i7Ayc3R0H/xLRI+Izfmnjd7V+zSY8PuKLNg1pQtkyOhPhRHim0LqT9UAE2uFai/BPA7NTu051waqa9Z8XP0Qq/wA5H3hXh9KdzGEIm0aakVArqQIDAQAB",
);