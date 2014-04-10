<?php
/*
 * users.php
 * This file contains methods to query the database server.
 * 
 */
require_once "BDproject.php"; 

class repositoriesClass {
	
	private $idRepository;
    private $repositoryName;
    private $idUser;
    private $idProject;

	//----------Names columns---------------------------------------
	private static $tableName = "repositories";
    private static $colId = "idRepository";
    private static $colName = "repositoryName";
    private static $colUser = "idUser";
    private static $colProject = "idProject";
	//-------------------------------------------------------------//

	/*
	* function __construct()
	*/
	function __construct() {
    }
    //-----------------getters and setters--------------------------
    public function getIdRepository() {
        return $this->idRepository;
    }

    public function setIdRepository($idRepository) {
        $this->idRepository = $idRepository;
    }
    
    public function getRepositoryName() {
        return $this->name;
    }

    public function setRepositoryName($repositoryName) {
        $this->repositoryName = $repositoryName;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    
    public function getIdProject() {
        return $this->idProject;
    }

    public function setIdProject($idProject) {
        $this->idProject = $idProject;
    }
    
	public function toString() {
        return "project.usersClass[idRepository=" . $this->idRepository . "][repositoryName=" . $this->repositoryName . "][idUser=" . $this->idUser . "][idProject=" . $this->setIdProject. "]";
    }

	public function getAll() {
		$data = array();
		$data["idRepository"] = $this->idRepository;
		$data["repositoryName"] = $this->repositoryName;
		$data["idUser"] = $this->idUser;
		$data["idProject"] = $this->idProject;
		return $data;
    }
    
    public function setAll($idRepository, $repositoryName,$idUser, $idProject) {
		$this->setIdRepository($idRepository);
		$this->setRepositoryName($repositoryName);
		$this->setIdUser($idUser);
		$this->setIdProject($idProject);
    }

	//---INTERACCIÓ AMB LA BASE DE DADES--------------------------
	
	/**
	 * findById()
	 * executa cerca per id i retorna l'objecte
	 * @param id a buscar
	 * @return objecte obtingut
	 */
	public static function createRepo( $user, $password ) {
		//$cons = "select * from `".usersClass::$tableName."` where ".usersClass::$colUser." = '".$user."' AND ".usersClass::$colPassword." = '".$password."'";
        //to do
        //hay que pasarle nombre del repositorio
		return usersClass::findByQuery( $cons );
	}

    /**
     * findByQuery()
     * executa consulta i retorna col·lecció d'objectes
     * @param cons consulta a executar
     * @return col·lecció d'objectes, un per a cada fila del RecordSet obtingut
     */
    public static function findByQuery( $cons ) {
        //connectar amb la base de dades
        $conn = new BDproject();
        
        if (mysqli_connect_errno()) {
            printf("Error en connexió amb la base de dades: %s\n", mysqli_connect_error());
            exit();
        }
        //executar consulta
        $res = $conn->query($cons);
        //retornar resultat de la consulta
        return usersClass::fromResultSetList( $res );
    }

/**
     * fromResultSetList()
     * converteix les files d'un RecordSet en una llista d'objectes
     * @param res ResultSet del qual obtenir dades
     * @return col·lecció d'objectes, un per a cada fila del RecordSet
     */
    private static function fromResultSetList( $res ) {
        $entitatList = array();
        $i=0;
        while ( ($row = $res->fetch_array(MYSQLI_BOTH)) != NULL ) {
               //recuperar valors dels camps i construir l'objecte
                $entitat = usersClass::fromResultSet( $row );
               //afegir objecte a la col·lecció a retornar
               $entitatList[$i]= $entitat;
               $i++;
        }
        return $entitatList;
    }	

    /**
     * fromResultSet()
     * converteix la fila actual d'un RecordSet en un objecte
     * @param res ResultSet del qual obtenir dades
     * @return objecte
     */
    private static function fromResultSet( $res ) {
        //recuperar valors dels camps
        $idRepository = $res[ usersClass::$colId];
        $name = $res[ usersClass::$colName];
        $surnames = $res[ usersClass::$colSurnames];
        $email = $res[ usersClass::$colEmail];
        $user = $res[ usersClass::$colUser];
        $password = $res[ usersClass::$colPassword];

            //construeix l'objecte
        $entitat = new usersClass();
        $entitat->setIdRepository($idRepository);
        $entitat->setRepositoryName($name);
        $entitat->setSurnames($surnames);
        $entitat->setEmail($email);
        $entitat->setIdUser($user);
        $entitat->setIdProject($password);
        //retornar objecte
        return $entitat;
    }
}	
?>

