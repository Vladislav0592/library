<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240121044946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books ADD author2_id INT DEFAULT NULL, ADD author3_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A924E4A3E62 FOREIGN KEY (author2_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F6F65907 FOREIGN KEY (author3_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A924E4A3E62 ON books (author2_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F6F65907 ON books (author3_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A924E4A3E62');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F6F65907');
        $this->addSql('DROP INDEX IDX_4A1B2A924E4A3E62 ON books');
        $this->addSql('DROP INDEX IDX_4A1B2A92F6F65907 ON books');
        $this->addSql('ALTER TABLE books DROP author2_id, DROP author3_id');
    }
}
