# AIRX 毕业设计
## 严正声明
* 本人毕业设计基于世赛AIRX项目开发，禁止盗用，仅可参考实现逻辑，谢谢
## 完成进度
1. 首页
2. 查票
3. 个人中心
4. 注册与登录
5. 订票
6. 签到
7. 选座
## 下一步计划
1. 已按要求完成所有功能
## 开发环境
* Apache 2.4.39
* MySQL 5.7.26
* PHP 7.3.4nts
* Laravel Framework 7.28.4
## 配置.env文件
* 配置数据库信息
## 检查storage/app/public目录是否存在可写
* 此目录将用于暂存用户订票信息的下载文件
## 安装依赖
```shell script
php artisan install
```
## 生成应用程序密钥
```shell script
php artisan make:generate
```
## 数据库迁移
```shell script
php artisan migrate
```
## 数据填充
```shell script
php artisan db:seed
```
## 运行
```shell script
php artisan serve
```