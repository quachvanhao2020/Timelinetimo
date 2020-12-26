<?php
namespace Timelinetimo;

use Doctrine\ORM\Mapping as ORM;
use YPHP\EntityLife;
use YPHP\Entity;
use YPHP\EntityInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="timelines")
 */
class Timeline extends EntityLife{

    const OWNED = "owned";
    const OBJECT = "object";
    const DATA = "data";

    public function __toArray(){
        return array_merge([
            self::OWNED => $this->getOwned(),
            self::OBJECT => $this->getObject(),
            self::DATA => $this->getData(),
        ],parent::__toArray());
    }

    /**
     * 
     * @ORM\Id
     * @ORM\Column(type="string",name="id")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Doctrine\ORM\Id\UuidGenerator")
     * @var string
     */
    protected $id;

    /**
     * @ORM\Embedded(class = "YPHP\Entity")
     * @var EntityInterface
     */
    protected $owned;

    /**
     * @ORM\Column(type="object")
     * @var object
     */
    protected $object;

    /**
     * @ORM\Column(type="json",nullable=true)
     * @var string
     */
    protected $data;


    /**
     * Get the value of owned
     *
     * @return  EntityInterface
     */ 
    public function getOwned()
    {
        return $this->owned;
    }

    /**
     * Set the value of owned
     *
     * @param  EntityInterface  $owned
     *
     * @return  self
     */ 
    public function setOwned(EntityInterface $owned)
    {
        $this->owned = $owned;

        return $this;
    }

    /**
     * Get the value of object
     *
     * @return  object
     */ 
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set the value of object
     *
     * @param  object  $object
     *
     * @return  self
     */ 
    public function setObject(object $object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get the value of data
     *
     * @return  string
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @param  string  $data
     *
     * @return  self
     */ 
    public function setData( $data)
    {
        $this->data = $data;

        return $this;
    }
}