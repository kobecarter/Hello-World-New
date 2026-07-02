<?php

class client
{
    static $table =  __prefixe_db__ . "client";

    private $id;
    private $active;
    private $titre;
	private $prenom;
    private $nom;
    private $raison_social;
	private $ice;
	private $tel;
    private $email;
	private $password;
	private $provider;
    private $cp;
    private $adresse;
	private $adresse2;
    private $ville;
	private $region;
    private $pays;
	private $photo;
    private $date_add;
    private $last_edit;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getTitre()
    {
        return $this->titre;
    }
	
	public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }
	
	public function getRaisonSocial()
    {
        return $this->raison_social;
    }
	
	public function getICE()
    {
        return $this->ice;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEmail()
    {
        return $this->email;
    }
	
	public function getPassword()
    {
        return $this->password;
    }
	
	public function getProvider()
    {
        return $this->provider;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
	
	public function getAdresse2()
    {
        return $this->adresse2;
    }

    public function getVille()
    {
        return $this->ville;
    }
	
	public function getRegion()
    {
        return $this->region;
    }

    public function getPays()
    {
        return $this->pays;
    }
	
	public function getPhoto()
    {
        return $this->photo;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function getLastEdit()
    {
        return $this->last_edit;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
	
	public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
	
	public function setRaisonSocial($raison_social)
    {
        $this->raison_social = $raison_social;
    }
	
	public function setICE($ice)
    {
        $this->ice = $ice;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
	
	public function setPassword($password)
    {
        $this->password = $password;
    }
	
	public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
	
	public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }
	
	public function setRegion($region)
    {
        $this->region = $region;
    }

    public function setPays($pays)
    {
        $this->pays = $pays;
    }
	
	public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function setLastEdit($last_edit)
    {
        $this->last_edit = $last_edit;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (active, titre, prenom, nom, raison_social, ice, tel, email, password, provider, cp, adresse, adresse2, ville, region, pays, photo, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->titre, "text"),
			GetSQLValueString($this->prenom, "text"),
            GetSQLValueString($this->nom, "text"),
			GetSQLValueString($this->raison_social, "text"),
			GetSQLValueString($this->ice, "text"),				 
            GetSQLValueString($this->tel, "text"),
            GetSQLValueString($this->email, "text"),
			GetSQLValueString($this->password, "text"),
			GetSQLValueString($this->provider, "text"),				 
            GetSQLValueString($this->cp, "text"),
            GetSQLValueString($this->adresse, "text"),
			GetSQLValueString($this->adresse2, "text"),				 
            GetSQLValueString($this->ville, "text"),
			GetSQLValueString($this->region, "text"),				 
            GetSQLValueString($this->pays, "text"),
			GetSQLValueString($this->photo, "text"),				 
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );
        if (!$db->query($SQLinsert)) {
           return 1;
        } else {
            return 0;
        }
    }

    public function edit()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  active = %s, titre = %s, prenom = %s, nom = %s, raison_social = %s, ice = %s, tel = %s, email = %s, password = %s, provider = %s, cp = %s, adresse = %s, adresse2 = %s, ville = %s, region = %s, pays =%s, photo =%s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->titre, "text"),
			GetSQLValueString($this->prenom, "text"),				 
            GetSQLValueString($this->nom, "text"),
			GetSQLValueString($this->raison_social, "text"),
			GetSQLValueString($this->ice, "text"),				 
			GetSQLValueString($this->tel, "text"),
            GetSQLValueString($this->email, "text"),
			GetSQLValueString($this->password, "text"),
			GetSQLValueString($this->provider, "text"),				 
            GetSQLValueString($this->cp, "text"),
            GetSQLValueString($this->adresse, "text"),
			GetSQLValueString($this->adresse2, "text"),	
            GetSQLValueString($this->ville, "text"),
			GetSQLValueString($this->region, "text"),				 
            GetSQLValueString($this->pays, "text"),
			GetSQLValueString($this->photo, "text"),				 
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete()
    {
        global $db;

		$SQLdelete = sprintf("DELETE FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($this->getId(), "int")
        );
        if(!$db->query($SQLdelete)){
            return 1;
        } else {
            return 0;
        }
    }
	
	public static function doLogin($email,$password){
		global $db;
        $client = new client();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE email = %s AND password = %s AND active = %s",
            GetSQLValueString($email, "text"),
			GetSQLValueString(md5($password), "text"),
			GetSQLValueString(1, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $client = static::build($data);
			return $client;
        }
		else
			return null;
	}

    public static function find($id)
    {
        global $db;
        $client = new client();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $client = static::build($data);
        }
        return $client;
    }
	
	public static function findByEmail($email)
    {
        global $db;
        $client = null;
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE email = %s",
            GetSQLValueString($email, "text")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $client = static::build($data);
        }
        return $client;
    }

    public static function findAll($active = false)
    {
        global $db;
        $items = array();
        $SQLselect = "SELECT * FROM " . static::$table;
        if($active){
            $SQLselect .= " WHERE active = 1";
        }
		
		$SQLselect .= " ORDER BY date_add DESC, id DESC";
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $client = static::build($data);
            array_push($items, $client);
        }
        return $items;
    }

    public static function build($data){
        $client = new client();
        $client->setId($data['id']);
        $client->setActive($data['active']);
        $client->setTitre($data['titre']);
		$client->setPrenom($data['prenom']);
        $client->setNom($data['nom']);
		$client->setRaisonSocial($data['raison_social']);
		$client->setICE($data['ice']);
        $client->setTel($data['tel']);
        $client->setEmail($data['email']);
		$client->setPassword($data['password']);
		$client->setProvider($data['provider']);
        $client->setCp($data['cp']);
        $client->setAdresse($data['adresse']);
		$client->setAdresse2($data['adresse2']);
        $client->setVille($data['ville']);
		$client->setRegion($data['region']);
        $client->setPays($data['pays']);
		$client->setPhoto($data['photo']);
        $client->setDateAdd($data['date_add']);
        $client->setLastEdit($data['last_edit']);
        return $client;
    }

    public static function getLastId(){
        global $db;
        return $db->last_id();
    }

    public static function count($year = false){
        global $db;
        $SQLcount = "SELECT count(id) as c FROM " . static::$table;
		
		if($year){
			$SQLcount .= " WHERE YEAR(date_add) = $year";
		}
		
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }
	
	public function sendMailConfirm(){
		global $siteURL,$db;
		$config = new config($db, 'fr');
		
		$code = '42xDdZs3s5' . base64_encode($this->id) . 'jwX4jOGhah';
		$mailBody = '<html><body>
		<table border="0" width="100%">
		<tr>
		<td bgcolor="#F6F6F6" align="center">

		<table border="0" cellpadding="15" cellspacing="0" width="640">
			<tr>
				<td align="center"><img src="'.$siteURL.'/images/config/'.$config->getLogo().'" alt="'.$config->getNom().'" height="64" /></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="center"><h1 style="font-weight:normal; margin-bottom:15px;">Activation compte Hello World</h1></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td>
				<p>Merci d\'avoir choisi Hello World, veuillez cliquer sur le lien ci-dessous pour activer votre compte</p>
					<p><a href="'. $siteURL .'enableaccount/'.$code.'/">Activer mon compte</a></p>
				</td>
			</tr>
			<tr>
				<td align="center"><p><font size="-3" color="#666666">'.$config->getNom().' Contact<br/>
		Email: '.$config->getEmail().'<br/>
		Tél. : '.$config->getTel().' / '.$config->getTel2().' / '.$config->getFax().'</font></p></td>
			</tr>
		</table>

		</td>
		</tr>
		</table>
		</body>
		</html>';		

		//echo $mailBody;

		// envoi mail client		
		$headers ='From: <'.$config->getEmail().'>'."\n";
		$headers .='Reply-To: '.$config->getEmail()."\n";
		$headers .='Content-Type: text/html; charset="utf-8"'."\n";
		$headers .='Content-Transfer-Encoding: 8bit';
		mail($this->email, 'Activation compte', $mailBody, $headers);
		mail('zakaria.hab@gmail.com', 'Activation compte test', $mailBody, $headers);
		
	}

    public static function loginApi($data)
{
    global $apiURL;
	if (isset($data['email']) && isset($data['password']) && !empty($data['email'])&& !empty($data['password']) ){
		$post_data = array(
			'email' => $data['email'],
			'password' => $data['password']
		);
		$ch = curl_init($apiURL."com_client/controleurs/router.php?task=loginApi");
			
		// Set cURL options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		// Execute cURL session and get the response
		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			return json_encode(array("icon"=>"error","message"=>"There is a problem with the service"));
		}
		// Close cURL session
		curl_close($ch);
		// Process the API response
		$info = json_decode($response);	
		if(is_object($info) && $info->icon == 'success'){
			$_SESSION['client'] = $info->token;
		}
		return $response;
	}else{
		return json_encode(array("icon"=>"warning","message"=>"All fields must be filled in"));
	}
}
public static function verifyEmailApi($data)
{
    global $apiURL;
	if (isset($data['email']) && !empty($data['email'])){
		$post_data = array(
			'email' => $data['email'],
		);
		$ch = curl_init($apiURL."com_client/controleurs/router.php?task=verifyEmailApi");
			
		// Set cURL options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		// Execute cURL session and get the response
		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			return json_encode(array("icon"=>"error","message"=>"There is a problem with the service"));
		}
		// Close cURL session
		curl_close($ch);
		// Process the API response
		return $response;
	}else{
		return json_encode(array("icon"=>"warning","message"=>"The email is required"));
	}
}
public static function setNewPasswordApi($data)
{
    global $apiURL;
	if (isset($data['token']) && !empty($data['token']) && isset($data['email']) && !empty($data['email']) && isset($data['password']) && !empty($data['password']) && isset($data['confirm_password']) && !empty($data['confirm_password'])){
        if($data['password'] !== $data['confirm_password']){
            return json_encode(array("icon"=>"warning","message"=>"The password and confirm password do not match"));
        }
		$post_data = array(
            'token' => $data['token'],
			'email' => $data['email'],
            'password' => $data['password'],
		);
		$ch = curl_init($apiURL."com_client/controleurs/router.php?task=setNewPasswordApi");
			
		// Set cURL options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		// Execute cURL session and get the response
		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			return json_encode(array("icon"=>"error","message"=>"There is a problem with the service"));
		}
		// Close cURL session
		curl_close($ch);
		// Process the API response
		return $response;

    }else{
		return json_encode(array("icon"=>"warning","message"=>"All fields must be filled in"));
	}
}

    public static function getClientByIdApi($clientID){
        global $apiURL;
        try {
            if (isset($clientID) && !empty($clientID)){
                
                $api_url = $apiURL."com_client/controleurs/router.php?task=findClientByIdApi&id=".$clientID;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getInfoFromTokenApi($token){
        global $apiURL;
        try {
            if (isset($token) && !empty($token)){
                $api_url = $apiURL."com_client/controleurs/router.php?task=getInfoFromTokenApi&token=".$token;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public static function getInvoicesByClientApi($clientID){
        
        global $apiURL;
        try {
            if (isset($clientID) && !empty($clientID)){
                $api_url = $apiURL."com_facture/controleurs/router.php?task=findAllByClientApi&client=".$clientID;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getQuotesByClientApi($clientID){
        global $apiURL;
        try {
            if (isset($clientID) && !empty($clientID)){
                $api_url = $apiURL."com_devis/controleurs/router.php?task=findAllByClientApi&client=".$clientID;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
                // return $response;
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getReclamationsByClientApi($clientID){
        global $apiURL;
        try {
            if (isset($clientID) && !empty($clientID)){
                $api_url = $apiURL."com_reclamation/controleurs/router.php?task=findAllByClientApi&client=".$clientID;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getRapplesByClientApi($clientID){
        global $apiURL;
        try {
            if (isset($clientID) && !empty($clientID)){
                $api_url = $apiURL."com_rappel/controleurs/router.php?task=findAllByClientApi&client=".$clientID;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_decode($response);
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Send Reclamation
    public static function createReclamationApi($data)
    {
        global $apiURL;
        if (isset($data['id_client'])&& isset($data['department']) && isset($data['sujet']) && isset($data['message']) && !empty($data['id_client'])&&!empty($data['department'])&& !empty($data['sujet'])&& !empty($data['message']) ){
            $post_data = array(
                'id_client' => $data['id_client'],
                'department' => $data['department'],
                'sujet' => $data['sujet'],
                'message' => $data['message']
            );
            $ch = curl_init($apiURL."com_reclamation/controleurs/router.php?task=createReclamationApi");
                
            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $_SESSION['client']
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

            // Execute cURL session and get the response
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
            }
           // Close cURL session
           curl_close($ch);
           // Process the API response
           return $response;
        }else{
            return json_encode(array("icon"=>"warning","message"=>"All fields must be filled in"));
        }
    }

    // Update Profile
    public static function updateProfileApi($data)
    {
        global $apiURL;
        if (isset($data['id_client']) && isset($data['password']) && !empty($data['id_client'])&& !empty($data['password'])){
            $post_data = array(
                'id_client' => $data['id_client'],
                'password' => $data['password']
            );
            $ch = curl_init($apiURL."com_client/controleurs/router.php?task=updateProfileApi");
                
            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $_SESSION['client']
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

            // Execute cURL session and get the response
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
            }
           // Close cURL session
           curl_close($ch);
           // Process the API response
           return $response;
        }else{
            return json_encode(array("icon"=>"warning","message"=>"All fields must be filled in"));
        }
    }

    public static function pdfInvoiceApi($id){
        global $apiURL;
        try {
            if (isset($id) && !empty($id)){
                $api_url = $apiURL."com_facture/controleurs/router.php?task=pdfFactureApi&id=".$id;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_encode(array("icon"=>"success","message"=>$response));
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function pdfQuoteApi($id){
        global $apiURL;
        try {
            if (isset($id) && !empty($id)){
                $api_url = $apiURL."com_devis/controleurs/router.php?task=pdfDevisApi&id=".$id;
        
                // Initialize cURL session
                $ch = curl_init($api_url);
        
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set cURL options
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Bearer ' . $_SESSION['client']
                ));
                // Execute cURL session and get the response
                $response = curl_exec($ch);
                if (curl_errno($ch)) {
                    return json_encode(array("icon"=>"error","message"=>"There is a problem with the server"));
                }
                // Close cURL session
                curl_close($ch);
                // Process the API response
                return json_encode(array("icon"=>"success","message"=>$response));;
                // return $response;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
	
}