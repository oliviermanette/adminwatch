<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212150602 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE societes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(32) NOT NULL, adresse VARCHAR(64) NOT NULL, email VARCHAR(64) NOT NULL, zip VARCHAR(8) NOT NULL, ville VARCHAR(16) NOT NULL, pays VARCHAR(16) NOT NULL, siret VARCHAR(16) DEFAULT NULL, tva VARCHAR(16) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connexions (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, token VARCHAR(64) NOT NULL, start DATETIME NOT NULL, last_action DATETIME NOT NULL, ip_origin VARCHAR(16) NOT NULL, browser VARCHAR(16) NOT NULL, INDEX IDX_E2247B9DFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, nom VARCHAR(16) NOT NULL, prenom VARCHAR(32) NOT NULL, email VARCHAR(32) NOT NULL, pass VARCHAR(64) NOT NULL, adresse VARCHAR(64) DEFAULT NULL, hardtoken VARCHAR(32) NOT NULL, zip VARCHAR(8) DEFAULT NULL, ville VARCHAR(16) DEFAULT NULL, pays VARCHAR(16) DEFAULT NULL, INDEX IDX_497B315EFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE connexions ADD CONSTRAINT FK_E2247B9DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EFCF77503 FOREIGN KEY (societe_id) REFERENCES societes (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EFCF77503');
        $this->addSql('ALTER TABLE connexions DROP FOREIGN KEY FK_E2247B9DFB88E14F');
        $this->addSql('DROP TABLE societes');
        $this->addSql('DROP TABLE connexions');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
