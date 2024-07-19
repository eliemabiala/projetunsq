<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240717120050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, demarche_id INT DEFAULT NULL, object VARCHAR(150) NOT NULL, creation_date DATETIME NOT NULL, date_update VARCHAR(150) NOT NULL, INDEX IDX_FE38F844A76ED395 (user_id), INDEX IDX_FE38F844C404C6DD (demarche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demarches (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_6B8755BDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documents (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, demarche_id INT DEFAULT NULL, file_name VARCHAR(50) DEFAULT NULL, file_path VARCHAR(150) NOT NULL, download_date VARCHAR(150) NOT NULL, INDEX IDX_A2B07288A76ED395 (user_id), INDEX IDX_A2B07288C404C6DD (demarche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, conversation_id INT DEFAULT NULL, content LONGTEXT NOT NULL, sending_date DATETIME NOT NULL, INDEX IDX_DB021E969AC0396 (conversation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE passport (id INT AUTO_INCREMENT NOT NULL, date_expira BIGINT NOT NULL, nationalité VARCHAR(50) NOT NULL, profession VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, passport_id INT NOT NULL, name VARCHAR(150) NOT NULL, postname VARCHAR(150) DEFAULT NULL, phone VARCHAR(20) NOT NULL, address LONGTEXT NOT NULL, date_of_birth DATE NOT NULL, date_creation BIGINT NOT NULL, date_inscrit BIGINT NOT NULL, UNIQUE INDEX UNIQ_8157AA0FA76ED395 (user_id), INDEX IDX_8157AA0FABF410D0 (passport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, role VARCHAR(50) NOT NULL, teams VARCHAR(50) NOT NULL, password VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844C404C6DD FOREIGN KEY (demarche_id) REFERENCES demarches (id)');
        $this->addSql('ALTER TABLE demarches ADD CONSTRAINT FK_6B8755BDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B07288A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B07288C404C6DD FOREIGN KEY (demarche_id) REFERENCES demarches (id)');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E969AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FABF410D0 FOREIGN KEY (passport_id) REFERENCES passport (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844A76ED395');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844C404C6DD');
        $this->addSql('ALTER TABLE demarches DROP FOREIGN KEY FK_6B8755BDA76ED395');
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288A76ED395');
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288C404C6DD');
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E969AC0396');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FABF410D0');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE conversation');
        $this->addSql('DROP TABLE demarches');
        $this->addSql('DROP TABLE documents');
        $this->addSql('DROP TABLE messages');
        $this->addSql('DROP TABLE passport');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
