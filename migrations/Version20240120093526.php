<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240120093526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92922726E9');
        $this->addSql('DROP TABLE cover');
        $this->addSql('DROP TABLE covers_to_books');
        $this->addSql('DROP INDEX UNIQ_4A1B2A92922726E9 ON books');
        $this->addSql('ALTER TABLE books ADD cover VARCHAR(255) NOT NULL, DROP cover_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cover (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, path VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE covers_to_books (id INT AUTO_INCREMENT NOT NULL, cover VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, book INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE books ADD cover_id INT DEFAULT NULL, DROP cover');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92922726E9 FOREIGN KEY (cover_id) REFERENCES cover (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A1B2A92922726E9 ON books (cover_id)');
    }
}
