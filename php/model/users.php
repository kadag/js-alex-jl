<?php
/*
 * users.php
 * This file contains methods to query the database server.
 * 
 */
require_once "BDproject.php"; 

class usersClass {
	
	private $idUser;
    private $name;
    private $surnames;
    private $email;
    private $user;
    private $password;

	//----------Names columns---------------------------------------
	private static $tableName = "users";
    private static $colId = "idUser";
    private static $colName = "name";
    private static $colSurnames = "surnames";
    private static $colEmail = "email";
    private static $colUser = "user";
    private static $colPassword = "password";
	//-------------------------------------------------------------//

	/*
	* function __construct()
	*/
	function __construct() {
    }
    //-----------------getters and setters--------------------------
    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
	
	public function getSurnames() {
        return $this->surnames;
    }

    public function setSurnames($surnames) {
        $this->surnames = $surnames;
    }
    
	public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
	public function toString() {
        return "project.usersClass[idUser=" . $this->idUser . "][name=" . $this->name . "][surnames=" . $this->surnames . "][email=" . $this->email . "][user=" . $this->user . "][password=" . $this->password . "]";
    }

	public function getAll() {
		$data = array();
		$data["idUser"] = $this->idUser;
		$data["name"] = $this->name;
		$data["surnames"] = $this->surnames;
		$data["email"] = $this->email;
		$data["user"] = $this->user;
		$data["password"] = $this->password;
		return $data;
    }
    
    public function setAll($idUser, $name, $surnames, $email, $user, $password) {
		$this->setIdUser($idUser);
		$this->setName($name);
		$this->setSurnames($surnames);
		$this->setEmail($email);
		$this->setUser($user);
		$this->setPassword($password);
    }

	//---INTERACCIÓ AMB LA BASE DE DADES--------------------------
	
	/**
	 * findById()
	 * executa cerca per id i retorna l'objecte
	 * @param id a buscar
	 * @return objecte obtingut
	 */
	public static function login( $user, $password ) {
		$cons = "select * from `".usersClass::$tableName."` where ".usersClass::$colUser." = '".$user."' AND ".usersClass::$colPassword." = '".$password."'";

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
        $idUser = $res[ usersClass::$colId];
        $name = $res[ usersClass::$colName];
        $surnames = $res[ usersClass::$colSurnames];
        $email = $res[ usersClass::$colEmail];
        $user = $res[ usersClass::$colUser];
        $password = $res[ usersClass::$colPassword];

            //construeix l'objecte
        $entitat = new usersClass();
        $entitat->setIdUser($idUser);
        $entitat->setName($name);
        $entitat->setSurnames($surnames);
        $entitat->setEmail($email);
        $entitat->setUser($user);
        $entitat->setPassword($password);
        //retornar objecte
        return $entitat;
    }
        /**
     * registerUser()
     * executa la inserció del nou usuari.
     * @param nom, cognoms, correu, usuari, contrasenya
     * @return objecte usuari obtingut
     */
    public static function registerUser() {
        
        //connectar amb la base de dades
        $conn = new BDproject();
        if (mysqli_connect_errno()) {
            printf("Error en connexió amb la base de dades: %s\n", mysqli_connect_error());
            exit();
        }
        //preparar sentencia inserció
        $stmt = $conn->stmt_init();
        
        if ($stmt->prepare("insert into ".usersClass::$tableName." values (?,?,?,?,?)")){
            $stmt->bind_param("is", $this->getName(), $this->getSurnames(), $this->getEmail(), $this->getUser(), $this->getPassword());
            //executar consulta
            $stmt->execute();
        }
        if ( $conn != null ) $conn->close();
    }

}	
?>

