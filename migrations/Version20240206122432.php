<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206122432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_A6BCF3DE79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE filiere DROP FOREIGN KEY FK_E16D64025EC1162');
        $this->addSql('DROP TABLE cycle');
        $this->addSql('DROP TABLE etudiants');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_93C3D627613FECDF');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_93C3D6274B89032C');
        $this->addSql('DROP INDEX idx_93c3d6274b89032c ON candidat');
        $this->addSql('CREATE INDEX IDX_6AB5B4714B89032C ON candidat (post_id)');
        $this->addSql('DROP INDEX idx_93c3d627613fecdf ON candidat');
        $this->addSql('CREATE INDEX IDX_6AB5B471613FECDF ON candidat (session_id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_93C3D627613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_93C3D6274B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE config ADD the_key VARCHAR(255) DEFAULT NULL, ADD the_value VARCHAR(255) DEFAULT NULL, DROP theKey, DROP theValue');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_FAB8C3B32195E0F0');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_FAB8C3B3613FECDF');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_FAB8C3B3BCF5E72D');
        $this->addSql('ALTER TABLE post ADD nbr_post INT DEFAULT NULL, ADD nbr_postreste INT DEFAULT NULL, DROP nbrPost, DROP nbrPostreste');
        $this->addSql('DROP INDEX idx_fab8c3b32195e0f0 ON post');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D2195E0F0 ON post (specialite_id)');
        $this->addSql('DROP INDEX idx_fab8c3b3bcf5e72d ON post');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DBCF5E72D ON post (categorie_id)');
        $this->addSql('DROP INDEX idx_fab8c3b3613fecdf ON post');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D613FECDF ON post (session_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_FAB8C3B32195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_FAB8C3B3613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_FAB8C3B3BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE session CHANGE dateFin date_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_A88BFF11C54C8C93');
        $this->addSql('ALTER TABLE specialite CHANGE DureeFormation duree_formation INT NOT NULL');
        $this->addSql('DROP INDEX idx_a88bff11c54c8c93 ON specialite');
        $this->addSql('CREATE INDEX IDX_E7D6FCC1C54C8C93 ON specialite (type_id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_A88BFF11C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD nom_utilisateur VARCHAR(255) DEFAULT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, DROP nomUtilisateur, DROP imageName, CHANGE imageSize image_size INT DEFAULT NULL, CHANGE updatedAt updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP INDEX uniq_514aeaa6e7927c74 ON utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EE7927C74 ON utilisateurs (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cycle (id INT AUTO_INCREMENT NOT NULL, nomCycle VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE etudiants (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, roles LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, locale VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, nomUtilisateur VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, updatedAt DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, carte VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, enable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_227C02EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, cycle_id INT DEFAULT NULL, nomFiliere VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, codeEtab VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, codeApo VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_E16D64025EC1162 (cycle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE filiere ADD CONSTRAINT FK_E16D64025EC1162 FOREIGN KEY (cycle_id) REFERENCES cycle (id)');
        $this->addSql('ALTER TABLE personnel DROP FOREIGN KEY FK_A6BCF3DE79F37AE5');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B4714B89032C');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471613FECDF');
        $this->addSql('DROP INDEX idx_6ab5b4714b89032c ON candidat');
        $this->addSql('CREATE INDEX IDX_93C3D6274B89032C ON candidat (post_id)');
        $this->addSql('DROP INDEX idx_6ab5b471613fecdf ON candidat');
        $this->addSql('CREATE INDEX IDX_93C3D627613FECDF ON candidat (session_id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B4714B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE config ADD theKey VARCHAR(255) DEFAULT NULL, ADD theValue VARCHAR(255) DEFAULT NULL, DROP the_key, DROP the_value');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D2195E0F0');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DBCF5E72D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D613FECDF');
        $this->addSql('ALTER TABLE post ADD nbrPost INT DEFAULT NULL, ADD nbrPostreste INT DEFAULT NULL, DROP nbr_post, DROP nbr_postreste');
        $this->addSql('DROP INDEX idx_5a8a6c8dbcf5e72d ON post');
        $this->addSql('CREATE INDEX IDX_FAB8C3B3BCF5E72D ON post (categorie_id)');
        $this->addSql('DROP INDEX idx_5a8a6c8d613fecdf ON post');
        $this->addSql('CREATE INDEX IDX_FAB8C3B3613FECDF ON post (session_id)');
        $this->addSql('DROP INDEX idx_5a8a6c8d2195e0f0 ON post');
        $this->addSql('CREATE INDEX IDX_FAB8C3B32195E0F0 ON post (specialite_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE session CHANGE date_fin dateFin DATE NOT NULL');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC1C54C8C93');
        $this->addSql('ALTER TABLE specialite CHANGE duree_formation DureeFormation INT NOT NULL');
        $this->addSql('DROP INDEX idx_e7d6fcc1c54c8c93 ON specialite');
        $this->addSql('CREATE INDEX IDX_A88BFF11C54C8C93 ON specialite (type_id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC1C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD nomUtilisateur VARCHAR(255) DEFAULT NULL, ADD imageName VARCHAR(255) DEFAULT NULL, DROP nom_utilisateur, DROP image_name, CHANGE image_size imageSize INT DEFAULT NULL, CHANGE updated_at updatedAt DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP INDEX uniq_497b315ee7927c74 ON utilisateurs');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_514AEAA6E7927C74 ON utilisateurs (email)');
    }
}
