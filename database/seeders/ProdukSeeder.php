<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            //Kecantikan
            [
                'nama_produk' => 'Avoskin Perfect Hydrating Treatment Essence',
                'foto_produk' => '/images/Avoskin.png',
                'harga' => 299000,
                'stok' => 3,
                'diskon' => 0,
                'deskripsi' => 'Avoskin Perfect Hydrating Treatment Essence hadir dengan kemasan 30 ml yang travel friendly! Memiliki kandungan utama chamomile oil dan ET-VC, produk ini efektif untuk melembapkan kulit, mencerahkan, mengatasi jerawat, anti-inflamasi, dan antioksidan.
                Produk ini merupakan salah satu produk Avoskin yang minimal ingredients, paraben free, fungal acne safe, dan mengandung fatty alcohol. Kandungan alcohol jenis fatty ini berfungsi sebagai carrying agent yang membantu penyerapan kandungan lain dan efektif untuk melembutkan kulit. 
                ',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Bodyscrub Camille 250gr by camille',
                'foto_produk' => '/images/gambar/skincare/Bodyscrub Camille 250gr by camille.png',
                'harga' => 75000,
                'stok' => 1,
                'diskon' => 0,
                'deskripsi' => 'Strawberry Yoghurt Body scrub dapat membantu mengangkat sel-sel kulit mati dan juga dapat mencerahkan serta melembabkan karena body scrub ini memiliki kandungan Niacinamide, Vitamin B, Allantoin, Olive Oil, Yoghurt Juice Powder Extract, Strawberry Juice Powder Extract.',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Emina Sugar Rush Lip Scrub 4.2 gr',
                'foto_produk' => 'images/gambar/skincare/Emina Sugar Rush Lip Scrub.png',
                'harga' => 38500,
                'stok' => 100,
                'diskon' => 0,
                'deskripsi' => 'Emina Sugar Rush Lip Scrub merupakan scrub khusus bibir untuk menjaga kesehatan bibir dan mengangkat sel kulit mati.  ',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'FACETOLOGY Triple Care Sunscreen SPF 40+ PA+++ Hybrid',
                'foto_produk' => 'images/gambar/skincare/Facetology triple care sunscreen.png',
                'harga' => 79999,
                'stok' => 2,
                'diskon' => 0,
                'deskripsi' => 'Sunscreen ini  menggunakan technology hybrid dengan 3 fokus benefits yaitu : Broad spectrum Protection (UV A, UV B & Blue Light)
                SPF 40 PA+++, Brightening (with double Brightening Agents), Calming (with Centella asiatica, mugwort extract and Syrcalm technology)Dengan texture yang sangat ringan bahkan seperti air dan minim whitecast, membuat sunscreen ini uniq dan
                akan menjadi pilihan yang tepat bagi consumers.',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Golden Viera Soap',
                'foto_produk' => 'images/gambar/skincare/Golden Viera Shop.png',
                'harga' => 40000,
                'stok' => 3,
                'diskon' => 0,
                'deskripsi' => 'Sabun yang diperkaya dengan bahan-bahan ekstrak alami herbal berkualitas yang baik untuk menutrisi kulit.',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Hada Labo Gokujyun Ultimate Moisturizing Lotion',
                'foto_produk' => 'images/gambar/skincare/Hadalabo Goku Jyun Moisturizing lotion.png',
                'harga' => 55000,
                'stok' => 1,
                'diskon' => 0,
                'deskripsi' => 'adalah toner pelembab yang mengandung 3 jenis Hyaluronic Acid untuk membantu meningkatkan kelembaban pada kulit dan
                 mempertahankan keseimbangan serta kelembaban kulit. Lotion ini dapat mengunci kelembaban di dalam kulit sehingga kulit terhidrasi dengan baik. Kulit akan terasa lebih halus, lembut dan tetap elastis. Mengandung alkohol sebagai astringent yang mengurangi produksi minyak berlebih dan membuat kulit senantiasa terasa lebih segar',     
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Madame Gie Madame Perfect Brow - MakeUp Pensil alis Mekanik',
                'foto_produk' => 'images/gambar/skincare/Madame Gie Madame Perfect Brow.png',
                'harga' => 20000,
                'stok' => 2,
                'diskon' => 0,
                'deskripsi' => 'Pensil Alis Putar (Eyebrow Matic) yang dilengkapi dengan bulu sikat untuk memudahkan pembauran dan untuk merapikan alis. Memiliki formula waterproof, smudgeproof dan tahan lama.',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Noera 3 In 1 Body Spray | Natural Deo Spray Penghilang Bau Badan BPOM',
                'foto_produk' => 'images/gambar/skincare/Noera 3 in 1 Body Spray.png',
                'harga' => 44900,
                'stok' => 2,
                'diskon' => 0,
                'deskripsi' => 'Wajib banget yaa nyetok noera body spray yang super ampuh bikin kamu pede seharian tanpa BAU!.
                cocok  juga untuk remaja yg baru pubertas dgn keringat berlebih pengganti deodorant, tidak bikin KETEK HITAM & BAJU KUNING',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'NPURE Face Wash / FOAM CENTELLA ASIATICA (Cica Series)',
                'foto_produk' => 'images/gambar/skincare/NPure Face Wash Centella Asiatica.png',
                'harga' => 90000,
                'stok' => 5,
                'diskon' => 0,
                'deskripsi' => 'Pembersih  Wajah Ringan dengan kandungan Real Centella Leaves, Green Tea, Mix Fruit Extract, dan Vit B3/Niacinamide',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Scarlett Whitening Skin Smoothing Retinol Serum',
                'foto_produk' => 'images/gambar/skincare/Scarlett Whitening Skin Smoothing Retinol Serum.png',
                'harga' => 75000,
                'stok' => 5,
                'diskon' => 0,
                'deskripsi' => 'Manfaat Retinol adalah Mencegah tanda-tanda penuaan dan menyamarkan garis-garis halus yang telah muncul,
                Meningkatkan proses regenerasi kulit sehingga sel kulit mati terangkat dan kulit terlihat lebih cerah serta halus,
                Membantu menyamarkan tampilan pon-porbesar, dan Membantu meningkatkan produksi Kolagen dan elastin sehingga kulit terasa lebih kenyal',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'SKINTIFIC - 360 Crystal Massager Lifting Eye Cream',
                'foto_produk' => 'images/gambar/skincare/Skintific Massager Lifting Eye Cream.png',
                'harga' =>189900,
                'stok' => 1,
                'diskon' => 0,
                'deskripsi' => 'Eye cream supercharged yang mengandung 3D Peptide Complex dan Niacinamide untuk mengurangi garis-garis halus, kerutan, 
                sembab, serta mencerahkan area bawah mata yang gelap. Dilengkapi dengan teknologi 360 ° Crystal Rolling Massager, sebuah teknologi Lift-Tech ™ 
                dari Jerman dengan 184 permukaan kristal dan dapat berputar searah 360 °, sehingga membantu daya serap kandungan aktif pada kulit dan mengurangi garis-garis halus yang terlihat & kantung mata di waktu yang bersamaan.',
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'AZARINE HYDRASHOOTHE SUNSCREEN GEL SPF45 PA++++',
                'foto_produk' => 'images/gambar/skincare/Suncreen gel azarine.png',
                'harga' => 68000,
                'stok' => 10,
                'diskon' => 0,
                'deskripsi' => 'Tabir surya wajah dalam bentuk gel ( water base) yang sangat ringan, dingin dan mudah meresap untuk seluruh jenis kulit 
                termasuk kulit berminyak dan acne prone skin. Di formulasikan dengan kandungan bahan alami Propolis, aloe Vera, green tea dan delima untuk melindungi kulit dari sinar UV A & UV B serta menutrisi kulit.  ', 
                'kategori_id' => 1,
                'supplier_id' => 1
            ],
            //Fahion Wanita
            [
                'nama_produk' => 'Amira Blouse',
                'foto_produk' => 'images/gambar/Fashion wanita/Amira Blouse.png',
                'harga' => 49990,
                'stok' => 15,
                'diskon' => 0,
                'deskripsi' => 'dibuat dengan bahan rayon viscose dengan ukuran Lebar dada -/+ 110cm, Panjang baju depan  -/+ 63cm,
                Panjang baju belakang -/+ 70cm, Panjang lengan -/+ 55cm, Lebar bahu -/+ 40cm. Allsize Fit To XL ( 1 Ukuran )', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Candy Oversize',
                'foto_produk' => 'images/gambar/Fashion wanita/Candy Oversize.png',
                'harga' => 38000,
                'stok' => 5,
                'diskon' => 0,
                'deskripsi' => 'Bahan Katun Poly Fit XL dengan ukuran Lingkar dada 124cm, Panjang baju 59cm, dan Panjang lengan 43cm', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'HIJAB SPORT BAHAN STELLA PREMIUM',
                'foto_produk' => 'images/gambar/Fashion wanita/Hijab Sport Bahan Stella Premium.png',
                'harga' => 16900,
                'stok' => 8,
                'diskon' => 0,
                'deskripsi' => 'Bergo sport jilbab sport bahan premium STELLA BUKAN JERSEY. Pad anti tembem
                Cocok bgt buat jilbab olahraga, dipake dirumah sehari-hari atau buat kerja yg mengharuskan memakai jilbab yg dimasukkan ke dalem baju ini tuh cocok bgt ya kak.
                Bahan STELLA PREMIUM super nyaman tidak transparan, ketebalan pas.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Inner leher | manset leher',
                'foto_produk' => 'images/gambar/Fashion wanita/Inner Leher.png',
                'harga' => 15900,
                'stok' => 11,
                'diskon' => 0,
                'deskripsi' => 'Bahan kaos super nyaman, tidak bikin gatel di leher/dada. Cocok bgt buat kalian yg pny baju/outer2 yg kancingnya aga ke bawah jadi tinggal kalian tambah inner leher aja, tanpa harus pake manset badan uda aman bgt ya, dada dan leher ga keliatan lagi deh. Jadi lbh nyaman dipake.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Inner Rib Ruffle Turtleneck',
                'foto_produk' => 'images/gambar/Fashion wanita/Inner Rib Ruffle Turtleneck.png',
                'harga' => 45900,
                'stok' => 4,
                'diskon' => 0,
                'deskripsi' => 'Bahan kain rib premium yang Halus, Tebal, dan Lentur sehingga sangat lembut dan menyerap keringat.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Kaos Rib Basic',
                'foto_produk' => 'images/gambar/Fashion wanita/Kaos Rib Basic.png',
                'harga' => 40000,
                'stok' => 5,
                'diskon' => 0,
                'deskripsi' => 'LD 100cm bisa melar sampai 110cm⁣. PB +/- 70cm. Bahan plisket adem gak terawang', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Paris Premium Voal',
                'foto_produk' => 'images/gambar/Fashion wanita/Paris Premium Voal.png',
                'harga' => 99900,
                'stok' => 56,
                'diskon' => 0,
                'deskripsi' => 'Kerudung Segi Empat Paris Voal // Paris Premium // Segi Empat Paris Polos. 
                berbahan paris namun tegak seperti voal, mudah dibentuk dan tidak mudah letoy, lemes tidak licin sama sekali, finishing garis tepi.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'PASMINA CERUTY BABYDOL IMPORT',
                'foto_produk' => 'images/gambar/Fashion wanita/Pasmina Ceruty Babydol Import.png',
                'harga' => 29900,
                'stok' => 10,
                'diskon' => 0,
                'deskripsi' => 'Pasmina CERUTY. Bahan babydol premium. sangat jatuh. TEPI JAHIT RAPI. Ukuran 175X75cm. Mudah di bentuk', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'PASMINA INNER PREMIUM 2 in 1',
                'foto_produk' => 'images/gambar/Fashion wanita/Pasmina Inner Premium 2 in 1.png',
                'harga' => 35000,
                'stok' => 4,
                'diskon' => 0,
                'deskripsi' => 'pashmina inner 2in1 . Cocok di pakai daily maupun acara formal/casual. 
                Gak perlu pakai inner terpisah karna sudah include innernya langsung.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'PASMINA PLISKET PREMIUM TANPA GARIS TENGAH',
                'foto_produk' => 'images/gambar/Fashion wanita/Pasmina Plisket Premium Tanpa Garis Tengah.png',
                'harga' => 33900,
                'stok' => 4,
                'diskon' => 0,
                'deskripsi' => 'Pashmina Plisket Premium. Plisket nya full sampe ke ujung. Mudah diatur.
                Tegak di dahi.  Tidak mudah kusut. Bisa di styling sesuai keinginan kalian. Tersedia banyak pilihan warna', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Pashmina Silk Premium',
                'foto_produk' => 'images/gambar/Fashion wanita/Pasmina silk Premium.png',
                'harga' => 39900,
                'stok' => 10,
                'diskon' => 0,
                'deskripsi' => 'Bahanya yang Exclusive dan Mewah jadi nilai Plus buat Pashima iniiii gak perlu di strika.
                Matterial CARDENZA Silk. Jahit Tepi seluruh bagian. Tidak terawang. Flowy dan Mudah di bentuk. Serat halus.', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'SEGIEMPAT INNER 2in1',
                'foto_produk' => 'images/gambar/Fashion wanita/Segiempat Inner 2 in 1.png',
                'harga' => 38000,
                'stok' => 14,
                'diskon' => 0,
                'deskripsi' => 'Hijab super simple yang ngga harus ribet, tinggal slup lansung pakai aja, 
                tapi tetap bikin look kamu beauty & stylist ', 
                'kategori_id' => 2,
                'supplier_id' => 1
            ],
     
            //Perempuan Kesehatan
            [
                'nama_produk' => 'GLOW COLLAGEN QUEENZY SKIN',
                'foto_produk' => 'images/gambar/kesehatan/Glow Collagen Queenzy Skin.png',
                'harga' => 25000,
                'stok' => 8,
                'diskon' => 0,
                'deskripsi' => 'Kandungan collagen 1.500 mg yang lebih mudah menyerap ke dalam tubuh. Glutathione yang akan dengan antioksidan.
                Fiber untuk melancarkan pencernaan dan detox tubuh. Low Calories dengan Gula Stevia dan lebih aman untuk penderita diabetes.
                Aman untuk penderita maag. Dapat digunakan mulai umur 13 tahun.',  
                'kategori_id' => 3,
                'supplier_id' => 1
            ],
            [
                'nama_produk' => 'Noera Collagen Drink',
                'foto_produk' => 'images/gambar/kesehatan/Noera Collagen Drink.png',
                'harga' => 185000,
                'stok' => 5,
                'diskon' => 0,
                'deskripsi' => 'New formula dengan kandungan salmon collagen dan glutathione terbaik, lebih rendah kalori, rendah lemak dan rendah karbohidrat, lebih sehat.
                Kualitas premium & harga terjangkau',
                'kategori_id' => 3,
                'supplier_id' => 1
            ],

            //souvenir
            [
                'nama_produk' => 'Packaging Box (FREE Kartu Ucapan)',
                'foto_produk' => 'images/gambar/Souvenir dan pesta/Packaging Box.png',
                'harga' => 10000,
                'stok' => 40,
                'diskon' => 0,
                'deskripsi' => 'KOTAK KADO TANPA ISI !!!. Sudah sama pita dan kartu ucapan kartu ucapan bisa pilih (cantumkan di pesan ya)',          
                'kategori_id' => 4,
                'supplier_id' => 1
            ],
            ]);
    }
}
