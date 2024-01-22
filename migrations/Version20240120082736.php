<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120082736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cover (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books ADD author3_id INT DEFAULT NULL, ADD cover_id INT DEFAULT NULL, DROP cover');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F6F65907 FOREIGN KEY (author3_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92922726E9 FOREIGN KEY (cover_id) REFERENCES cover (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F6F65907 ON books (author3_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A92922726E9 ON books (cover_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92922726E9');
        $this->addSql('DROP TABLE cover');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F6F65907');
        $this->addSql('DROP INDEX IDX_4A1B2A92F6F65907 ON books');
        $this->addSql('DROP INDEX UNIQ_4A1B2A92922726E9 ON books');
        $this->addSql('ALTER TABLE books ADD cover VARCHAR(255) DEFAULT NULL, DROP author3_id, DROP cover_id');
    }
}
