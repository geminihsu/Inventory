# Inventory
The Web site allow user to access data from mysql database. It also support insert item into database and query item from database by Warehouse column.
# Software
**Operation System :** macOS Sierra version 10.12.1  
**Web Server version :** Apache/2.4.28 (Unix)  
**PHP version :** 5.6.25 (cli) (built: Sep  6 2016 16:37:16)  
Copyright (c) 1997-2016 The PHP Group  
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies  
**DataBase version :** 5.7.17 MySQL Community Server (GPL)

# Prerequisites

1. Enable Apache on Mac OS X 
```Bash
apachectl start
```
2. Enable PHP for Apache  
```Bash
cd /etc/apache2/
```
```Bash
cp httpd.conf httpd.conf.bak
```
```Bash
vi httpd.conf
```
```Bash
rm '#' LoadModule php5_module libexec/apache2/libphp5.so
```
3. apachectl restart

# Data preprocessing

1. The first of all, created the FGTransaction table.
```Bash
create table FGTransaction(Seq BIGINT AUTO_INCREMENT primary key NOT NULL,Warehouse VARCHAR(50) NOT NULL,ModelNo VARCHAR(50) NOT NULL,SN VARCHAR(50) NOT NULL,Quantity int NOT NULL,TrnTime DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL); 
```
The table schema below  
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/TableSchema.png)


2.  Secondly, modified the TrnTime column default value is current timestamp.  
```Bash
Alter table FGTransaction MODIFY TrnTime DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL;
```
3.  Finally, inserted Content example. 
* Insert Item
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W1','M01','M01001',1);
```
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W1','M01','M01001',-1);
```
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W1','M01','M01001',1);
```
* Delete Item
```Bash
delete from FGTransaction where Seq = 3;
```
* Insert Item(The seq will continue increase because the column attribute is AUTO_INCREMENT)
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W1','M01','M01002',1);
```
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W1','M01','M01003',1);
```
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W2','M01','M01004',1);
```
```Bash
Insert into FGTransaction(Warehouse,ModelNo,SN,Quantity) VALUES('W2','M02','M02001',1);
```
The table data below  
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/DataProcessing.png)


4. After established the database and then we can start insert data and query data from table. 

* Query W1
```Bash
select ModelNo,sum(Quantity) As OnHand from FGTransaction where Warehouse = 'W1' group by ModelNo;
```
* Query W2
```Bash
select ModelNo,sum(Quantity) As OnHand from FGTransaction where Warehouse = 'W2' group by ModelNo;
```
* Query ALL
```Bash
select ModelNo,sum(Quantity) As OnHand from FGTransaction group by ModelNo;
```


# Web Page Architecture

The web site only have three page. The index.html has two button allow you to redirect to different pages.

# Index Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/index.png)

# Item Insert Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/InsertItem.png)

# Item Query Page
![alt text](https://github.com/geminihsu/Inventory/blob/master/screenshot/QueryAll.png)
