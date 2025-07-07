alter table student_classes add column year_of_study int(10) not null;
update student_classes set year_of_study=1;
alter table course_results add column year_of_study int(10) not null;
update course_results set year_of_study=1;
alter table semester_results add column year_of_study int(10) not null;
update semester_results set year_of_study=1;
alter table annual_results add column year_of_study int(10) not null;
update annual_results set year_of_study=1;

alter table exam_category_results add column uploadedby varchar(200) not null
alter table course_results add column uploadedby varchar(200) not null
alter table semester_results add column uploadedby varchar(200) not null
 null
alter table annual_results add column uploadedby varchar(200) not null

alter table students modify column form4_index_no varchar(100) default null
 alter table  course_result_summaries add column program_id int(2) not null after year_id ;
