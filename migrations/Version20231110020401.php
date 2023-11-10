<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110020401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence_bancaire (id INT AUTO_INCREMENT NOT NULL, id_agence INT NOT NULL, nom_agence VARCHAR(255) NOT NULL, adresse_agence VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, nom VARCHAR(255) NOT NULL, prénom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_compte (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_compte_client (client_compte_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_6A6B675619E5B62F (client_compte_id), INDEX IDX_6A6B675619EB6921 (client_id), PRIMARY KEY(client_compte_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_compte_compte_bancaire (client_compte_id INT NOT NULL, compte_bancaire_id INT NOT NULL, INDEX IDX_AB22F10619E5B62F (client_compte_id), INDEX IDX_AB22F106AF1E371E (compte_bancaire_id), PRIMARY KEY(client_compte_id, compte_bancaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_bancaire (id INT AUTO_INCREMENT NOT NULL, id_compte INT NOT NULL, type_contrat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_agence (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_agence_conseiller_agence (conseiller_agence_source INT NOT NULL, conseiller_agence_target INT NOT NULL, INDEX IDX_B6636DCD1FABADB1 (conseiller_agence_source), INDEX IDX_B6636DCD64EFD3E (conseiller_agence_target), PRIMARY KEY(conseiller_agence_source, conseiller_agence_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_bancaire (id INT AUTO_INCREMENT NOT NULL, id_conseiller INT NOT NULL, prénom VARCHAR(255) NOT NULL, nom_agence VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_compte (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_compte_lignede_compte (ligne_compte_id INT NOT NULL, lignede_compte_id INT NOT NULL, INDEX IDX_269165153D2069A8 (ligne_compte_id), INDEX IDX_26916515108976E0 (lignede_compte_id), PRIMARY KEY(ligne_compte_id, lignede_compte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_compte_compte_bancaire (ligne_compte_id INT NOT NULL, compte_bancaire_id INT NOT NULL, INDEX IDX_CE5B5B4C3D2069A8 (ligne_compte_id), INDEX IDX_CE5B5B4CAF1E371E (compte_bancaire_id), PRIMARY KEY(ligne_compte_id, compte_bancaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_de_compte (id INT AUTO_INCREMENT NOT NULL, id_ligne INT NOT NULL, date_publication DATE NOT NULL, montant_transaction VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_compte_client ADD CONSTRAINT FK_6A6B675619E5B62F FOREIGN KEY (client_compte_id) REFERENCES client_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_compte_client ADD CONSTRAINT FK_6A6B675619EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_compte_compte_bancaire ADD CONSTRAINT FK_AB22F10619E5B62F FOREIGN KEY (client_compte_id) REFERENCES client_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_compte_compte_bancaire ADD CONSTRAINT FK_AB22F106AF1E371E FOREIGN KEY (compte_bancaire_id) REFERENCES compte_bancaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_agence_conseiller_agence ADD CONSTRAINT FK_B6636DCD1FABADB1 FOREIGN KEY (conseiller_agence_source) REFERENCES conseiller_agence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_agence_conseiller_agence ADD CONSTRAINT FK_B6636DCD64EFD3E FOREIGN KEY (conseiller_agence_target) REFERENCES conseiller_agence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_compte_lignede_compte ADD CONSTRAINT FK_269165153D2069A8 FOREIGN KEY (ligne_compte_id) REFERENCES ligne_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_compte_lignede_compte ADD CONSTRAINT FK_26916515108976E0 FOREIGN KEY (lignede_compte_id) REFERENCES ligne_de_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_compte_compte_bancaire ADD CONSTRAINT FK_CE5B5B4C3D2069A8 FOREIGN KEY (ligne_compte_id) REFERENCES ligne_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_compte_compte_bancaire ADD CONSTRAINT FK_CE5B5B4CAF1E371E FOREIGN KEY (compte_bancaire_id) REFERENCES compte_bancaire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client_compte_client DROP FOREIGN KEY FK_6A6B675619E5B62F');
        $this->addSql('ALTER TABLE client_compte_client DROP FOREIGN KEY FK_6A6B675619EB6921');
        $this->addSql('ALTER TABLE client_compte_compte_bancaire DROP FOREIGN KEY FK_AB22F10619E5B62F');
        $this->addSql('ALTER TABLE client_compte_compte_bancaire DROP FOREIGN KEY FK_AB22F106AF1E371E');
        $this->addSql('ALTER TABLE conseiller_agence_conseiller_agence DROP FOREIGN KEY FK_B6636DCD1FABADB1');
        $this->addSql('ALTER TABLE conseiller_agence_conseiller_agence DROP FOREIGN KEY FK_B6636DCD64EFD3E');
        $this->addSql('ALTER TABLE ligne_compte_lignede_compte DROP FOREIGN KEY FK_269165153D2069A8');
        $this->addSql('ALTER TABLE ligne_compte_lignede_compte DROP FOREIGN KEY FK_26916515108976E0');
        $this->addSql('ALTER TABLE ligne_compte_compte_bancaire DROP FOREIGN KEY FK_CE5B5B4C3D2069A8');
        $this->addSql('ALTER TABLE ligne_compte_compte_bancaire DROP FOREIGN KEY FK_CE5B5B4CAF1E371E');
        $this->addSql('DROP TABLE agence_bancaire');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_compte');
        $this->addSql('DROP TABLE client_compte_client');
        $this->addSql('DROP TABLE client_compte_compte_bancaire');
        $this->addSql('DROP TABLE compte_bancaire');
        $this->addSql('DROP TABLE conseiller_agence');
        $this->addSql('DROP TABLE conseiller_agence_conseiller_agence');
        $this->addSql('DROP TABLE conseiller_bancaire');
        $this->addSql('DROP TABLE ligne_compte');
        $this->addSql('DROP TABLE ligne_compte_lignede_compte');
        $this->addSql('DROP TABLE ligne_compte_compte_bancaire');
        $this->addSql('DROP TABLE ligne_de_compte');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
