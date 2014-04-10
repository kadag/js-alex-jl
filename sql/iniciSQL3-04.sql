CREATE TABLE users(
	idUser INT(5) AUTO_INCREMENT, 
	name VARCHAR(10),
	surnames VARCHAR(15),
	email VARCHAR(50),
	user VARCHAR(20),
	password VARCHAR(30),
	CONSTRAINT id_user_pk PRIMARY KEY (idUser))
	ENGINE = InnoDB;

CREATE TABLE projects(
	idProject INT(5) AUTO_INCREMENT, 
	projectName VARCHAR(20),
	CONSTRAINT id_project_pk PRIMARY KEY (idProject))	
	ENGINE = InnoDB;

CREATE TABLE repositories(
	idRepository INT(5) AUTO_INCREMENT, 
	repositoryName VARCHAR(20),
	idUser INT(5),
	idProject INT(5),
	CONSTRAINT id_repo_pk PRIMARY KEY (idRepository), 
	CONSTRAINT id_user_fk FOREIGN KEY (idUser) REFERENCES users(idUser),	
	CONSTRAINT id_proj_fk FOREIGN KEY (idProject) REFERENCES projects(idProject)
		ON DELETE CASCADE)	
	ENGINE = InnoDB;

INSERT INTO users(idUser,name,surnames,email,user,password) VALUES (1,'Alex','Sales Fabregat','alexsalesfa@gmail.com','alex','alex');

