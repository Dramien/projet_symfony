<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002110044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien CHANGE proprietaire_id proprietaire_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC3866EC1D6E1 FOREIGN KEY (proprietaire_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_45EDC3866EC1D6E1 ON bien (proprietaire_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3866EC1D6E1');
        $this->addSql('DROP INDEX IDX_45EDC3866EC1D6E1 ON bien');
        $this->addSql('ALTER TABLE bien CHANGE proprietaire_id_id proprietaire_id INT NOT NULL');
    }
}
