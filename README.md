# Package analytic/cunghocvui
Sử dụng package để lấy dữ liệu từ Google Analytic của website: https://cunghocvui.com/
### Installation
1. Chạy ứng dụng thông qua composer: composer require analytic/cunghocvui
2. Publish config file của package: 
php artisan vendor:publish--provider="CungHocVui\Analytics\AnalyticsServiceProvider"
3. Copy key vào đường dẫn storage/app/analytic
### Usage
1. Lấy thông tin của đường dẫn: GACungHocVui::searchPagePath($path)
2. Query lấy dữ liệu: GACungHocVui::performQuery($query)