<?php

namespace Augustine\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Actualite
 *
 * @ORM\Table(name = "actualite")
 * @ORM\Entity(repositoryClass="Augustine\PlatformBundle\Entity\ActualiteRepository")
 */
class Actualite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * 
     * @Assert\NotBlank()
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateActu", type="date")
     */
    private $dateActu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCrea", type="date")
     */
    private $dateCrea;
    
    
    function __construct() {
        $this->dateCrea = new \DateTime();
    }

    /**
     * @var boolean
     *
     * @ORM\Column(name="isHisto", type="boolean", nullable=true)
     */
    private $isHisto;

    /**
     * @var string
     *
     * @ORM\Column(name="nomRessource", type="string", length=255)
     */
    private $nomRessource;
    
    /**
     * @ORM\ManyToOne(targetEntity="Augustine\PlatformBundle\Entity\TypeActu")
     * @ORM\JoinColumn(name="idTypeActu", referencedColumnName="id")
     * 
     */
    private $typeActu;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Actualite
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Actualite
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set dateActu
     *
     * @param \DateTime $dateActu
     * @return Actualite
     */
    public function setDateActu($dateActu)
    {
        $this->dateActu = $dateActu;
    
        return $this;
    }

    /**
     * Get dateActu
     *
     * @return \DateTime 
     */
    public function getDateActu()
    {
        return $this->dateActu;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     * @return Actualite
     */
    public function setDateCrea($dateCrea)
    {
        $this->dateCrea = $dateCrea;
    
        return $this;
    }

    /**
     * Get dateCrea
     *
     * @return \DateTime 
     */
    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    /**
     * Set isHisto
     *
     * @param boolean $isHisto
     * @return Actualite
     */
    public function setIsHisto($isHisto)
    {
        $this->isHisto = $isHisto;
    
        return $this;
    }

    /**
     * Get isHisto
     *
     * @return boolean 
     */
    public function getIsHisto()
    {
        return $this->isHisto;
    }

    /**
     * Set nomRessource
     *
     * @param string $nomRessource
     * @return Actualite
     */
    public function setNomRessource($nomRessource)
    {
        $this->nomRessource = $nomRessource;
    
        return $this;
    }

    /**
     * Get nomRessource
     *
     * @return string 
     */
    public function getNomRessource()
    {
        return $this->nomRessource;
    }


    /**
     * Set typeActu
     *
     * @param \Augustine\PlatformBundle\Entity\TypeActu $typeActu
     * @return Actualite
     */
    public function setTypeActu(\Augustine\PlatformBundle\Entity\TypeActu $typeActu = null)
    {
        $this->typeActu = $typeActu;
    
        return $this;
    }

    /**
     * Get typeActu
     *
     * @return \Augustine\PlatformBundle\Entity\TypeActu 
     */
    public function getTypeActu()
    {
        return $this->typeActu;
    }
}