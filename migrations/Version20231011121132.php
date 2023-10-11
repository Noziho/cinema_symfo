<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011121132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moovies ADD rooms_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE moovies ADD CONSTRAINT FK_4D191FC38E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id)');
        $this->addSql('CREATE INDEX IDX_4D191FC38E2368AB ON moovies (rooms_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moovies DROP FOREIGN KEY FK_4D191FC38E2368AB');
        $this->addSql('DROP INDEX IDX_4D191FC38E2368AB ON moovies');
        $this->addSql('ALTER TABLE moovies DROP rooms_id');
    }
}
