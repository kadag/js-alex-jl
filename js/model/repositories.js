function repositoryClass()
{
	this.idRepository;
	this.repositoryName;
    this.idUser;
    this.idProject;

	this.construct = function (id, repositoryName, idUser, idProject)
	{
		this.setIdRepository(idRepository);
		this.setRepositoryName(repositoryName);
		this.setIdUser(idUser);
		this.setIdProject(idProject);
	}
	
	this.setIdRepository = function (idRepository) {this.idRepository=idRepository;}
	this.setRepositoryName = function (repositoryName) {this.repositoryName=repositoryName;}
	this.setIdUser = function (idUser) {this.idUser=idUser;}
	this.setIdProject = function (idProject) {this.idProject=idProject;}
	
	this.getIdRepository = function () {return this.idRepository;}
	this.getRepositoryName = function () {return this.repositoryName;}
	this.getIdUser = function () {return this.idUser;}
	this.getIdProject = function () {return this.idProject;}

}
