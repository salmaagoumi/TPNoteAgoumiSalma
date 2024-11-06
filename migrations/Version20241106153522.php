<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106153522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acteur (id INT AUTO_INCREMENT NOT NULL, nom_acteur VARCHAR(255) NOT NULL, prenom_acteur VARCHAR(255) NOT NULL, date_naissance_acteur DATE NOT NULL, role_acteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, id_realisateur_id INT NOT NULL, titre_du_film VARCHAR(255) NOT NULL, duree_du_film INT NOT NULL, anee_sortie_film DATE NOT NULL, INDEX IDX_8244BE22CCBEFF28 (id_realisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jouer (id INT AUTO_INCREMENT NOT NULL, identifiant_film_id INT NOT NULL, id_acteur_id INT NOT NULL, INDEX IDX_825E5AED1C440DBF (identifiant_film_id), INDEX IDX_825E5AED5A5AEB6D (id_acteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, role_utilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_film (utilisateur_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_4BC5D218FB88E14F (utilisateur_id), INDEX IDX_4BC5D218567F5183 (film_id), PRIMARY KEY(utilisateur_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22CCBEFF28 FOREIGN KEY (id_realisateur_id) REFERENCES realisateur (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED1C440DBF FOREIGN KEY (identifiant_film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED5A5AEB6D FOREIGN KEY (id_acteur_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE utilisateur_film ADD CONSTRAINT FK_4BC5D218FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_film ADD CONSTRAINT FK_4BC5D218567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22CCBEFF28');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED1C440DBF');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED5A5AEB6D');
        $this->addSql('ALTER TABLE utilisateur_film DROP FOREIGN KEY FK_4BC5D218FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_film DROP FOREIGN KEY FK_4BC5D218567F5183');
        $this->addSql('DROP TABLE acteur');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_film');
    }
}
