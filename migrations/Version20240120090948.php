<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120090948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE covers_to_books (id INT AUTO_INCREMENT NOT NULL, cover VARCHAR(255) NOT NULL, book INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cover CHANGE name name VARCHAR(255) NOT NULL, CHANGE path path VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE covers_to_books');
        $this->addSql('ALTER TABLE cover CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE path path VARCHAR(255) DEFAULT NULL');
    }
}
