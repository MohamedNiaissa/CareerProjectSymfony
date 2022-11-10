<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110085916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495A3207EC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D712F888');
        $this->addSql('DROP INDEX UNIQ_8D93D6495A3207EC ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649D712F888 ON user');
        $this->addSql('ALTER TABLE user ADD company_id INT DEFAULT NULL, ADD candidate_id INT DEFAULT NULL, DROP idcompany_id, DROP idcandidate_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64991BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649979B1AD6 ON user (company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64991BD8781 ON user (candidate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64991BD8781');
        $this->addSql('DROP INDEX UNIQ_8D93D649979B1AD6 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D64991BD8781 ON user');
        $this->addSql('ALTER TABLE user ADD idcompany_id INT DEFAULT NULL, ADD idcandidate_id INT DEFAULT NULL, DROP company_id, DROP candidate_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495A3207EC FOREIGN KEY (idcompany_id) REFERENCES company (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D712F888 FOREIGN KEY (idcandidate_id) REFERENCES candidate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6495A3207EC ON user (idcompany_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D712F888 ON user (idcandidate_id)');
    }
}
