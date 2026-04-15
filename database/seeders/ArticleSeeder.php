<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $articles = [
            [
                'title' => '10 Tips Menjaga Kesehatan Jantung',
                'content' => 'Kesehatan jantung adalah fondasi kehidupan yang sehat. Berikut adalah 10 tips penting untuk menjaga kesehatan jantung Anda: 1) Rutin berolahraga minimal 30 menit sehari, 2) Konsumsi makanan rendah lemak jenuh, 3) Hindari merokok dan alkohol berlebihan, 4) Kelola stres dengan baik, 5) Tidur cukup 7-8 jam sehari, 6) Periksakan tekanan darah secara rutin, 7) Jaga berat badan ideal, 8) Konsumsi buah dan sayur setiap hari, 9) Kurangi konsumsi garam, 10) Lakukan check-up jantung secara berkala.',
                'category' => 'Jantung',
                'status' => 'published',
            ],
            [
                'title' => 'Pentingnya Nutrisi Seimbang untuk Tubuh',
                'content' => 'Nutrisi seimbang merupakan kunci utama untuk menjaga kesehatan tubuh secara menyeluruh. Tubuh membutuhkan berbagai macam nutrisi termasuk karbohidrat, protein, lemak sehat, vitamin, dan mineral. Konsumsi makanan yang beragam dari berbagai kelompok makanan seperti sayuran hijau, buah-buahan segar, biji-bijian, dan protein hewani maupun nabati. Pastikan juga Anda minum air putih minimal 8 gelas sehari untuk menjaga hidrasi tubuh.',
                'category' => 'Nutrisi',
                'status' => 'published',
            ],
            [
                'title' => 'Panduan Olahraga untuk Pemula',
                'content' => 'Memulai rutinitas olahraga bisa terasa menakutkan bagi pemula. Mulailah dengan aktivitas ringan seperti jalan kaki selama 15-20 menit sehari, kemudian tingkatkan secara bertahap. Pilih jenis olahraga yang Anda nikmati agar konsisten. Beberapa pilihan olahraga yang baik untuk pemula termasuk jogging, berenang, bersepeda, dan yoga. Jangan lupa untuk selalu melakukan pemanasan sebelum dan pendinginan setelah berolahraga.',
                'category' => 'Olahraga',
                'status' => 'published',
            ],
            [
                'title' => 'Mengenal Gejala dan Pencegahan Diabetes',
                'content' => 'Diabetes mellitus adalah penyakit kronis yang ditandai dengan tingginya kadar gula darah. Gejala umum diabetes meliputi sering haus, sering buang air kecil, penurunan berat badan tanpa sebab, dan mudah lelah. Pencegahan diabetes dapat dilakukan dengan menjaga pola makan sehat, rutin berolahraga, menjaga berat badan ideal, dan menghindari makanan tinggi gula serta karbohidrat olahan.',
                'category' => 'Penyakit',
                'status' => 'published',
            ],
            [
                'title' => 'Manfaat Meditasi untuk Kesehatan Mental',
                'content' => 'Meditasi telah terbukti secara ilmiah memberikan berbagai manfaat bagi kesehatan mental. Praktik meditasi secara rutin dapat mengurangi tingkat stres, kecemasan, dan depresi. Selain itu, meditasi juga meningkatkan konsentrasi, kualitas tidur, dan kesejahteraan emosional secara keseluruhan. Mulailah dengan meditasi sederhana selama 5-10 menit sehari dan tingkatkan durasinya secara bertahap.',
                'category' => 'Kesehatan Mental',
                'status' => 'published',
            ],
            [
                'title' => 'Tips Menjaga Kesehatan Mata di Era Digital',
                'content' => 'Di era digital, mata kita terpapar layar gadget selama berjam-jam. Ikuti aturan 20-20-20: setiap 20 menit, lihat objek yang berjarak 20 kaki (6 meter) selama 20 detik. Pastikan pencahayaan ruangan cukup saat menggunakan gadget, atur brightness layar, dan gunakan mode gelap jika tersedia. Periksakan mata secara rutin ke dokter mata minimal setahun sekali.',
                'category' => 'Kesehatan Mata',
                'status' => 'published',
            ],
            [
                'title' => 'Panduan Tidur Sehat untuk Produktivitas Optimal',
                'content' => 'Tidur yang berkualitas sangat penting untuk produktivitas dan kesehatan. Usahakan tidur 7-9 jam setiap malam pada jam yang sama. Hindari kafein dan layar gadget minimal 1 jam sebelum tidur. Ciptakan lingkungan tidur yang nyaman dengan suhu ruangan yang sejuk, gelap, dan tenang. Rutinitas tidur yang teratur akan membantu tubuh memiliki ritme sirkadian yang sehat.',
                'category' => 'Gaya Hidup',
                'status' => 'published',
            ],
            [
                'title' => 'Cara Meningkatkan Sistem Imun Tubuh',
                'content' => 'Sistem imun yang kuat adalah pertahanan terbaik tubuh terhadap penyakit. Beberapa cara untuk meningkatkan sistem imun meliputi: konsumsi makanan kaya vitamin C (jeruk, kiwi, paprika), vitamin D (ikan salmon, telur), zinc (daging merah, kacang-kacangan), serta probiotik (yogurt, tempe). Olahraga teratur, tidur cukup, dan mengelola stres juga berperan penting dalam menjaga kekebalan tubuh.',
                'category' => 'Nutrisi',
                'status' => 'published',
            ],
            [
                'title' => 'Bahaya Merokok dan Tips Berhenti Merokok',
                'content' => 'Merokok merupakan salah satu penyebab utama berbagai penyakit serius termasuk kanker paru-paru, penyakit jantung, dan stroke. Tips untuk berhenti merokok: tentukan tanggal berhenti, cari dukungan dari keluarga dan teman, gunakan pengganti nikotin jika diperlukan, hindari pemicu keinginan merokok, dan konsultasikan dengan dokter untuk program berhenti merokok yang efektif.',
                'category' => 'Gaya Hidup',
                'status' => 'published',
            ],
            [
                'title' => 'Pentingnya Vaksinasi untuk Anak dan Dewasa',
                'content' => 'Vaksinasi adalah salah satu cara paling efektif untuk mencegah penyakit menular. Untuk anak-anak, vaksinasi wajib meliputi BCG, Hepatitis B, DPT, Polio, dan Campak. Orang dewasa juga perlu mendapatkan vaksinasi seperti influenza tahunan, Hepatitis B, dan vaksinasi lainnya sesuai rekomendasi dokter. Konsultasikan jadwal vaksinasi dengan dokter Anda untuk perlindungan optimal.',
                'category' => 'Penyakit',
                'status' => 'draft',
            ],
        ];

        foreach ($articles as $article) {
            Article::create(array_merge($article, [
                'user_id' => $admin->id,
            ]));
        }
    }
}
