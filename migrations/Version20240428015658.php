<?php
/**
declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;



final class Version20240428015658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile ADD deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B97CEC221 FOREIGN KEY (category_expenses_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses_category ADD deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expenses_category DROP deleted_at');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B97CEC221');
    }
}
 */