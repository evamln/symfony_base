<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231116082843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD burger_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67F068BC17CE5090 ON commentaire (burger_id)');
        $this->addSql('ALTER TABLE image ADD burger_id INT DEFAULT NULL, CHANGE alt_text nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F17CE5090 FOREIGN KEY (burger_id) REFERENCES burger (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C53D045F17CE5090 ON image (burger_id)');
        $this->addSql('ALTER TABLE oignon ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pain ADD nom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC17CE5090');
        $this->addSql('DROP INDEX UNIQ_67F068BC17CE5090 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP burger_id, DROP nom');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F17CE5090');
        $this->addSql('DROP INDEX UNIQ_C53D045F17CE5090 ON image');
        $this->addSql('ALTER TABLE image DROP burger_id, CHANGE nom alt_text VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE oignon DROP nom');
        $this->addSql('ALTER TABLE pain DROP nom');
    }
}
