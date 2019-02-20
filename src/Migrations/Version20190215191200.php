<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190215191200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tags_group (tag_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_6A4B29DBAD26311 (tag_id), INDEX IDX_6A4B29D7294869C (article_id), PRIMARY KEY(tag_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tags_group ADD CONSTRAINT FK_6A4B29DBAD26311 FOREIGN KEY (tag_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tags_group ADD CONSTRAINT FK_6A4B29D7294869C FOREIGN KEY (article_id) REFERENCES tag (id)');
        $this->addSql('DROP TABLE tags');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tags (tag_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_6FBC9426BAD26311 (tag_id), INDEX IDX_6FBC94267294869C (article_id), PRIMARY KEY(tag_id, article_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC94267294869C FOREIGN KEY (article_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE tags ADD CONSTRAINT FK_6FBC9426BAD26311 FOREIGN KEY (tag_id) REFERENCES article (id)');
        $this->addSql('DROP TABLE tags_group');
    }
}
