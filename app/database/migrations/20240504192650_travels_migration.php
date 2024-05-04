<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TravelsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table("travels");

        $table->addColumn("name", "string", [
            "limit" => 255,
            "null" => false,
        ]);

        $table->addColumn("slug", "string", [
            "limit" => 255,
            "null" => false,
        ]);

        $table->addColumn("description", "text", [
            "null" => false,
        ]);

        $table->addColumn("image_path", "text", [
            "null" => false,
        ]);

        $table->addColumn("price", "decimal", [
            "null" => false,
        ]);

        $table->addColumn("created_at", "timestamp", [
            "null" => false,
            "default" => "CURRENT_TIMESTAMP"
        ]);

        $table->addColumn("updated_at", "timestamp", [
            "null" => false,
            "default" => "CURRENT_TIMESTAMP"
        ]);

        $table->create();
    }
}
