<?php 
return [
	// 加密盐配置
	'password_pre_halt' => '_#weier',
	// aeskey密钥 服务端和客户端必须保持一致 16, 24 or 32位
	'aeskey' => 'zhangwei19950311',
	'apptypes' => [
		'ios',
		'android',
	],
	'app_sign_time' => 10,   // sign过期时间
	'app_sign_cache_time' => 20, // sign缓存过期时间

];