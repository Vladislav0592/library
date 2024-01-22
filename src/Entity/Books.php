<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: BooksRepository::class)]
#[UniqueEntity(
    fields: ['name', 'year_of_publication'],
    message: 'Издание с таким названием и годом публикации уже добавлено',
)]
#[UniqueEntity(
    fields: ['name', 'ISBN'],
    message: 'Издание с таким названием и ISBN уже добавлено',
)]

class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $year_of_publication = null;

    #[ORM\Column(length: 255)]
    private ?string $edition = null;

    #[ORM\Column]
    private ?int $ISBN = null;

    #[ORM\Column]
    private ?int $number_of_pages = null;


    #[ORM\ManyToOne(targetEntity: Author::class, inversedBy: 'books')]
    #[ORM\JoinColumn(name: 'author_id', referencedColumnName: 'id')]
    private Author|null $author = null;

    #[ORM\ManyToOne(targetEntity: Author::class, inversedBy: 'books')]
    #[ORM\JoinColumn(name: 'author2_id', referencedColumnName: 'id')]
    private Author|null $author2 = null;

    #[ORM\ManyToOne(targetEntity: Author::class, inversedBy: 'books')]
    #[ORM\JoinColumn(name: 'author3_id', referencedColumnName: 'id')]
    private Author|null $author3 = null;

    public function getAuthor2(): ?Author
    {
        return $this->author2;
    }

    public function setAuthor2(?Author $author2): void
    {
        $this->author2 = $author2;
    }

    public function getAuthor3(): ?Author
    {
        return $this->author3;
    }

    public function setAuthor3(?Author $author3): void
    {
        $this->author3 = $author3;
    }

    #[ORM\Column]
    private  $cover;

    public function __toString()
    {
        return $this->getName();
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getCover():?string
    {
        return $this->cover;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getYearOfPublication(): ?int
    {
        return $this->year_of_publication;
    }

    public function setYearOfPublication(int $year_of_publication): static
    {
        $this->year_of_publication = $year_of_publication;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(string $edition): static
    {
        $this->edition = $edition;

        return $this;
    }

    public function getISBN(): ?int
    {
        return $this->ISBN;
    }

    public function setISBN(int $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getNumberOfPages(): ?int
    {
        return $this->number_of_pages;
    }

    public function setNumberOfPages(int $number_of_pages): static
    {
        $this->number_of_pages = $number_of_pages;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;
        return $this;
    }

}
