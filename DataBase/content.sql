use digital_visa;


create table content(

cid int not null auto_increment,
cat int  not null ,
adminn int not null, 
image varchar(100) unique not null,

primary key(cid),
foreign key(cat) references categary(cat_id),
foreign key(adminn) references  admin1(Id) 
);