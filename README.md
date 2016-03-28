# EmailSystem

Realization MVC pattern with PHP

## TODO
- ~~Registration~~
- ~~Authorization~~
- Password recovery and table OneTimeAuth
- ~~Attachments (Upload and download files)~~
- Multiple File Upload
- ~~WYSIWYG~~
- Design
- Filters from database queries
- Fix route.php .../index.php error!
- CRUD classes

### Tech
* [TinyMCE](https://www.tinymce.com/) - is a platform-independent, browser-based WYSIWYG editor control, written in JavaScript and released as open-source software under the LGPL by Ephox.

#### Databese MySql:
Table Messages:
```mysql
create table Messages(
	ID int not null auto_increment,
	CreationDate datetime,
	Title varchar(255),
	Body varchar(255),
	Primary key(ID)
);
```
Table Users:
```mysql
create table Users(
	ID int not null auto_increment,
	Name varchar(255),
	SurName varchar(255),
	LastName varchar(255),
	Email varchar(40) unique,
	Password varchar(255),
	activated bit not null default b'0',
	Primary key(ID)
);
```
Table Types:
```mysql
create table Types(
	ID int not null auto_increment,
	Name varchar(255),
	Primary key(ID)
);
```
Table Attachment:
```mysql
create table Attachment( 
	ID int not null auto_increment, 
	MessageID int, 
	Path varchar(255), 
	Primary key(ID), 
	CONSTRAINT fk_AttMessage FOREIGN KEY(MessageID)
	REFERENCES Messages(ID)
);
```
Table FromTo:
```mysql
create table FromTo(
	ID int not null auto_increment,
	MessageID int not null,
	UserFrom int not null,
	UserTo int not null,
	ExpiredDate datetime not null,
	TypeID int not null,
	IsRead boolean not null,
	Primary key(ID),    
	CONSTRAINT fk_FT_Message FOREIGN KEY(MessageID)
	REFERENCES Messages(ID),
	CONSTRAINT fk_FT_Users_From FOREIGN KEY(UserFrom)
	REFERENCES Users(ID),
	CONSTRAINT fk_FT_Users_To FOREIGN KEY(UserTo)
	REFERENCES Users(ID),
	CONSTRAINT fk_FT_Type FOREIGN KEY(TypeID)
	REFERENCES Types(ID)
);
```
Table OneTimeAuth:
```mysql
CREATE TABLE OneTimeAuth(
	Token char(32) not null,
	UserID int not null,
	Expire datetime default null,
	PRIMARY KEY (Token),
	CONSTRAINT fk_FT_User FOREIGN KEY(UserID)
	REFERENCES Users(ID)
);
```