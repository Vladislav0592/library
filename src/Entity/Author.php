<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



#[ORM\Entity(repositoryClass: AuthorRepository::class)]

#[UniqueEntity(
    fields: ['name', 'second_name', 'surname'],
    message: 'Этот автор уже внесен в список.',
)]
#[UniqueEntity( fields: ['name',  'surname'],message: 'Этот автор уже внесен в список.' )]


class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $second_name = null;

    #[ORM\Column(length: 50)]
    private ?string $surname = null;

    #[OneToMany(targetEntity: Books::class, mappedBy: 'author')]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function setBooks(Collection $books): void
    {
        $this->books = $books;
    }

    public function addBook(Books $book): void
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setAuthor($this);
        }
    }

    public function removeBook(Books $book): void
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            if ($book->getAuthor() === $this) {
                $book->setAuthor(null);
            }
        }
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getSecondName(): ?string
    {
        return $this->second_name;
    }

    public function setSecondName(?string $second_name): void
    {
        $this->second_name = $second_name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }


}
