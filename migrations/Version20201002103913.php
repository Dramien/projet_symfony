<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002103913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, prix INT NOT NULL, photo VARCHAR(255) NOT NULL, categorie VARCHAR(10) NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(12) NOT NULL, proprietaire_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled SMALLINT NOT NULL, salt VARCHAR(255) NOT NULL, last_login DATETIME NOT NULL, confirmation_token VARCHAR(180) NOT NULL, password_requested_at DATETIME NOT NULL, titre VARCHAR(5) NOT NULL, prenom VARCHAR(32) NOT NULL, nom VARCHAR(36) NOT NULL, adresse VARCHAR(32) NOT NULL, ville VARCHAR(32) NOT NULL, code_postal VARCHAR(5) NOT NULL, telephone VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE user');
    }
}
