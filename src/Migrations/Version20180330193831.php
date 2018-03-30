<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180330193831 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE employment_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, employment_type_id INT DEFAULT NULL, education_type_id INT DEFAULT NULL, position VARCHAR(55) NOT NULL, phone VARCHAR(13) NOT NULL, salary INT NOT NULL, work_company VARCHAR(50) NOT NULL, work_city VARCHAR(20) NOT NULL, work_position VARCHAR(20) NOT NULL, work_start DATE NOT NULL, work_finish DATE NOT NULL, work_description LONGTEXT DEFAULT NULL, education_institution VARCHAR(60) NOT NULL, education_speciality VARCHAR(60) NOT NULL, education_city VARCHAR(20) NOT NULL, education_start DATE NOT NULL, education_finish DATE NOT NULL, education_description LONGTEXT DEFAULT NULL, additionl_info LONGTEXT DEFAULT NULL, is_available TINYINT(1) NOT NULL, INDEX IDX_60C1D0A08BAC62AF (city_id), INDEX IDX_60C1D0A01BCDC34A (employment_type_id), INDEX IDX_60C1D0A0D968E34B (education_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A08BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A01BCDC34A FOREIGN KEY (employment_type_id) REFERENCES employment_type (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0D968E34B FOREIGN KEY (education_type_id) REFERENCES education_type (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A01BCDC34A');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0D968E34B');
        $this->addSql('DROP TABLE employment_type');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE education_type');
    }
}
