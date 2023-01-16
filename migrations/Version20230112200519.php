<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230112200519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mention_allergies (id INT AUTO_INCREMENT NOT NULL, visiteur_id INT NOT NULL, clients_id INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_452FDC797F72333D (visiteur_id), INDEX IDX_452FDC79AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mention_allergies ADD CONSTRAINT FK_452FDC797F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('ALTER TABLE mention_allergies ADD CONSTRAINT FK_452FDC79AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE commandes_passée ADD clients_id INT NOT NULL');
        $this->addSql('ALTER TABLE commandes_passée ADD CONSTRAINT FK_620D74F9AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('CREATE INDEX IDX_620D74F9AB014612 ON commandes_passée (clients_id)');
        $this->addSql('ALTER TABLE menu_categories ADD carte_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu_categories ADD CONSTRAINT FK_1B5EF2BAC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
        $this->addSql('CREATE INDEX IDX_1B5EF2BAC9C7CEB6 ON menu_categories (carte_id)');
        $this->addSql('ALTER TABLE menus ADD commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CF82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('CREATE INDEX IDX_727508CF82EA2E54 ON menus (commande_id)');
        $this->addSql('ALTER TABLE plat_categories ADD carte_id INT NOT NULL');
        $this->addSql('ALTER TABLE plat_categories ADD CONSTRAINT FK_B1B179E3C9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id)');
        $this->addSql('CREATE INDEX IDX_B1B179E3C9C7CEB6 ON plat_categories (carte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CF82EA2E54');
        $this->addSql('ALTER TABLE mention_allergies DROP FOREIGN KEY FK_452FDC797F72333D');
        $this->addSql('ALTER TABLE mention_allergies DROP FOREIGN KEY FK_452FDC79AB014612');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE mention_allergies');
        $this->addSql('DROP TABLE visiteur');
        $this->addSql('ALTER TABLE commandes_passée DROP FOREIGN KEY FK_620D74F9AB014612');
        $this->addSql('DROP INDEX IDX_620D74F9AB014612 ON commandes_passée');
        $this->addSql('ALTER TABLE commandes_passée DROP clients_id');
        $this->addSql('DROP INDEX IDX_727508CF82EA2E54 ON menus');
        $this->addSql('ALTER TABLE menus DROP commande_id');
        $this->addSql('ALTER TABLE menu_categories DROP FOREIGN KEY FK_1B5EF2BAC9C7CEB6');
        $this->addSql('DROP INDEX IDX_1B5EF2BAC9C7CEB6 ON menu_categories');
        $this->addSql('ALTER TABLE menu_categories DROP carte_id');
        $this->addSql('ALTER TABLE plat_categories DROP FOREIGN KEY FK_B1B179E3C9C7CEB6');
        $this->addSql('DROP INDEX IDX_B1B179E3C9C7CEB6 ON plat_categories');
        $this->addSql('ALTER TABLE plat_categories DROP carte_id');
    }
}
