<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190207194454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plan ADD city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plan ADD CONSTRAINT FK_DD5A5B7D8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D8BAC62AF ON plan (city_id)');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234E899029B');
        $this->addSql('DROP INDEX IDX_2D5B0234E899029B ON city');
        $this->addSql('ALTER TABLE city DROP plan_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE city ADD plan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234E899029B ON city (plan_id)');
        $this->addSql('ALTER TABLE plan DROP FOREIGN KEY FK_DD5A5B7D8BAC62AF');
        $this->addSql('DROP INDEX IDX_DD5A5B7D8BAC62AF ON plan');
        $this->addSql('ALTER TABLE plan DROP city_id');
    }
}
