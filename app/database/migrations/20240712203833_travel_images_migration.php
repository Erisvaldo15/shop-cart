<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TravelImagesMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table("travel_images");

        $table->addColumn("image", "text", [
            "null" => false,
        ]);

        $table->addColumn("image_description", "string", [
            "null" => false,
            "limit" => 255,
        ]);

        $table->addColumn("travel_id", "integer", [
            "null" => true,
            "signed" => false,
        ]);

        $table->addColumn("created_at", "timestamp", [
            "null" => false,
            "default" => "CURRENT_TIMESTAMP"
        ]);

        $table->addColumn("updated_at", "timestamp", [
            "null" => false,
            "default" => "CURRENT_TIMESTAMP"
        ]);

        $table->addForeignKey("travel_id", "travels", "id", [
            "delete" => "cascade",
            "constraint" => "fk_images_travel",
        ]);

        $table->create();
    }
}
