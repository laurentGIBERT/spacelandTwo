<?php

/*
 * produced by laurent GIBERT
 *
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Family.
 *
 * @author 'Laurent GIBERT'
 *
 * @ORM\Table(name="family")
 * @ORM\Entity
 */
class Family
{
    /**
     * The identifier of the family.
     *
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * The family name.
     *
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Plant in the family.
     *
     * @var Plant[]
     * @ORM\ManyToMany(targetEntity="Plant", mappedBy="families")
     **/
    protected $plants;

    /**
     * The category parent.
     *
     * @var Family
     * @ORM\ManyToOne(targetEntity="Family")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     **/
    protected $parent;

    public function __construct()
    {
        $this->plants = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get the id of the family.
     * Return null if the family is new and not saved.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the name of the family.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the name of the family.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Return all plant associated to the family.
     *
     * @return Plant[]
     */
    public function getPlants()
    {
        return $this->plants;
    }

    /**
     * Set all plant in the family.
     *
     * @param Plant[] $plants
     */
    public function setPlants($plants)
    {
        $this->plants->clear();
        $this->plants = new ArrayCollection($plants);
    }

    /**
     * Add a plant in the Family.
     *
     * @param $plant Plant The plant to associate
     */
    public function addPlant($plant)
    {
        if ($this->plants->contains($plant)) {
            return;
        }

        $this->plants->add($plant);
        $plant->addFamily($this);
    }

    /**
     * @param Plant $plant
     */
    public function removePlant($plant)
    {
        if (!$this->plants->contains($plant)) {
            return;
        }

        $this->plants->removeElement($plant);
        $plant->removeFamily($this);
    }
}
