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
        // Seeder user & posts
        Admin::factory()->create([
            'nama' => "Yuma Aji Pangestu",
            'username' => "admin",
            'email' => "yuma@gmail.com",
            'password' => '$2y$12$v8ugOhhoygMGTJTjSEdVoeyR4N1stuWSR/UtO.my0pSXw/4ltRv/O'
        ]);
        Users::factory()->create([
            'nama' => "Muhammad Rafi",
            'username' => "user",
            'email' => "rafi@gmail.com",
            'password' => '$2y$12$v8ugOhhoygMGTJTjSEdVoeyR4N1stuWSR/UtO.my0pSXw/4ltRv/O'
        ]);
        Admin::factory(3)->create();
        Users::factory(5)->create();
        Posts::factory(15)->create();

        // Seeder Penyakit
        Penyakit::factory()->create([
            'nama' => "Newcastle Disease",
            'slug' => "newcastle-disease",
            'detail' => "Merupakan penyakit viral yang sangat menular dan dapat menyebabkan kematian massal pada ayam. Gejala meliputi penurunan produksi telur, kesulitan bernapas, dan keluarnya cairan dari hidung dan mata."
        ]);
        Penyakit::factory()->create([
            'nama' => "Avian Influenza ",
            'slug' => "avian-influenza ",
            'detail' => "Merupakan penyakit viral yang dapat menyebabkan kematian mendadak pada ayam. Gejalanya meliputi penurunan produksi telur, pembengkakan dan memar pada wattle dan kulit kepala, serta kesulitan bernapas."
        ]);
        Penyakit::factory()->create([
            'nama' => "Coccidiosis",
            'slug' => "coccidiosis",
            'detail' => "Disebabkan oleh parasit protozoa dan dapat menyebabkan diare berdarah, penurunan pertumbuhan, dan kematian pada ayam."
        ]);
        Penyakit::factory()->create([
            'nama' => "Infectious Bronchitis",
            'slug' => "Infectious-bronchitis",
            'detail' => "Merupakan penyakit viral yang dapat menyebabkan gangguan pernapasan, penurunan produksi telur, dan telur berlapis tipis."
        ]);

        // Seeder gejala     
        Gejala::factory()->create([
            'nama' => "Penurunan produksi telur",
            'slug' => "penurunan-produksi-telur",
            'detail'=> "Penurunan produksi telur adalah kondisi di mana jumlah telur yang dihasilkan oleh ternak seperti ayam menurun dari tingkat produksi normal. Hal ini bisa disebabkan oleh berbagai faktor seperti penyakit, stres, perubahan lingkungan, atau masalah nutrisi."
        ]);
        Gejala::factory()->create([
            'nama' => "Kehilangan nafsu makan",
            'slug' => "kehilangan-nafsu-makan",
            'detail' => "Kehilangan nafsu makan pada ayam bisa disebabkan oleh berbagai faktor, termasuk penyakit, stres, kondisi lingkungan yang tidak sesuai, atau masalah nutrisi. Kondisi ini dapat mengganggu pertumbuhan dan produksi telur ayam."
        ]);

        Gejala::factory()->create([
            'nama' => "Perubahan perilaku",
            'slug' => "perubahan-perilaku",
            'detail' => "Perubahan perilaku pada ayam bisa menjadi tanda adanya masalah kesehatan atau stres. Misalnya, ayam yang biasanya aktif menjadi lesu, atau ayam yang biasanya tenang menjadi agresif. ",
        ]);
        Gejala::factory()->create([
            'nama' => "Perubahan pada kotoran",
            'slug' => "perubahan-pada-kotoran",
            'detail' => "Perubahan pada kotoran ayam bisa menjadi indikator kondisi kesehatannya. Kotoran yang terlalu cair atau terlalu padat, berwarna aneh, atau mengandung darah dapat menunjukkan adanya masalah seperti infeksi, gangguan pencernaan, atau masalah nutrisi."
        ]);
    }
}
