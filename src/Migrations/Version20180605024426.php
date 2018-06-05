<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180605024426 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE subscription (id INTEGER NOT NULL, event_id INTEGER NOT NULL, subscriber_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A3C664D371F7E88B ON subscription (event_id)');
        $this->addSql('CREATE INDEX IDX_A3C664D37808B1AD ON subscription (subscriber_id)');
        $this->addSql('CREATE TABLE call_for_paper (id INTEGER NOT NULL, event_id INTEGER NOT NULL, speak_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E54E8E4F71F7E88B ON call_for_paper (event_id)');
        $this->addSql('CREATE INDEX IDX_E54E8E4F22D93505 ON call_for_paper (speak_id)');
        $this->addSql('CREATE TABLE subscriber (id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AD005B69A76ED395 ON subscriber (user_id)');
        $this->addSql('CREATE TABLE speak (id INTEGER NOT NULL, speaker_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FBF52663D04A0F27 ON speak (speaker_id)');
        $this->addSql('CREATE TABLE event (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, cfp_start_date DATETIME NOT NULL, cfp_end_date DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TEMPORARY TABLE __temp__speaker AS SELECT id FROM speaker');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('CREATE TABLE speaker (id INTEGER NOT NULL, user_id INTEGER NOT NULL, bio CLOB DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_7B85DB61A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO speaker (id) SELECT id FROM __temp__speaker');
        $this->addSql('DROP TABLE __temp__speaker');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7B85DB61A76ED395 ON speaker (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE call_for_paper');
        $this->addSql('DROP TABLE subscriber');
        $this->addSql('DROP TABLE speak');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP INDEX UNIQ_7B85DB61A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__speaker AS SELECT id FROM speaker');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('CREATE TABLE speaker (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO speaker (id) SELECT id FROM __temp__speaker');
        $this->addSql('DROP TABLE __temp__speaker');
    }
}
