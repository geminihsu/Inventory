# Inventory
The Web site access data from mysql database table. It support insert item into database and query item from database by Warehouse column.
# Develop tool
Operation System: macOS Sierra version 10.12.1  
Server version: Apache/2.4.28 (Unix)  
PHP 5.6.25 (cli) (built: Sep  6 2016 16:37:16)   
Copyright (c) 1997-2016 The PHP Group  
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies

# Prerequisites

1. Enable Apache on Mac OS X  
apachectl start  
2. Enable PHP for Apache  
cd /etc/apache2/  
cp httpd.conf httpd.conf.bak  
vi httpd.conf  
rm '#' LoadModule php5_module libexec/apache2/libphp5.so  
3. apachectl restart

# Index Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/index.png)

# insert item Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/InsertItem.png)

# query item Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/QueryAll.png)
