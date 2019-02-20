<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190215192043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94267294869C');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC9426BAD26311');
        $this->addSql('ALTER TABLE tags DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tags ADD PRIMARY KEY (article_id, tag_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC94267294869C');
        $this->addSql('ALTER TABLE tags DROP FOREIGN KEY FK_6FBC9426BAD26311');
        $this->addSql('ALTER TABLE tags DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267294869C FOREIGN KEY (article_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426BAD26311 FOREIGN KEY (tag_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tags ADD PRIMARY KEY (tag_id, article_id)');
    }
}
