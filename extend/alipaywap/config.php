<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2021001175632458",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAgzDtlL5C33klqRRcm5LhTCSh6mLIghHnVPoTiInurJ1icu11GUfx4KJGJWwdhRablQpBu+Xz1eUK4svXalMC+VwzRfJ7ymyc+hrBB7QMt6GvyIi5FjxC1eYRVfWTGPUWqxDY5JyBSqFgUbRocejowBLWYwquPp4LUNB5r7rOiWPwn8kJMXTZDs3y6mDcGomtPphAAurgpg4cCdNpVrar/xJwX+53X2TjlTNOOiFcIyqD4XbWeKCquQPl16aPRjpnqggjtR0ioudXYxRkbRa8l8kLxkir9A9qbieeGCn2d16Dz1nYa2OIdUCHq7QepHSvfShPJ5fFqvl92KM2Crp0FwIDAQABAoIBAFJt+blN2oLDgfA8xPtTTJAlLD8zFjzztuBjyMYvtHFs6iDAJqVd2RKFo4F77whibhs1OJwxHgY1RaO+5Hj/84xubCD0/ObxW6iiCssmTB9NTj+3+GOKNYxkZFwYUvaJeFa/3Se3Vl1oDDcKHd4Es8mLjHzqhxT9BKsgcnUB8SfNZxYmzUV9vdt3Sj7EAu07ASZxStdkR32+0/VhPCG3+pQmsPtOIqIAsBKvI01kF1j/CVKdJS+d/0Tziz+AM6igN9c/cRc75+vqQivjJ4h4KmYomwkV0FerS3i6svOZYhkqXW6fiJu2ygB9tyOsZOC1zMkzT+tLlYYVYbS3mm7eUCECgYEAwQQcjq27CvliODESsL6JIj6IXwIQwuK7FDyx3U+DQ4lRUnxVxmmTEVv/4Op4QLMerEzuQ6GgiexpUaDrDKhm6FhVnQNR+BNxl/0nsYZSlwSEoVcnCwK5q/Ht1YbW0TPy/bmoieQrBzsrz9XR3aZ5hnGdJSSyVG2w6PjFMktANK8CgYEArgAtUkoQWTXtmjviPuXLT7gd/uoz+4H1Los2QJk/cTAODNrPrIudNpSrQ6eSTIg3GO8/bTkIqiZYmpX6nfpr7uDzsJFCsqZTG0IhvsDR7jSXAZgSFwerGF6FLyUWFb4W2ICeE48rcEi3oNyQTJLVqb3LVy37iDtJ2eGv1zgxYRkCgYEAiR3/n4hhsNka4mpSKcchqncb78qK17e0SRsZC+w5htfdMqjrUmmbtaBStZg711Kn/qUkOl1uq6yL4RZdBH/5oyNlpoY+S+qcLuoDscSHlYr7IZbFQLgt6K2UVLVWlAXAoGitB1BVFOz/IcV3MmvaNx0tEr7wBLRsEgTwKdt1gDcCgYA1O5SiAkqyIE+KyhtThtYGk5uJq3kvzviFvs1gQgIozLzfremvLh9w3VbwIcoeY+YHWNqcvcAq3gRpdszvm/d9Y5DqSeaP5Vazli3gv/j52VkBgda2+P+dOv2gCMaS7E7s+Zxi+4AcoAKd0hzLcHixr4EQMN8tNIZJhERZobVpsQKBgQCncWBzlz5X2V4MT4r/VS+mFwUeE5WTPCBAuyTsL6Qd+4zKIp2qr268YFkKLL59tQGZ/GA/5MGdMD10oEK3eJCB5nWkJCSt1rmlT38IClXK3b9TUXDF8i2S1VEkhcTRbt6R3603sArOXg8WTT9aYYZKkpcAenniNg4oXQqgx+lbdw==",
		
		//异步通知地址
		'notify_url' => "http://a.x.cn/index/alipay/notify",
		
		//同步跳转
		'return_url' => "http://a.x.cn/index/alipay/return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtJGxI4B2seetGPBTZzGX48CSf7GfmwUB7cItd/twkYdXKC0rfkZ3mIfG/7zwZry4R1QavUA4BUnCeq9OomDwA/Sy6NXqTZAC9vafmG/ZRjzzjJDxxMwOnBYYC1bOLSzsN4zd+Haimm8NYSNMxFy/Tq16qYwFiJ7FrTrDkQptJNtihWJqCzxqm5D2rbBNqYxyYUL007Nd9774k8EJBFSBYngt8RVyTPW8vDkdKBmuZssMh89e32eGYKUMoq36L5bwlkmmESH2On5X+RuIA2ZbSDRnFpIPDPeptrHwHe3BQgFwDo6tSL0Bb34UO5/30gVkneXyDYw+KR+I40Dl/MASKwIDAQAB",
);