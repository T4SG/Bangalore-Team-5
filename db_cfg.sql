create table program_manager
(
program_manager_id int(10) primary key,
manager_name varchar(100), 
phone_num int(12),
address varchar(200)
);



create table ISLI_visitation
( 
visitation_id int primary key ,
visitation_date date,
pm_id int,
class_observation_id int,
school_observation_id int,
last_visitation_date date,
foreign key(pm_id) references program_manager(program_manager_id)

);


create table priorities 
(
priority_id int primary key,
priority_domain varchar(50),
priority_description varchar(400)


);
create table leaders_authenticate
( 
username varchar(100),
password varchar(100)
);


create table ISLI_Comments
( comment_id int primary key,
  comment_description varchar(1000),
  p_id int,
  foreign key(p_id) references priorities(priority_id)
  
 );

create table ISLI_school_observation
(school_observation_id int primary key,
vi_id int,
floor_description varchar(1000),
sanitation_description varchar(1000),
water_facilities varchar(1000),
infrastructure_description varchar(1000),
safety_description varchar(1000),
attribute1 varchar(1000),
attribute2 varchar(1000),
foreign key(vi_id) references ISLI_visitation(visitation_id)
);

create table ISLI_Workshop
( workshop_id int primary key,
  name varchar(100),
  description varchar(500),
  location varchar(100)
 );
create table ISLI_Class_Observations
( priority_set_id integer,
vis_id int,
  city varchar(100),
  school varchar(100),
  teachers_actions varchar(100),
  students_actions varchar(100),
  teacher_strengths varchar(100),
  teacher_area_of_improvement varchar(100),
  teacher_follow_up varchar(100),
  foreign key(vis_id) references ISLI_visitation(visitation_id)
 );
 
 create table ISLI_Enroll
(
	school_name varchar(100),
	school_city varchar(100),
	principal_name varchar(100)
);
 
 