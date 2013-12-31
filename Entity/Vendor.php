<?php

namespace Pim\Bundle\IcecatDemoBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Pim\Bundle\CatalogBundle\Model\ReferableInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vendor entity
 *
 * @author    Antoine Guigan <antoine@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @ORM\Entity(repositoryClass="Pim\Bundle\CatalogBundle\Entity\Repository\ReferableEntityRepository")
 * @ORM\Table(
 *     name="pim_icecatdemo_vendor",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="pim_icecatdemo_vendor_code", columns={"code"})}
 * )
 * @UniqueEntity(fields="code", message="This code is already taken")
 */
class Vendor implements ReferableInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=100)
     * @Assert\Regex(pattern="/^[a-zA-Z0-9_]+$/")
     * @Assert\Length(max=100, min=1)
     */
    protected $code;

    /**
     * @var string $label
     *
     * @ORM\Column(name="label", type="string", length=250, nullable=false)
     * @Assert\Length(max=250, min=1)
     */
    protected $label;

    /**
     * @var string
     * 
     * @ORM\Column
     */
    protected $responsible;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable
     * @ORM\Column(name="created", type="datetime")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable
     * @ORM\Column(name="updated", type="datetime")
     */
    protected $updated;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set code
     *
     * @param  string $code
     * @return Vendor
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set label
     *
     * @param  string $label
     * @return Vendor
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get responsible
     * 
     * @return string
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * 
     * @param type $responsibleSet responsible
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
    }

        /**
     * Set created
     *
     * @param  DateTime $created
     * @return Domain
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param  DateTime $updated
     * @return Domain
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getReference()
    {
        return $this->code;
    }
}
