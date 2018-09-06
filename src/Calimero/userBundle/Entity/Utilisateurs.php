<?php
// src/Calimero/userBundle/Entity/Utilisateurs.php
namespace Calimero\userBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
* @ORM\Entity
* @ORM\Table(name="utilisateurs")
*/
class Utilisateurs
{
	/** 
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
    private $id;
	
	/** 
	* @ORM\Column(type="string", length=30)
	*/
    private $utilisateur;
	
	/** 
	* @ORM\Column(type="datetime", name="date_creation")
	*/
    private $dateCreation;
	
	/** 
	* @ORM\Column(type="boolean")
	*/
	private $newsletter;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getUtilisateur()
	{
		return $this->utilisateur;
	}
	
	public function setUtilisateur($utilisateur)
	{
		$this->utilisateur = $utilisateur;
	}
	
	public function getDateCreation()
	{
		return $this->dateCreation;
	}
	
	public function setDateCreation()
	{
		$this->dateCreation = new \DateTime("now");
	}
	
	public function getNewsletter()
	{
		return $this->newsletter;
	}
	
	public function setNewsletter($newsletter)
	{
		$this->newsletter = $newsletter;
	}
}

?>