# 服务说明
兑换码服务客户端

## 安装

### composer配置
```
{
  "autoload": {
    "psr-4": {
      "CdkeyClient\\": "src/"
    }
  },
  
  "require": {
    "cdkey/client": "^1.0.1"
  },
}
```

### 执行命令安装
`composer install`

### 调用方法
请查看example文件夹

# 业务API接口

## 1.通讯协议
http

## 2.公共参数（url参数）

| 参数 | 类型 | 描述 |
| :--- | :--- | :--- |
| time | int | 请求时间 |
| sign | string | 签名 |

## 3.接口
地址: `http://47.100.189.18:10004/api/`

token: `xdapp.com`

验证：md5({code}{pid}{time}{token})

### 3.1领取礼券
方式：`POST`

地址：`http://47.100.189.18:10004/api/cdkey/receive?time=1517539152&sign=3c031ee08db6270190e1fc9646b6aa8e"`

参数:

| 参数 | 类型 | 必要 | 描述 |
| :--- | :--- | :--- | :--- |
| code | string | 是 | 礼包码 |
| pid | int | 是 | 角色id |

curl测试命令:`curl -d "code=GB&pid=123456" "http://47.100.189.18:10004/api/cdkey/receive?time=1517539152&sign=3c031ee08db6270190e1fc9646b6aa8e"`

### 3.2使用礼券
方式：`POST`

地址：`http://47.100.189.18:10004/api/cdkey/use?time=1517539152&sign=3c031ee08db6270190e1fc9646b6aa8e"`

参数:

| 参数 | 类型 | 必要 | 描述 |
| :--- | :--- | :--- | :--- |
| code | string | 是 | 兑换码 |
| pid | int | 是 | 角色id |

curl测试命令:`curl -d "code=009AHB03W7GT&pid=123456" "http://47.100.189.18:10004/api/cdkey/use?time=1517539152&sign=3c031ee08db6270190e1fc9646b6aa8e"`