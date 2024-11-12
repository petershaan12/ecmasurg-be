<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // 1
            [
                "question" => "Pasien Ny. A berusia 35 tahun dirawat di RS dengan cedera medulla spinalis. Hasil pengkajian: pasien kesulitan menggerakkan panggul dan ekstremitas bawah, nyeri saat digerakkan, rentang gerak menurun, ekstremitas teraba dingin, TD 110/70 mmHg, HR 70 x/menit, dan terpasang kateter urine. Apakah diagnosa keperawatan utama yang tepat?",
                "options" => ["Nyeri akut", "Resiko syok", "Gangguan mobilitas fisik", "Gangguan eliminasi urine", "Ketidakefektifan perfusi jaringan perifer"],
                "correct_option" => 2,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "data fokus masalah adalah kesulitan menggerakkan panggul dan ekstremitas bawah, rentang gerak menurun, dan nyeri saat digerakkan. Masalah keperawatan yang tepat yaitu gangguan mobilitas fisik, yang merupakan keterbatasan dalam gerakan fisik dari satu atau lebih ekstremitas secara mandiri yang ditandai dengan data mayor pasien mengeluh sulit menggerakkan ekstremitas, kekuatan otot menurun dan rentang gerak menurun."
            ],
            // 2
            [
                "question" => "2. Pasien Ny. L 26 tahun dirawat di Rumah Sakit Medika dengan post craniotomy hari ke-2. Perawat akan melakukan perawatan luka pada pasien. Saat ini perawat telah membersihkan luka dan kulit di sekitar luka dengan NaCl 0,9%. Apakah tindakan yang tepat dilakukan oleh perawat selanjutnya?",
                "options" => ["Mengkaji kondisi luka", "Melepaskan handscoon", "Menutup luka dengan kassa kering", "Menutup luka dengan kassa lembab", "Mengoleskan cairan antiseptik pada luka"],
                "correct_option" => 4,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Perawatan luka operasi. Opsi “Mengkaji kondisi luka” kurang tepat, ini dilakukan sebelum perawat membersihkan luka dengan NaCl 0,9%. Opsi “Melepaskan handscoon” kurang tepat, ini dilakukan setelah prosedur perawatan luka selesai dilakukan. Opsi “Menutup luka dengan kassa kering” kurang tepat, dilakukan setelah perawat mengoleskan luka dengan cairan antiseptik. Opsi “Menutup luka dengan kassa lembab” salah, ini dilakukan pada perawatan luka kotor. Opsi “Mengoleskan cairan antiseptik pada luka” tepat, setelah luka dibersihkan dengan cairan NaCl 0,9%, selanjutnya perawat mengoleskan luka dengan kassa yang telah diberi cairan antiseptik."
            ],
            // 3
            [
                "question" => "Seorang pasien wanita mengalami vertigo berat. Manakah instruksi yang harus diberikan perawat pada pasien untuk membantu mengontrol vertigonya?",
                "options" => ["Terlentang dan melihat televisi", "Menghindari lampu yang terang", "Meningkatkan sodium dalam makanan", "Menghindari pergerakan kepala tiba-tiba", "Meningkatkan konsumsi cairan sampai 3000 mL/hari"],
                "correct_option" => 3,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Perawat menginstruksikan pasien untuk melakukan pergerakan kepala secara perlahan untuk mencegah vertigo memberat. Hindari pergerakan kepala yang tiba-tiba."
            ],
            // 4
            [
                "question" => "Pasien dengan sindrom Guillain-Barre mengalami paralisis pada tubuh bagian atas, sudah diintubasi dan diberikan ventilasi mekanik. Manakah strategi yang harus dimasukkan perawat pada perencanaan keperawatan untuk membantu pasien menghadapi penyakitnya?",
                "options" => ["Memberikan obat penenang melalui intravena", "Mengurangi distraksi dan membatasi pengunjung", "Memberikan umpan balik positif dan mendorong ROM aktif", "Memberikan pasien kontrol penuh atas keputusan perawatan dan membatasi pengunjung", "Memberikan informasi, memberikan umpan balik yang positif, dan mendorong relaksasi"],
                "correct_option" => 4,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Pasien dengan sindrom Guillain-Barre sering mengalami ketakutan dan kecemasan. Perawat dapat membantu dengan memberikan informasi, umpan balik positif, dan mendorong relaksasi untuk mengurangi kecemasan."
            ],
            // 5
            [
                "question" => "Seorang pasien mengalami defisit neurologis yang melibatkan sistem limbik. Manakah temuan pengkajian yang spesifik pada tipe defisit neurologis ini?",
                "options" => ["Disorientasi pada orang, tempat, dan waktu", "Tidak mampu mengenali lingkungan sekitar", "Afek datar, dengan periode labilitas emosional", "Tidak dapat mengingat apa yang dimakan saat sarapan hari ini", "Tidak mampu melakukan penambahan dan pengurangan, tidak tahu siapa presiden Indonesia"],
                "correct_option" => 2,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Sistem limbik bertanggung jawab pada perasaan (afek) dan emosi. Afek datar dan labilitas emosional adalah tanda defisit neurologis pada sistem limbik."
            ],
            // 6
            [
                "question" => "Seorang pasien wanita berusia 48 tahun dirawat di ruang ICU mendapatkan terapi cairan via infuse pump dengan kecepatan 125 ml/jam. Perawat memeriksa daerah insersi venipuncture di daerah radialis berwarna merah, bengkak, hangat, dan nyeri pada area proksimal. Manakah intervensi keperawatan yang harus dilakukan pertama kali?",
                "options" => ["Memasang infus", "Menghentikan infus", "Mengganti cairan infus", "Mengompres dingin daerah insersi", "Memperlambat tetesan infus sampai 10 ml/jam"],
                "correct_option" => 1,
                "category" => "perawatan intensif",
                "points" => 10,
                "pembahasan" => "Kemerahan, hangat, nyeri, dan bengkak pada area proksimal tusukan merupakan indikasi phlebitis, sehingga jalur infus harus dihentikan segera."
            ],
            // 7
            [
                "question" => "Seorang perawat ditugaskan untuk merawat 5 orang pasien dan menghabiskan waktunya untuk merawat 1 orang diantaranya yang baru kembali dari kamar bedah. Perawat tidak minta asisten dan tidak memonitor pasien yang lain. Pada siang hari, seorang pasiennya turun dari tempat tidur tanpa bantuan dan jatuh dari tempat tidur, sehingga lengannya patah. Manakah perilaku perawat yang menggambarkan kelalaian dalam bekerja?",

                "options" => ["Tangan pasien yang mengalami patah ", "Membiarkan pasien turun dari tempat tidur", "Perawat tidak mengecek secara teratur pasien lain", "Perawat melakukan asuhan keperawatan kepada 4 orang pasien", "Menghabiskan sebagian besar waktunya merawat seorang paisen yang baru kembali dari kamar bedah"],

                "correct_option" => 2,

                "category" => "Pensarafan",

                "points" => 10,

                "pembahasan" => "Perawat dapat dituntut dengan tuntutan malpraktik, karena gagal memenuhi tugasnya sehingga menyebabkan orang lain dalam bahaya. Perawat juga dapat dituntut dengan tuntutan kelalaian karena perbuatan pengabaian pasien. Hati-hati juga tindakan pengabaian yang menimbulkan bahaya bagi orang lain. Perawat yang tidak melakukan monitoring secara teratur berarti gagal melakukan tugas dan kewajibannya terhadap pasien yang mengakibatkan pasien trauma."
            ],
            // 8
            [
                "question" => "Pasien Tn. J berusia 62 tahun dirawat di ruang penyakit bedah sejak tujuh hari yang lalu, hasil pengkajian didapatkan data ekstremitas atas dan bawah tidak dapat digerakkan secara aktif, kulit disekitar area penonjolan tulang tampak kemerahan, pasien tampak lemas. Hasil pengkajian Tekanan Darah 185/100 mmHg, Nadi 85 x/menit, Suhu 37,8°C, pernafasan 20 x/menit. Apa yang dilakukan perawat untuk meningkatkan kenyamanan pada pasien? ",

                "options" => ["Melatih ROM", "Melakukan masage", "Mobilisasi tiap 2 jam", "Memonitor kulit pasien", "Memberikan kompres air hangat"],

                "correct_option" => 2,
                "category" => "pensaraafan",
                "points" => 10,
                "pembahasan" => "Cukup jelas, ekstremitas atas dan bawah tidak dapat digerakkan secara aktif, kulit disekitar area penonjolan tulang tampak kemerahan, pasien tampak lemas. Jadi perawat harus memobilisasi pasien setiap 2 jam"
            ],
            // 9
            [
                "question" => "Seorang laki-laki usia 60 tahun dirawat diruang penyakit syaraf dengan diagnosa medis stroke. Dari hasil anamnesa di dapatkan keadaan umum lemah, hemipharase sinistra, bicara pelo dan tersedak saat screening disphagia. TD 150/100 mmHg, frekuensi nafas 23 x/menit, nadi 95 x/menit, suhu 36,8°C. Sehingga diperlukan pemasangan NGT untuk memberikan nutrisi yang adekuat. Apakah diagnosis keperawatan yang tepat pada kasus tersebut ? ",

                "options" => ["Menegur pasien karena lalai", "Menjelaskan pentingnya kepatuhan", "Mengganti obat pasien dengan dosis lebih tinggi", "Mengurangi jumlah obat yang harus diminum", "Menyarankan pasien untuk menggunakan pengingat minum obat"],

                "correct_option" => 0,
                "category" => "pensaarafan",
                "points" => 10,
                "pembahasan" => "Didapatkan data bahwa pasien mengalami stroke, keadaan umum lemah, hemipharase sinistra, bicara pelo dan tersedak saat screening disphagia. Pasien dipasang NGT. Pasien berisiko mengalami aspirasi."
            ],
            // 10
            [
                "question" => "Seorang laki-laki usia 50 tahun dirawat di ruang perawatan interna dengan keluhan merasa mual, muntah, nafsu makan menurun dan lemah. Hasil anamnesis pasien riwayat penyakit hipertensi sejak 8 tahun lalu, TD 150/100 mmHg, frekuensi nadi 85 x/menit, frekuensi napas 20 x/menit, TB 155 cm, BB 38 kg. Pemeriksaan laboratorium Hb. 7,0 gr%, ureum 4.5 mg/dl, creatinin 6,8 mg/dl , albumin 2 g/dl. Apakah prioritas masalah keperawatan pada kasus di atas?",


                "options" => ["Intoleransi aktivitas", "Pola nafas tidak efektif", "Gangguan perfusi jaringan", "Kekurangan volume cairan", "Ketidakseimbangan nutrisi kurang dari kebutuhan tubuh"],

                "correct_option" => 4,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Melatih gerakan motorik halus dapat membantu pemulihan fungsi ekstremitas kanan yang lemah."
            ],
            // 11
            [
                "question" => "Seorang laki-laki berusia 28 tahun dirawat di RS akibat cedera kepala. Pasien mengeluh pusing disertai mual, nyeri pada tengkuk dan luka dileher dengan skala nyeri 7. Terdapat luka robek pada pelipis mata dan leher dengan 5 jahitan. Pemeriksaan didapatkan TD 120/70 mmHg, frekuensi napas 18 x/menit, frekuensi nadi 75 x/menit. Apakah tindakan kolaboratif yang paling tepat untuk pasien tersebut?",

                "options" => ["Analgetik", "Antipiretik", "Antiemetik", "d. Antihistamin", "Anti inflamasi "],

                "correct_option" => 0,
                "category" => "penfasarafan",
                "points" => 10,
                "pembahasan" => "Analgetik unutk obat pereda rasa sakit atau nyeri, antipiretik obat penurun demam, antiinflamasi obat anti radang, antihistamin obat untuk menyembuhkan reaksi alergi, antiemetik obat anti muntah."
            ],
            // 12
            [
                "question" => "12. Pasien Ny. H berusia 50 tahun datang ke poliklinik saraf dengan keluhan kaku pada daerah bahu. Perawat melakukan pemeriksaan fungsi saraf cranial dengan menekan pundak pasien, pasien diminta untuk mengangkat pundaknya. Selanjutnya pasien diminta menoleh ke kanan dan kiri, leher ditahan oleh perawat, kemudian perawat meraba tonus dari musculus trapezius. Pemeriksaan nervus apakah pada kasus di atas?",

                "options" => ["Nervus vagus ", "Nervus optikus ", "Nervus koklearis", "Nervus aksesorius", "e. Nervus hipoglosus"],

                "correct_option" => 3,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Pemeriksaan yang dilakukan perawat adalah pemeriksaan nervus XI (aksesorius). Car pemeriksaan yaitu : 1) Pasien diminta untuk mengangkat bahu dengan tahanan dari pemeriksa untuk memeriksa fungsi otot trapeziusnya. 2) Pasien diminta meletakkan tangannya dikepala untuk melihat fungsi otot trapezius dalam abduksi bahu lebih dari 90 derajat. 3) Pasien diminta untuk menggerakkan dagunya ke arah salah satu bahu dengan tahanan untuk melihat fungsi otot sternocleiodomastoid bagian kontralateral."
            ],
            // 13
            [
                "question" => "Pasien Tn. J berusia 60 tahun dirawat di ruang saraf didiagnosa stroke non hemoragik. Hasil pengkajian ditemukan hemiplegia sinistra, terdapat parese nervus IX dan X. Pasien dibantu mobilisasi miring kiri dan kanan. Pasien mengatakan sudah 3 hari belum buang air besar. Apakah tindakan keperawatan prioritas yang akan dilakukan?",

                "options" => ["Fisioterapi ", "Abdominal massage", "Berikan terapi nutrisi","Berikan mobilisasi lebih rutin", "Pengkajian fungsi saraf otonom"],
                "correct_option" => 1,
                "category" => "penfasarafan",
                "points" => 10,
                "pembahasan" => "Pasien mengalami konstipasi, ini dapat disebabkan oleh tirah baring yang lama karena ketidakmampuan pasien untuk melakukan aktivitas. Penyebab lain adalah faktor umur yang menyebabkan fungsi peristaltic usus pasien yang menurun serta mengkonsumsi makanan yang rendah lemak. Penanganan yang tepat pada kasus ini adalah melakukan abdominal massage. Tindakan ini dapat meningkatkan rasa nyaman pasien dan mampu merangsang peristaltic usus sehingga dapat merangsang keinginan untuk BAB."
            ],
            // 14
            [
                "question" => "14. Pasien Tn. B berusia 30 tahun dirawat di ruang bedah saraf akibat cedera pada spinal. Saat ini kesadaran composmentis, pasien mengalami plegia pada kedua ekstremitas bawah. Pasien tidak dapat mengontrol BAK. Apa tindakan prioritas untuk mencegah timbulnya komplikasi pada pasien tersebut?",

                "options" => ["Memasang kateter urine ", "Menjaga kebersihan tempat tidur", "Melakukan fisioterapi dada dan latihan pada kedua kaki", "Memiringkan kiri/kanan dan massase punggung tiap 2 jam", "Memasang penghalang tempat tidur dan menempatkan bel dekat pasien"],
                "correct_option" => 0,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Kondisi pasien yang tidak bisa mengontrol BAK sebaiknya segera dipasang kateter agar urine tidak membasahi pakaian dan tempat tidur pasien karena hal ini akan mengganggu kebersihan dan kenyamanan pasien."
            ],
            // 15
            [
                "question" => "Seorang laki - laki berusia 48 tahun, dibawa ke IGD dengan keadaan kondisi tidak sadarkan diri, suara nafas terdengar snoring. Frekuensi pernafasan 22 x/menit, tekanan darah 135 x/menit, nadi 89 x/menit, suhu 37 0C. Pertanyaan soal Posisi apakah yang tepat untuk pasien tersebut?",

                "options" => ["SIM", "Chin lift ", "Supinasi", "Head tilt", "Jaw thrust"],

                "correct_option" => 3,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Posisi Sim adalah posisi setengah telungkup dengan salah satu kaki ditekuk ke arah depan dan satunya lagi lurus. Tujuan pemberian posisi sims adalah memfasilitasi drainase dari mulut pada klien tidak sadar. Posisi supinasi/terlentang adalah posisi klien berbaring telentang dengan kepala dan bahu sedikit elevasi dengan menggunakan bantal. Posisi supinasi diberikan pada pasien pascaoperasi spinal. Head tilt-chin lift maneuver. Posisikan dimana telapak tangan berada pada dahi sambil mendorong dahi ke belakang, pada waktu bersamaan ujung jari tangan yang lain mengangkat dagu. Ibu jari dan telunjuk harus bebas agar dapat digunakan menutup hidung, jika perlu memberikan jalan nafas, biasanya dilakukan untuk mengetahui jalan nafas pasien yang mengalami sumbatan jalan nafas."
            ],
            // 16
            [
                "question" => "Laki-laki, 40 tahun, datang keRS dengan keluhan tidak mampu berbicara, sulit megeluarkan kata-kata. Anggota gerak sebelah kanan lebih lemah. memiliki riwayat hipertensi, Tanda vital RR : 20x/menit, Tekanan Darah 160/90 mmHg, denyut Frekuensi Nadi 90 x/menit, Suhu 36,6. kekuatan otot 1111/5555 (ekstremitas atas) 1111/5555 (ekstremitas bawah kesadaran somnolen GCS : E4M6Vafasia. Apakah masalah keperawatan utama dari kasus tersebut?",
                "options" => ["Nyeri akut", "Risiko jatuh", "Gangguan mobilitas fisik", "Kerusakan komunikasi verbal", "Ketidak efektifan perfusi jaringan serebral"],

                "correct_option" => 4,
                "category" => "pensarafan",
                "points" => 10,
                "pembahasan" => "Tekanan Darah 160/90 mmhg, Mengalami kelemahan pada Ektremitas sebelah kanan Pembahasan: Sesuai kasus pasien mengalami Tekanan Darah meningkat, mengalami gangguan bicara, mengalami kelemahan pada ekstremitas sebelah kanan dan kesadaran samnolen hal ini di sebabkan karena tidak efektifnya perfusi jaringan serebral."
            ],
            // 17
            [
                "question" => "Perempuan, 50 tahun, dirawat dibangsal penyakit dalam akibat mengalami penurunan kesadaran. Pada saat pemeriksaan fisik, perawat meminta pasien untuk membuka mata dengan meyentuh bahu pasien. Pasien tidak memberikan respon. Apakah yang harus dilakukan perawat selanjutnya untuk mengetahui respon membuka mata pasien?",

                "options" => ["Memberikan rangsang nyeri", "Menganti urutan pemeriksaan", "Menganjurkan pasien membuka mata", "Meminta pasien untuk membuka mata", "Memerintahkan mengangkat ekstremitas atas/bawah"],

                "correct_option" => 0,
                "category" => "pensarafan",
                "points" => 10,

                "pembahasan" => "Memberikan rangsang nyeri Kata kunci: Tingkat kesadaran Pembahasan: Pemeriksaan GCS meliputi pemeriksaan Eyes, Verbal dan Motorik. Pemeriksaan Eyes dilakukan dengan perintah untuk mebuka mata dan sentuhan jika tidak berespon terhadap suara maka diberikan rangsangan nyeri."
            ],
            // 18
            [
                "question" => "Seorang laki- laki, 50 tahun, dirawat di RS dengan diagnosis medis stroke non hemoragik. Pasien mengalami penurunan kesadaran. Hasil Pemeriksaan: GCS diperoleh data: respon membuka mata dengan rangsangan nyeri, respon verbal pasien bingung disorientasi waktu, tempat dan orang, refleks motorik dengan rangsangan nyeri fleksi abnormal. Berapakah nilai GCS untuk pasien tersebut?",

                "options" => ["7", "8", "9", "10", "11"],
                "correct_option" => 2,
                "category" => "pensarafan",
                "points" => 10,

                "pembahasan" => "Penilaian GCS: 1. Respon membuka mata dengan rangsangan nyeri (2), 2. Respon verbal pasien bingung disorientasi waktu, tempat, dan orang (4), 3. Refleks motorik dengan rangsangan nyeri fleksi abnormal (3). Nilai total = E+V+M = 2+4+3 = 9."
            ],
            // 19
            [
                "question" => "Perempuan, 58 tahun, dirawat di bangsal penyakit saraf dengan diagnosis stroke. Hasil Pemeriksaan: ditemukan pasien mengalami hemiplegi pada tubuh sebelah kiri, tonus dan kekuatan otot ekstremitas atas dan bawah sebelah kiri 2. Apakah intervensi keperawatan untuk pasien tersebut?",

                "options" => ["Melatih pasien untuk alih posisi", "Melatih pasien untuk ROM aktif", "Melatih pasien untuk ROM pasif", "Mengatur posisi pasien dengan kepala ditinggikan", "Memasang bantalan pasir untuk mencegah fleksi plantar"],

                "correct_option" => 2,
                "category" => "rehabilitasi",
                "points" => 10,
                "pembahasan" => "Hemiplegi adalah kelumpuhan anggota gerak karena stroke, latihan fisik dan fisioterapi untuk membantu mengatasi hemiplegia. Latihan ROM pasif membantu otot tetap bergerak dan mencegah atrofi."
            ],
            // 20
            [
                "question" => "Laki-laki, 59 tahun, dirawat di RS sejak 1 minggu yang lalu dengan keluhan tubuh bagian kanan sulit digerakkan, pasien hanya berbaring ditempat tidur dan seluruh kebutuhan sehari-hari dibantu oleh keluarga. Inspeksi wajah pasien sedikit miring ke kanan, kelopak mata pasien tampak tidak simetris antara mata kiri dan kanan. Hasil Pemeriksaan: Tekanan Darah 140/80 mmHg, Frekuensi Nadi 86x/menit, Frekuensi Napas 22x/menit, Suhu 37,3°C. Pasien berisiko mengalami luka tekan. Apakah tindakan keperawatan yang tepat pada kasus tersebut?",

                "options" => ["Mobilisasi miring kanan-miring kiri tiap 2 jam", "Ajarkan latihan rentang gerak aktif dan pasif", "Berikan diet tinggi kalori tinggi protein", "Atur posisi head up 30 derajat", "Lakukan perawatan diri"],

                "correct_option" => 0,
                "category" => "pensaarafan",
                "points" => 10,

                "pembahasan" => "Tubuh bagian kanan sulit digerakkan dan pasien hanya berbaring ditempat tidur Pembahasan: Mobilisasi miring kiri kanan tiap 2 jam bertujuan agar meminimalkan komplikasi utama yang mudah terjadi yaitu dekubitus yang lebih lanjut akibat kurangnya sirkulasi sehingga dapat memeperburuk kondisi pasien."
            ],
            // 21
            [
                "question" => "Laki-laki, 45 tahun, dirawat di RS karena mengalami penurunan kesadaran sejak 1 hari yang lalu. Hasil anamnesis, pasien mengalami kejang disertai mulut berbusa diikuti dengan penurunan kesadaran, muntah proyektil 3x. Hasil Pemeriksaan: kesadaran, pasien buka mata dengan stimulus nyeri, hanya mengeluarkan suara erangan dan terdapat gerakan fleksi abnormal. Bagaimanakah hasil pemerikaan pada kasus tersebut?",

                "options" => ["E2V2M4", "E1V2M3", "E3V1M3", "E2V2M3", "E3V1M4"],
                "correct_option" => 3,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Pemeriksaan Eyes menunjukan gambaran 2 karena membuka mata dengan stimulus nyeri, Verbal pasien bersuara tanpa arti 2 dan terjadi fleksi abnormal pada saat diberikan rangsangan nyeri (3)."
            ],
            // 22
            [
                "question" => "Laki-laki, 45 tahun, dirawat di RS dengan keluhan tangan dan kaki kanan sulit digerakan sejak 5 hari yang lalu. Pasien memiliki riwayat hipertensi dan DM sejak 5 tahun. Hasil Pemeriksaan: terdapat kelumpuhan NVII, NIX, NXII, rentang gerak menurun, Tekanan Darah 140/90 mmHg, Frekuensi Nadi 92 x/menit, Frekuensi Napas 24 x/menit, Suhu 37°C. Pasien mengalami gangguan mobilitas fisik dan memerlukan pengkajian tambahan. Apakah pengkajian yang diperlukan pada kasus tersebut?",
                "options" => ["Sendi kaku", "Fisik lemah", "Kekuatan otot", "Enggan beraktivitas", "Nyeri saat merubah posisi"],
                "correct_option" => 2,
                "category" => "rehabilitasi",
                "points" => 10,
                "pembahasan" => "Gangguan mobilitas fisik yang tergambar dalam kasus membutuhkan data kekuatan otot untuk menegaskan bahwa masalah gangguan mobilitas fisik tersebut aktual."
            ],
            // 23
            [
                "question" => "Perempuan, 35 tahun, dirawat di RS, diagnosis stroke iskemik, mengeluh lemas pada tangan dan kaki sebelah kanan, dan tidak mampu menggerakan tubuhnya. Perawat melakukan pemeriksaan kekuatan otot dan didapatkan hasil pasien tidak mampu mengangkat lengan dan kaki namun masih menggeser. Berapakah nilai kekuatan otot pada kasus tersebut?",
                "options" => ["1", "2", "3", "4", "5"],
                "correct_option" => 1,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Penurunan kekuatan otot merupakan gangguan neurologis yang sering terjadi pada kasus neuro atau saraf. Adanya mekanisme gangguan sentral pada pusat motorik otak menyebabkan saraf kurang mampu berkoordinasi terkait pergerakan ekstremitas."
            ],
            // 24
            [
                "question" => "Perempuan, 56 tahun, dirawat di RS dengan penurunan kesadaran sejak 2 hari yang lalu. Hasil Pemeriksaan: tingkat kesadaran menunjukkan saat diberi rangsang nyeri kedua lengan tampak flexi abnormal, membuka mata dan suara mengerang, pupil anisokor kanan, reflex cahaya lambat. Berapakah nilai GCS pada kasus tersebut?",
                "options" => ["5", "6", "7", "8", "9"],
                "correct_option" => 2,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Gangguan neurologi pada diagnosis stroke atau trauma kepala terjadi akibat kerusakan jaringan otak. Semakin rendah nilai GCS menunjukkan semakin berat kerusakan jaringan otak."
            ],
            // 25
            [
                "question" => "Laki-laki, 56 tahun, masuk IGD dengan keluhan tangan dan kaki kanan terasa lemas sejak 2 hari yang lalu. Hasil Pemeriksaan: klien tampak bingung, pucat, tidak nafsu makan, Tekanan Darah 140/89 mmHg, Frekuensi Nadi 90 x/menit, penilaian kekuatan otot didapatkan extremitas kanan bisa diangkat tetapi langsung terjatuh sedangkan extremitas kiri mampu menahan tahanan ringan. Apakah masalah keperawatan yang utama pada kasus tersebut?",
                "options" => ["Cemas", "Intoleransi aktivitas", "Kurang pengetahuan", "Gangguan mobilitas fisik", "Gangguan pemenuhan kebutuhan nutrisi"],
                "correct_option" => 1,
                "category" => "keperawatan",
                "points" => 10,
                "pembahasan" => "Pada kasus tersebut pasien mengeluhkan tangan dan kaki terasa lemas. Kondisi tersebut menunjukkan adanya penurunan kekuatan otot, sehingga diagnosis yang tepat adalah intoleransi aktivitas."
            ],
            // 26
            [
                "question" => "Laki–laki, 48 tahun, dirawat di RS dengan diagnosis Stroke non Hemoragik. Hasil Pemeriksaan: kelemahan pada ekstremitas kanan, ada sedikit kontraksi tetapi tidak mampu melawan gravitasi, membuka mata jika ada nyeri, jika ditanya hanya menggumam, jika dirangsang nyeri ada gerakan fleksi. Berapa nilai GCS pada kasus tersebut?",
                "options" => ["E4V4M4", "E3V3M4", "E2V3M3", "E2V2M3", "E1V2M3"],
                "correct_option" => 3,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Respon Buka Mata 1: mata tidak bereaksi dan tetap terpejam meski telah diberi rangsangan nyeri. 2: mata terbuka setelah menerima rangsangan. 3: mata terbuka hanya dengan mendengar suara atau dapat mengikuti perintah untuk membuka mata. Respon Verbal 1: tidak mengeluarkan suara sedikit pun meski sudah dipanggil atau diberi rangsangan. Respon Motorik 3: hanya mampu menekuk lengan dan memutar bahu saat diberi rangsangan nyeri."
            ],
            // 27
            [
                "question" => "Laki–laki, 48 tahun, diagnosis Stroke Hemoragik. Hasil Pengkajian: kelemahan pada ekstremitas kanan, ada sedikit kontraksi tetapi tidak mampu melawan gravitasi, membuka mata jika ada nyeri, jika ditanya hanya menggumam, jika dirangsang nyeri ada gerakan fleksi. Apa tingkat kesadaran pada kasus tersebut?",
                "options" => ["Koma", "Apatis", "Delirium", "Somnolen", "Compos mentis"],
                "correct_option" => 2,
                "category" => "neurologi",
                "points" => 10,
                "pembahasan" => "Nilai GCS (11-10): Delirium. Semakin rendah nilai GCS menunjukkan semakin berat kerusakan jaringan otak."
            ],
            // 28
            [
                "question" => "Perempuan, 48 tahun, dirawat di ruang Stroke sudah 2 minggu, mengalami penurunan kesadaran, keluar air liur. Hasil Pemeriksaan: didapatkan kesadaran somnolen, Frekuensi Napas 28 x/menit, Suhu 38°C, tidak mampu mengangkat kaki kanan dan tangan kanan. Apakah data prioritas yang harus dikaji lebih lanjut pada kasus tersebut?",
                "options" => ["Capillary refilling", "Reflek menelan", "Kekuatan otot", "Suara napas", "GCS"],
                "correct_option" => 3,
                "category" => "pernapasan",
                "points" => 10,
                "pembahasan" => "Pasien stroke yang mengalami penurunan kesadaran berisiko stasis pulmoner akibat infeksi saluran napas, sehingga pentingnya dikaji suara napas."
            ],
            // 29
            [
                "question" => "Laki-laki, 60 tahun, dirawat di ruang penyakit dalam dengan cedera kepala. Pasien mengalami penurunan kesadaran GCS E1V2M2. Hasil Pemeriksaan: Tekanan Darah 130/80 mmHg, Frekuensi Napas 20x/menit, Frekuensi Nadi 73 x/menit. Pasien mendapatkan terapi brainact dengan dosis 1x125 mg IV. Sediaan Brainact 500 mg dalam 4 ml. Berapakah ml brainact yang diberikan kepada pasien?",
                "options" => ["0,5 ml", "1 ml", "1,5 ml", "2 ml", "2,5 ml"],
                "correct_option" => 3,
                "category" => "farmakologi",
                "points" => 10,
                "pembahasan" => "Jumlah obat yang diberikan = (dosis order/dosis tersedia) x sediaan. Dengan perhitungan: (125/500) x 4 = 0,25 x 4 = 1 ml."
            ],
            // 30
            [
                "question" => "Laki-laki, 58 tahun, dirawat di RS dengan stroke non hemoragik sejak 4 hari yang lalu. Hasil Pemeriksaan: menunjukkan kesadaran sopor, Tekanan Darah 130/80 mmHg, Frekuensi Nadi 76x/menit, Frekuensi Napas 12x/menit, Suhu 36,7°C. Saat ini pasien terpasang oksigen masker 8 lt/menit, saturasi oksigen 93%. Perawat curiga terapi oksigen tidak maksimal dan harus melakukan pemeriksaan penunjang. Apakah pemeriksaan penunjang yang tepat pada kasus tersebut?",
                "options" => ["GCS", "EKG", "AGD", "EEG", "CT Scan"],
                "correct_option" => 2,
                "category" => "diagnostik",
                "points" => 10,
                "pembahasan" => "Ketika pasien sudah diberikan terapi oksigen masker, kemudian hasil saturasi oksigen tidak maksimal, perlu dicek dengan AGD untuk menilai gangguan pernapasan atau metabolik."
            ]
        ];

        foreach ($data as $question) {
            Quiz::create($question);
        }
    }
}
