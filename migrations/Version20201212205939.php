<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201212205939 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emplacement (id INT AUTO_INCREMENT NOT NULL, idvoiture_id INT NOT NULL, nom VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_C0CF65F6CC28B580 (idvoiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6CC28B580 FOREIGN KEY (idvoiture_id) REFERENCES voiture (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE emplacement');
    }
}
