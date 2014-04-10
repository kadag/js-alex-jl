function projectClass()
{
	this.idProject;
	this.projectName;
	
	this.construct = function (idProject, projectName)
	{
		this.setIdProject(idProject);
		this.setProjectName(projectName);
		
	}
	
	this.setIdProject = function (idProject) {this.idProject=idProject;}
	this.setProjectName = function (projectName) {this.projectName=projectName;}
	
	this.getIdProject = function () {return this.idProject;}
	this.getProjectName = function () {return this.projectName;}
}
