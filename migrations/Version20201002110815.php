<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201002110815 extends AbstractMigration
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
        $this->addSql('ALTER TABLE user CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE enabled enabled SMALLINT NOT NULL, CHANGE salt salt VARCHAR(255) NOT NULL, CHANGE last_login last_login DATETIME NOT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) NOT NULL, CHANGE password_requested_at password_requested_at DATETIME NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC3866EC1D6E1');
        $this->addSql('DROP INDEX IDX_45EDC3866EC1D6E1 ON bien');
        $this->addSql('ALTER TABLE bien CHANGE proprietaire_id_id proprietaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE username_canonical username_canonical VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email_canonical email_canonical VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE enabled enabled SMALLINT DEFAULT NULL, CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
