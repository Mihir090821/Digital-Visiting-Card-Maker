create database Digital_Visa;
use Digital_Visa;


create Table Admin1(

Id int not null auto_increment,
rol int not null ,

Fname varchar(30) not null,
Sname varchar(30) not null,

Uname varchar(30) not null unique,
Pass varchar(30) not null unique,

Mo int1(10) not null unique,
Email varchar(30) not null unique,

Pincode int not null,
primary key(Id)

);