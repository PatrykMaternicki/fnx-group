<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190215190959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE atag (tag_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_5E1621EBBAD26311 (tag_id), INDEX IDX_5E1621EB7294869C (article_id), PRIMARY KEY(tag_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atag ADD CONSTRAINT FK_5E1621EBBAD26311 FOREIGN KEY (tag_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE atag ADD CONSTRAINT FK_5E1621EB7294869C FOREIGN KEY (article_id) REFERENCES tag (id)');
        $this->addSql('DROP TABLE tags_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tags_id (tag_id INT NOT NULL, PRIMARY KEY(tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE atag');
    }
}
