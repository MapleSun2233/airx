# AIRX 毕业设计
## 说明
* 该项目来自世界技能大赛 网站开发项目 湖北省选拔赛，仅供参考
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
