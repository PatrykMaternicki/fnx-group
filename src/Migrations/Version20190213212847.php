<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190213212847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6664C19C1');
        $this->addSql('DROP INDEX UNIQ_23A0E6664C19C1 ON article');
        $this->addSql('ALTER TABLE article CHANGE category belongs_to_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6633C857F5 FOREIGN KEY (belongs_to_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6633C857F5 ON article (belongs_to_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6633C857F5');
        $this->addSql('DROP INDEX IDX_23A0E6633C857F5 ON article');
        $this->addSql('ALTER TABLE article CHANGE belongs_to_id category INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6664C19C1 FOREIGN KEY (category) REFERENCES category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_23A0E6664C19C1 ON article (category)');
    }
}
