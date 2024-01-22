<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120163219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors_books (author_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_2DFDA3CBF675F31B (author_id), INDEX IDX_2DFDA3CB7DD8AC20 (books_id), PRIMARY KEY(author_id, books_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authors_books ADD CONSTRAINT FK_2DFDA3CBF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE authors_books ADD CONSTRAINT FK_2DFDA3CB7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F675F31B');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F6F65907');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A924E4A3E62');
        $this->addSql('DROP INDEX IDX_4A1B2A92F675F31B ON books');
        $this->addSql('DROP INDEX IDX_4A1B2A924E4A3E62 ON books');
        $this->addSql('DROP INDEX IDX_4A1B2A92F6F65907 ON books');
        $this->addSql('ALTER TABLE books DROP author_id, DROP author2_id, DROP author3_id, CHANGE cover cover VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authors_books DROP FOREIGN KEY FK_2DFDA3CBF675F31B');
        $this->addSql('ALTER TABLE authors_books DROP FOREIGN KEY FK_2DFDA3CB7DD8AC20');
        $this->addSql('DROP TABLE authors_books');
        $this->addSql('ALTER TABLE books ADD author_id INT DEFAULT NULL, ADD author2_id INT DEFAULT NULL, ADD author3_id INT DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F6F65907 FOREIGN KEY (author3_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A924E4A3E62 FOREIGN KEY (author2_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F675F31B ON books (author_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A924E4A3E62 ON books (author2_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F6F65907 ON books (author3_id)');
    }
}
