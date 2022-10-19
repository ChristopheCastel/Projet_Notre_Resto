<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322115150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD categorie_menus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272C835AEE FOREIGN KEY (categorie_menus_id) REFERENCES admin_categorie_menus (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC272C835AEE ON produit (categorie_menus_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272C835AEE');
        $this->addSql('DROP INDEX IDX_29A5EC272C835AEE ON produit');
        $this->addSql('ALTER TABLE produit DROP categorie_menus_id');
    }
}
