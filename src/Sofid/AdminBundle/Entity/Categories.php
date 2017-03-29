<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\OffreRepository")
 */
class Categories
{
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
     * @ORM\Column(name="category_name", type="string", length=255)
     */
    private $category_name;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="main_category_id", type="integer", options={"default":"0"})
     */ 
    private $main_category;
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    
    public function __toString()
    {
    	return sprintf("%s", $this->getCategoryName());
    }
    

    /**
     * Set category_name
     *
     * @param string $categoryName
     * @return Categories
     */
    public function setCategoryName($categoryName)
    {
        $this->category_name = $categoryName;

        return $this;
    }

    /**
     * Get category_name
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set main_category
     *
     * @param  integer $mainCategory
     * @return Categories
     */
    public function setMainCategory($mainCategory)
    {
        $this->main_category = $mainCategory;

        return $this;
    }

    /**
     * Get main_category
     *
     * @return integer 
     */
    public function getMainCategory()
    {
        return $this->main_category;
    }
}
