CREATE TABLE Committee (
  subcommittee_name varchar(100) not null primary key,
  Chair_name varchar(50)
);

CREATE TABLE Subcommittee (
  ID char(4) not null,
  Subcommittee_name varchar(100) not null,
  Person_name varchar(50),
  PRIMARY KEY (ID),
  foreign key (Subcommittee_name) references Committee (subcommittee_name) 
	on delete cascade
);

create table Professionals (
	ID char(3) not null,
	name varchar(50) not null,
	fee varchar(4),
	primary key (ID)
);

CREATE TABLE Housing_list (
  room_number char(4),
  beds char(1),
  num_students char(1),
  primary key (room_number)
);

CREATE TABLE Students (
  ID char(4) not null,
  name varchar(50) not null,
  fee varchar(4),
  room_number char(4),
  primary key (ID),
  foreign key (room_number) references Housing_list (room_number) on delete set null
);
	
CREATE TABLE Companies (
  company_name varchar(50) not null,
  sponsor_level varchar(10),
  total_email char(1),
  sent_email char(1),
  fee varchar(10),
  primary key (ID)
);

CREATE TABLE Sponsors (
  ID char(6),
  name varchar(50) not null,
  company varchar(50) not null,  
  PRIMARY KEY (ID),
  foreign key (company) references Companies (company_name) on delete cascade
);

CREATE TABLE Job_ads (
  job_ID char(5) not null primary key,
  job_title varchar(100) not null,
  job_location varchar(50) not null,
  pay_rate varchar(10),
  company varchar(50) not null,
  foreign key (company) references Companies (company_name) on delete cascade
);

CREATE TABLE Sessions (
  session_name varchar(100) not null primary key,
  the_date char(10) not null,
  start_time char(5) not null,
  end_time char(5) not null,
  location varchar(50) not null,
  speaker char(3),
  foreign key (speaker) references Professionals(ID) on delete set null
);

		





