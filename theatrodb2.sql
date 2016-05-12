CREATE TABLE IF NOT EXISTS parastaseis(
id int NOT NULL AUTO_INCREMENT,
name varchar(50) NOT NULL,
primary key(id)
);

CREATE TABLE IF NOT EXISTS seats(
id int NOT NULL,
theseis int NOT NULL,
foreign key(id) references parastaseis(id)
on delete cascade
);
