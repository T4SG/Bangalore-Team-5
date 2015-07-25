create table program_manager
(
program_manager_id number, -- primary key
manager_name varchar2(100), 
phone_num number(12),
address varchar2(200)
);



create table visitation
( 
visitation_id number,
visitation_date date,
program_manager_id number,
class_observation_id,
school_observation_id,
last_visitation_date date,

);



create table priorities 
(priority_id number,--primary key
priority_domain varchar2(50),
priority_description(400),
workshop_id number,--foriegn key referential integrity
comment_id number, --foriegn key referential integrity




);

create table comments
( comment_id number, --primary key
  comment_description varchar2(1000),
  priority_id number,--foreign key
  
  
);

create table class_observation
(
class_observation_id number,
student_behaviour varchar2(1000),
teacher_strength varchar2(1000),
teacher_improvement varchar2(1000),
attribute1 varchar2(1000),
attribute2 varchar2(1000)
);

create table school_observation
(school_observation_id number,
floor_description varchar2(1000),
sanitation_description varchar2(1000),
water_facilities varchar2(1000),
infrastructure_description varchar2(1000),
safety_description varchar2(1000),
attribute1 varchar2(1000),
attribute2 varchar2(1000)
);

create table workshop
( workshop_id number,
  name varchar2(100),
  description varchar2(500),
  leader_id number,
  location varchar2(100),
 );
 
