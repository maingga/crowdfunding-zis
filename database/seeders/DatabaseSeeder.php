<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $this->call([
        UsersSeeder::class,
        ZakatTypesSeeder::class,
        ProgramsSeeder::class,
        MustahikSeeder::class,
        DonationsSeeder::class,
        TransactionsSeeder::class,
        ProgramWalletSeeder::class,
        MasjidWalletSeeder::class,
        NotificationsSeeder::class,
        PenyaluranSeeder::class,
    ]);
}
}
