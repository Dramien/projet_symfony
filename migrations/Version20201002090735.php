<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002090735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled SMALLINT NOT NULL, ADD salt VARCHAR(255) NOT NULL, ADD last_login DATETIME NOT NULL, ADD confirmation_token VARCHAR(180) NOT NULL, ADD password_requested_at DATETIME NOT NULL, ADD titre VARCHAR(5) NOT NULL, ADD prenom VARCHAR(32) NOT NULL, ADD nom VARCHAR(36) NOT NULL, ADD adresse VARCHAR(32) NOT NULL, ADD ville VARCHAR(32) NOT NULL, ADD code_postal VARCHAR(5) NOT NULL, ADD telephone VARCHAR(10) NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP email, DROP username, DROP username_canonical, DROP email_canonical, DROP enabled, DROP salt, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP titre, DROP prenom, DROP nom, DROP adresse, DROP ville, DROP code_postal, DROP telephone, DROP created_at, DROP updated_at');
    }
}
