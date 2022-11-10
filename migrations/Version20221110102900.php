<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110102900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F85A3207EC');
        $this->addSql('DROP INDEX IDX_FBD8E0F85A3207EC ON job');
        $this->addSql('ALTER TABLE job CHANGE idcompany_id company_id INT NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F8979B1AD6 ON job (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8979B1AD6');
        $this->addSql('DROP INDEX IDX_FBD8E0F8979B1AD6 ON job');
        $this->addSql('ALTER TABLE job CHANGE company_id idcompany_id INT NOT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F85A3207EC FOREIGN KEY (idcompany_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F85A3207EC ON job (idcompany_id)');
    }
}
