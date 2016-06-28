<?php

namespace Company\Comum\EntitiesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchemaVersion
 *
 * @ORM\Table(name="schema_version", indexes={@ORM\Index(name="schema_version_s_idx", columns={"success"})})
 * @ORM\Entity
 */
class SchemaVersion
{
    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=50, nullable=true)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="script", type="string", length=1000, nullable=false)
     */
    private $script;

    /**
     * @var integer
     *
     * @ORM\Column(name="checksum", type="integer", nullable=true)
     */
    private $checksum;

    /**
     * @var string
     *
     * @ORM\Column(name="installed_by", type="string", length=100, nullable=false)
     */
    private $installedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="installed_on", type="datetime", nullable=false)
     */
    private $installedOn = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="execution_time", type="integer", nullable=false)
     */
    private $executionTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="success", type="boolean", nullable=false)
     */
    private $success;

    /**
     * @var integer
     *
     * @ORM\Column(name="installed_rank", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $installedRank;



    /**
     * Set version
     *
     * @param string $version
     *
     * @return SchemaVersion
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return SchemaVersion
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return SchemaVersion
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set script
     *
     * @param string $script
     *
     * @return SchemaVersion
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get script
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set checksum
     *
     * @param integer $checksum
     *
     * @return SchemaVersion
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * Get checksum
     *
     * @return integer
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * Set installedBy
     *
     * @param string $installedBy
     *
     * @return SchemaVersion
     */
    public function setInstalledBy($installedBy)
    {
        $this->installedBy = $installedBy;

        return $this;
    }

    /**
     * Get installedBy
     *
     * @return string
     */
    public function getInstalledBy()
    {
        return $this->installedBy;
    }

    /**
     * Set installedOn
     *
     * @param \DateTime $installedOn
     *
     * @return SchemaVersion
     */
    public function setInstalledOn($installedOn)
    {
        $this->installedOn = $installedOn;

        return $this;
    }

    /**
     * Get installedOn
     *
     * @return \DateTime
     */
    public function getInstalledOn()
    {
        return $this->installedOn;
    }

    /**
     * Set executionTime
     *
     * @param integer $executionTime
     *
     * @return SchemaVersion
     */
    public function setExecutionTime($executionTime)
    {
        $this->executionTime = $executionTime;

        return $this;
    }

    /**
     * Get executionTime
     *
     * @return integer
     */
    public function getExecutionTime()
    {
        return $this->executionTime;
    }

    /**
     * Set success
     *
     * @param boolean $success
     *
     * @return SchemaVersion
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get success
     *
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Get installedRank
     *
     * @return integer
     */
    public function getInstalledRank()
    {
        return $this->installedRank;
    }
}
