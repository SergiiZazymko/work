<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180404133649 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A07E3C61F9');
        $this->addSql('DROP INDEX IDX_60C1D0A07E3C61F9 ON resume');
        $this->addSql('ALTER TABLE resume CHANGE owner_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0A76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0A76ED395 ON resume (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0A76ED395');
        $this->addSql('DROP INDEX IDX_60C1D0A0A76ED395 ON resume');
        $this->addSql('ALTER TABLE resume CHANGE user_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A07E3C61F9 FOREIGN KEY (owner_id) REFERENCES app_user (id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A07E3C61F9 ON resume (owner_id)');
    }
}
