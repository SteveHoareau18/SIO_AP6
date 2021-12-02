<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211116104052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ligne_frais_forfait (id INT AUTO_INCREMENT NOT NULL, id_visiteur VARCHAR(255) NOT NULL, mois VARCHAR(6) NOT NULL, id_frais_forfait VARCHAR(3) NOT NULL, quantite INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE fichefrais DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE fichefrais CHANGE idEtat idEtat CHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE fichefrais ADD PRIMARY KEY (mois, idVisiteur)');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE mois mois CHAR(6) DEFAULT NULL, CHANGE idVisiteur idVisiteur CHAR(4) DEFAULT NULL');
        $this->addSql('ALTER TABLE visiteur CHANGE id id CHAR(4) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ligne_frais_forfait');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fichefrais DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE fichefrais CHANGE idEtat idEtat CHAR(2) CHARACTER SET latin1 DEFAULT \'CR\' COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fichefrais ADD PRIMARY KEY (idVisiteur, mois)');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE mois mois CHAR(6) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE idVisiteur idVisiteur CHAR(4) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE visiteur CHANGE id id CHAR(4) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
    }
}
