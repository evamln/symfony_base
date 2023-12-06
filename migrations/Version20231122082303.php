<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122082303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE burger (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, commentaire_id INT DEFAULT NULL, pain_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EFE35A0D3DA5256D (image_id), UNIQUE INDEX UNIQ_EFE35A0DBA9CD190 (commentaire_id), INDEX IDX_EFE35A0D64775A84 (pain_id), PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, burger_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C53D045F17CE5090 (burger_id), PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oignon (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pain (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sauce (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) ENGINE = InnoDB');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE burger ADD CONSTRAINT FK_EFE35A0D64775A84 FOREIGN KEY (pain_id) REFERENCES pain (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D3DA5256D');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0DBA9CD190');
        $this->addSql('ALTER TABLE burger DROP FOREIGN KEY FK_EFE35A0D64775A84');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F17CE5090');
        $this->addSql('DROP TABLE burger');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE oignon');
        $this->addSql('DROP TABLE pain');
        $this->addSql('DROP TABLE sauce');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
