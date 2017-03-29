<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * City
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\CityRepository")
 */
class City
{
    const SERVER_PATH_TO_IMAGE_FOLDER = 'uploads/city';
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="url1", type="string", length=255)
     */
    private $url1;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="url2", type="string", length=255)
     */
    private $url2;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="url3", type="string", length=255)
     */
    private $url3;


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
     * Set url1
     *
     * @param string $url1
     * @return City
     */
    public function setUrl1($url1)
    {
        $this->url1 = $url1;

        return $this;
    }

    /**
     * Get url1
     *
     * @return string 
     */
    public function getUrl1()
    {
        return $this->url1;
    }

    /**
     * Set url2
     *
     * @param string $url2
     * @return City
     */
    public function setUrl2($url2)
    {
        $this->url2 = $url2;

        return $this;
    }

    /**
     * Get url2
     *
     * @return string 
     */
    public function getUrl2()
    {
        return $this->url2;
    }

    /**
     * Set url3
     *
     * @param string $url3
     * @return City
     */
    public function setUrl3($url3)
    {
        $this->url3 = $url3;

        return $this;
    }

    /**
     * Get url3
     *
     * @return string 
     */
    public function getUrl3()
    {
        return $this->url3;
    }


    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo = null) {
        $this->logo = $logo;

        return $this;
    }

    public function getAbsolutePath()
    {
        return null === $this->imageName ? null : $this->getUploadRootDir('web').$this->imageName;
    }

    public function getWebPath()
    {
        return null === $this->imageName ? null : $this->getUploadDir().'/'.$this->imageName;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return City::SERVER_PATH_TO_IMAGE_FOLDER . '/' .$this->getId();
    }

    public function upload($basepath)
    {
        // the file property can be empty if the field is not required
        if (null === $this->logo) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the target filename to move to
        $this->logo->move($this->getUploadRootDir($basepath), $this->logo->getClientOriginalName());

        // set the logo path property to the filename where you'ved saved the file
        $this->setLogo($this->logo->getClientOriginalName());

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}
