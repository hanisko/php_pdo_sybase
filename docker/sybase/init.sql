if exists (select 1 from sysobjects where name = 'tbl_string') drop table tbl_string
go
create table tbl_string(
    id 		int 			null,
    name 	varchar(600)	null,
    note	text			null
)
go

insert into tbl_string (id,name,note) values (1,'paviel', 'note note note')

go
if exists (select 1 from  sysobjects where name = 'proc_string') drop procedure proc_string
go
create procedure proc_string
as
    select * from tbl_string
go
