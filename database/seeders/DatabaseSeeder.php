<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Post;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Posts;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::factory(3)->create();
        Users::factory(10)->create();
        Posts::factory(10)->create();


        Penyakit::factory()->create([
            'nama' => "Newcastle Disease",
            'detail' => "Merupakan penyakit viral yang sangat menular dan dapat menyebabkan kematian massal pada ayam. Gejala meliputi penurunan produksi telur, kesulitan bernapas, dan keluarnya cairan dari hidung dan mata."
        ]);
        Penyakit::factory()->create([
            'nama' => "Avian Influenza ",
            'detail' => "Merupakan penyakit viral yang dapat menyebabkan kematian mendadak pada ayam. Gejalanya meliputi penurunan produksi telur, pembengkakan dan memar pada wattle dan kulit kepala, serta kesulitan bernapas."
        ]);
        Penyakit::factory()->create([
            'nama' => "Coccidiosis",
            'detail' => "Disebabkan oleh parasit protozoa dan dapat menyebabkan diare berdarah, penurunan pertumbuhan, dan kematian pada ayam."
        ]);
        Penyakit::factory()->create([
            'nama' => "Infectious Bronchitis",
            'detail' => "Merupakan penyakit viral yang dapat menyebabkan gangguan pernapasan, penurunan produksi telur, dan telur berlapis tipis."
        ]);

        Gejala::factory()->create([
            'nama' => "Penurunan produksi telur"
        ]);
        Gejala::factory()->create([
            'nama' => "Kehilangan nafsu makan"
        ]);
        Gejala::factory()->create([
            'nama' => "Masalah pernapasan"
        ]);
        Gejala::factory()->create([
            'nama' => "Perubahan perilaku"
        ]);
        Gejala::factory()->create([
            'nama' => "Perubahan pada kotoran"
        ]);
        Gejala::factory()->create([
            'nama' => "Kematian mendadak"
        ]);
    }
}
