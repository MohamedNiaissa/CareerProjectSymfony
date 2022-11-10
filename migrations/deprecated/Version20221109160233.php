<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109160233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE candidate CHANGE id idcandidate INT AUTO_INCREMENTNOT NULL');
        $this->addSql('ALTER TABLE company CHANGE id idcompany INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company CHANGE idcompany id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE candidate CHANGE idcandidate id INT AUTO_INCREMENT NOT NULL');
    }
}
