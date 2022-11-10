<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110125821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate_skill (id INT AUTO_INCREMENT NOT NULL, candidate_id_id INT NOT NULL, skill_id_id INT NOT NULL, INDEX IDX_66DD0F8B47A475AB (candidate_id_id), INDEX IDX_66DD0F8B5A6C0D6B (skill_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B47A475AB FOREIGN KEY (candidate_id_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidate_skill ADD CONSTRAINT FK_66DD0F8B5A6C0D6B FOREIGN KEY (skill_id_id) REFERENCES skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate_skill DROP FOREIGN KEY FK_66DD0F8B47A475AB');
        $this->addSql('ALTER TABLE candidate_skill DROP FOREIGN KEY FK_66DD0F8B5A6C0D6B');
        $this->addSql('DROP TABLE candidate_skill');
    }
}
