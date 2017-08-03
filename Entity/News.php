<?php

namespace Dywee\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dywee\CoreBundle\Model\UserInterface;
use Dywee\CoreBundle\Traits\Picture;
use Dywee\CoreBundle\Traits\Seo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="Dywee\NewsBundle\Repository\NewsRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class News
{
    use Picture;
    use TimestampableEntity;
    use Seo;

    const STATE_DRAFT = 'draft';
    const STATE_PUBLISHED = 'published';

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="string", length=25)
     */
    private $state = self::STATE_DRAFT;

    /**
     * @ORM\ManyToOne(targetEntity="Dywee\CoreBundle\Model\UserInterface")
     */
    private $createdBy;


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
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }



    /**
     * Set state
     *
     * @param integer $state
     * @return News
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set createdBy
     *
     * @param UserInterface $createdBy
     * @return News
     */
    public function setCreatedBy(UserInterface $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
