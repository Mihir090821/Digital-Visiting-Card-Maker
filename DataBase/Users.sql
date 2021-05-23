use digital_visa;

create table users(

uid int not null auto_increment,
cname varchar(20),
fname varchar(20) ,
mo1 varchar(20) ,
sname varchar(20),
mo2 varchar(20),
email varchar(20),
color varchar(20),
logo varchar(50),

cat int not null,
primary key(uid),

foreign key(cat) references categary(cat_id)

);


alter table users
add column tmp varchar(50);
