<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109134322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (idjob INT AUTO_INCREMENT NOT NULL, idcompany_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(2000) NOT NULL, INDEX IDX_FBD8E0F85A3207EC (idcompany_id), PRIMARY KEY(idjob)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F85A3207EC FOREIGN KEY (idcompany_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE company CHANGE logo logo VARCHAR(900) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F85A3207EC');
        $this->addSql('DROP TABLE job');
        $this->addSql('ALTER TABLE company CHANGE logo logo VARCHAR(255) DEFAULT NULL');
    }
}
