<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            [
                'judul' => 'The Great Gatsby',
                'pengarang' => 'F. Scott Fitzgerald',
                'deskripsi' => 'Sebuah novel klasik yang menggambarkan kehidupan glamour dan kegelapan di era 1920-an di Amerika Serikat. Kisahnya berpusat pada tokoh Jay Gatsby dan kisah cintanya dengan Daisy Buchanan.',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => '1984',
                'pengarang' => 'George Orwell',
                'deskripsi' => 'Novel distopia tentang masyarakat totaliter di mana pemerintah mengontrol segala aspek kehidupan.',
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Harry Potter and the Sorcerer\'s Stone',
                'pengarang' => 'J.K. Rowling',
                'deskripsi' => 'Novel fantasi yang memulai petualangan Harry Potter, seorang anak penyihir yang menemukan dirinya di Hogwarts School of Witchcraft and Wizardry.',
                'stok' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'To Kill a Mockingbird',
                'pengarang' => 'Harper Lee',
                'deskripsi' => 'Novel yang menggambarkan masalah rasial dan ketidakadilan di Amerika Selatan. Kisahnya menceritakan pengalaman Scout Finch saat tumbuh dewasa di Maycomb, Alabama, selama Depresi Besar.',
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pride and Prejudice',
                'pengarang' => 'Jane Austen',
                'deskripsi' => 'Sebuah novel klasik tentang percintaan dan konvensi sosial di Inggris abad ke-19. Kisahnya berkisar pada tokoh Elizabeth Bennet dan Mr. Darcy.',
                'stok' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
