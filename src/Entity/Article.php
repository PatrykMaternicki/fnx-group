<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

     /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="App\Entity\Author")
     * @ORM\JoinTable(name="authors",
     *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="author_id", referencedColumnName="id")}
     *      )
     */
    protected $writenBy;

    // /**
    //  * Many Users have Many Groups.
    //  * @ORM\ManyToMany(targetEntity="App\Entity\Tag)
    //  * @ORM\JoinTable(name="tags",
    //  *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
    //  *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
    //  *      )
    //  */
    private $contains;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles")
     */
    private $belongsTo;


       /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="clients",
     *      joinColumns={@ORM\JoinColumn(name="client_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")}
     *      )
     */
    private $pursached;

    public function __construct()
    {
        $this->writenBy = new \Doctrine\Common\Collections\ArrayCollection();
        $this->$contains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->$pursached = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pursached = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Author[]
     */
    public function getWritenBy(): Collection
    {
        return $this->writenBy;
    }

    public function addWritenBy(Author $writenBy): self
    {
        if (!$this->writenBy->contains($writenBy)) {
            $this->writenBy[] = $writenBy;
        }

        return $this;
    }

    public function removeWritenBy(Author $writenBy): self
    {
        if ($this->writenBy->contains($writenBy)) {
            $this->writenBy->removeElement($writenBy);
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getContains(): Collection
    {
        return $this->contains;
    }

    public function addContain(Tag $contain): self
    {
        if (!$this->contains->contains($contain)) {
            $this->contains[] = $contain;
        }

        return $this;
    }

    public function removeContain(Tag $contain): self
    {
        if ($this->contains->contains($contain)) {
            $this->contains->removeElement($contain);
        }

        return $this;
    }

    public function getBelongsTo(): ?Category
    {
        return $this->belongsTo;
    }

    public function setBelongsTo(?Category $belongsTo): self
    {
        $this->belongsTo = $belongsTo;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPursached(): Collection
    {
        return $this->pursached;
    }

    public function addPursached(User $pursached): self
    {
        if (!$this->pursached->contains($pursached)) {
            $this->pursached[] = $pursached;
        }

        return $this;
    }

    public function removePursached(User $pursached): self
    {
        if ($this->pursached->contains($pursached)) {
            $this->pursached->removeElement($pursached);
        }

        return $this;
    }
}
