function usersClass()
{
	this.idUser;
	this.name;
	this.surnames;
	this.email;
	this.user;
	this.password;

	this.construct = function (idUser, name, surnames, email, user, password)
	{
		this.setId(idUser);
		this.setName(name);
		this.setSurnames(surnames);
		this.setEmail(email);
		this.setUser(user);
		this.setPassword(password);
	}
	
	this.setIdUser = function (idUser) {this.idUser=idUser;}
	this.setName = function (name) {this.name=name;}
	this.setSurnames = function (surnames) {this.surnames=surnames;}
	this.setEmail = function (email) {this.email=email;}
	this.setUser = function (user) {this.user=user;}
	this.setPassword = function (password) {this.password=password;}
	
	this.getIdUser = function () {return this.idUser;}
	this.getName = function () {return this.name;}
	this.getSurnames = function () {return this.surnames;}
	this.getEmail = function () {return this.email;}
	this.getUser = function () {return this.user;}
	this.getPassword = function () {return this.password;}
}
