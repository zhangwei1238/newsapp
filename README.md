# newsapp
一个新闻类app后台，基于为api而生的tp5。

亮点：
重新api模块下api异常处理类。
api接口的安全性解决。
通过采用ajax异步上传图片到七牛云解决服务器的压力。
使用阿里大于短信。
登陆token解决登陆安全性问题。

api接口采用aes加密算法，通过当前时间戳，headers部分信息，以及加密key获得sign。
以保证api接口的安全。
