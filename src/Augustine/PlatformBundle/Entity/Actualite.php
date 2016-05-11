<?php

namespace Augustine\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Actualite
 * @todo when update old ressource file image is not delete... 
 * @ORM\Table(name = "actualite")
 * @ORM\Entity(repositoryClass="Augustine\PlatformBundle\Entity\ActualiteRepository")
 */
class Actualite {

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
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     * 
     */
    private $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

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
        $this->dateActu = new \DateTime();
    }

    /**
     * @var boolean
     *
     * @ORM\Column(name="isHisto", type="boolean", nullable=true)
     */
    private $isHisto;

    /**
     * @ORM\ManyToOne(targetEntity="Augustine\PlatformBundle\Entity\TypeActu")
     * @ORM\JoinColumn(name="idTypeActu", referencedColumnName="id", nullable=false))
     * 
     */
    private $typeActu;
    private $temp;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Actualite
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Actualite
     */
    public function setTexte($texte) {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte() {
        return $this->texte;
    }

    /**
     * Set dateActu
     *
     * @param \DateTime $dateActu
     * @return Actualite
     */
    public function setDateActu($dateActu) {
        $this->dateActu = $dateActu;

        return $this;
    }

    /**
     * Get dateActu
     *
     * @return \DateTime 
     */
    public function getDateActu() {
        return $this->dateActu;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     * @return Actualite
     */
    public function setDateCrea($dateCrea) {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    /**
     * Get dateCrea
     *
     * @return \DateTime 
     */
    public function getDateCrea() {
        return $this->dateCrea;
    }

    /**
     * Set isHisto
     *
     * @param boolean $isHisto
     * @return Actualite
     */
    public function setIsHisto($isHisto) {
        $this->isHisto = $isHisto;

        return $this;
    }

    /**
     * Get isHisto
     *
     * @return boolean 
     */
    public function getIsHisto() {
        return $this->isHisto;
    }

    /**
     * Set typeActu
     *
     * @param \Augustine\PlatformBundle\Entity\TypeActu $typeActu
     * @return Actualite
     */
    public function setTypeActu(\Augustine\PlatformBundle\Entity\TypeActu $typeActu = null) {
        $this->typeActu = $typeActu;
        return $this;
    }

    /**
     * Get typeActu
     *
     * @return \Augustine\PlatformBundle\Entity\TypeActu 
     */
    public function getTypeActu() {
        return $this->typeActu;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Actualite
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
            $this->path = null;
        } else {
            // $this->path = 'initial';
        }
    }
    
    //Fonctions du upload
    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->path = $this->getFile()->guessExtension();
        }
    }
    
    /** 
     * Also call before persit by controller
     * 
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }
        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $fileName = md5(uniqid())
                    . '.' .$this->getFile()->guessExtension();
        $this->getFile()->move(
            $this->getUploadRootDir(), $fileName);
       
        $this->setFile(null);
        $this->path = $fileName;
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }
   
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }
    

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'images/actu';
    }

 
}