<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109091520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, picture VARBINARY(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidateskills DROP FOREIGN KEY candidateskills_ibfk_1');
        $this->addSql('ALTER TABLE candidateskills DROP FOREIGN KEY candidateskills_ibfk_2');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY jobs_ibfk_1');
        $this->addSql('ALTER TABLE jobskills DROP FOREIGN KEY jobskills_ibfk_1');
        $this->addSql('ALTER TABLE jobskills DROP FOREIGN KEY jobskills_ibfk_2');
        $this->addSql('DROP TABLE candidates');
        $this->addSql('DROP TABLE candidateskills');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE jobskills');
        $this->addSql('DROP TABLE skills');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidates (idcandidate INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, age INT NOT NULL, picture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idcandidate)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'candidates\' ');
        $this->addSql('CREATE TABLE candidateskills (idskill INT NOT NULL, idcandidate INT NOT NULL, INDEX idskill (idskill), INDEX idcandidate (idcandidate)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'liaison entre candidats et skills\' ');
        $this->addSql('CREATE TABLE companies (idcompany INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, address VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idcompany)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'companies\' ');
        $this->addSql('CREATE TABLE jobs (idjob INT NOT NULL, idcompany INT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX idcompany (idcompany), PRIMARY KEY(idjob)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jobskills (idskill INT NOT NULL, idjob INT NOT NULL, INDEX idjob (idjob), INDEX idskill (idskill)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'liaison entre jobs et skills\' ');
        $this->addSql('CREATE TABLE skills (idskill INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idskill)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'Skills for a job\' ');
        $this->addSql('ALTER TABLE candidateskills ADD CONSTRAINT candidateskills_ibfk_1 FOREIGN KEY (idcandidate) REFERENCES candidates (idcandidate)');
        $this->addSql('ALTER TABLE candidateskills ADD CONSTRAINT candidateskills_ibfk_2 FOREIGN KEY (idskill) REFERENCES skills (idskill)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT jobs_ibfk_1 FOREIGN KEY (idcompany) REFERENCES companies (idcompany)');
        $this->addSql('ALTER TABLE jobskills ADD CONSTRAINT jobskills_ibfk_1 FOREIGN KEY (idjob) REFERENCES jobs (idjob)');
        $this->addSql('ALTER TABLE jobskills ADD CONSTRAINT jobskills_ibfk_2 FOREIGN KEY (idskill) REFERENCES skills (idskill)');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
