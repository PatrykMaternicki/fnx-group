<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190214222332 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A517294869C');
        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A51F675F31B');
        $this->addSql('ALTER TABLE authors DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A517294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A51F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE authors ADD PRIMARY KEY (article_id, author_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A517294869C');
        $this->addSql('ALTER TABLE authors DROP FOREIGN KEY FK_8E0C2A51F675F31B');
        $this->addSql('ALTER TABLE authors DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A517294869C FOREIGN KEY (article_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE authors ADD CONSTRAINT FK_8E0C2A51F675F31B FOREIGN KEY (author_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE authors ADD PRIMARY KEY (author_id, article_id)');
    }
}
