<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110114038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_job ADD skill_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE skill_job ADD CONSTRAINT FK_88B2D165A6C0D6B FOREIGN KEY (skill_id_id) REFERENCES skill (id)');
        $this->addSql('CREATE INDEX IDX_88B2D165A6C0D6B ON skill_job (skill_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_job DROP FOREIGN KEY FK_88B2D165A6C0D6B');
        $this->addSql('DROP INDEX IDX_88B2D165A6C0D6B ON skill_job');
        $this->addSql('ALTER TABLE skill_job DROP skill_id_id');
    }
}
