<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011121420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moovies ADD schedules_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE moovies ADD CONSTRAINT FK_4D191FC3116C90BC FOREIGN KEY (schedules_id) REFERENCES schedules (id)');
        $this->addSql('CREATE INDEX IDX_4D191FC3116C90BC ON moovies (schedules_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moovies DROP FOREIGN KEY FK_4D191FC3116C90BC');
        $this->addSql('DROP INDEX IDX_4D191FC3116C90BC ON moovies');
        $this->addSql('ALTER TABLE moovies DROP schedules_id');
    }
}
