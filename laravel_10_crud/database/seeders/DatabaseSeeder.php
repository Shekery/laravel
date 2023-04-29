<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(OrganizationsSeeder::class);
        $this->call(DocumentTypesSeeder::class);
        $this->call(DocumentTemplatesSeeder::class);
        $this->call(ColumnTypesSeeder::class);
        $this->call(DocumentTemplateColumnsSeeder::class);
        $this->call(DocumentTemplateUsersSeeder::class);
        $this->call(DocumentTemplateUserRelationsSeeder::class);
        $this->call(DocumentTemplateFilesSeeder::class);
    }
}
