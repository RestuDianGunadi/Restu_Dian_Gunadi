Referensi : https://www.codepolitan.com/rest-api-server-sederhana-dengan-codeigniter-58901f324a29f

Cara penggunaan

1. Hubungkan dangan localhost, gunakan webserver seperti xampp, wampp, atau webserver lainnya

2. Download dan install CodeIgniter dan library REST server link = https://github.com/ardisaurus/ci-restserver . Lalu ekstrak dan masukkan ke dalam htdocs.

3. Cek apakah installasi berhasil menggunakan link ini = http://127.0.0.1/nama_folder/index.php/rest_server 

4. Buat database beserta isinya

    contoh database bernama kontak

    CREATE DATABASE kontak;

    Nama kontak 

        USE kontak;
    CREATE TABLE IF NOT EXISTS `telepon` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama` varchar(50) NOT NULL,
    `nomor` varchar(13) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

    Isi data pada database

        USE kontak;
    INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
    (1, 'Orion', '08576666762'),
    (2, 'Mars', '08576666770'),
    (7, 'Alpha', '08576666765');

5. Buka database.php dan ubah menjadi
            <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        $active_group = 'default';
        $query_builder = TRUE;

        $db['default'] = array(
            'dsn'   => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'kontak',
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );

6. Download dan install aplikasi Postman untuk menguji metode yang sudah disediakan.
link download = https://www.postman.com/downloads/
Apabila tidak ingin download dan install aplikasi postman bisa menggunakan postman google chrome ( hanya bisa digunakan pada browser google chrome ) yang tersedia pada ekstensi google chrome.

7. Beberapa contoh method yang tersedia ( Nama database adalah kontak dengan nama tabel telepon )
 
    a. GET
        Metode GET menyediakan akses baca pada sumber daya yang disediakan oleh REST API. Digunakan untuk membaca data dari suatu tabel pada database.

        <?php

        defined('BASEPATH') OR exit('No direct script access allowed');

        require APPPATH . '/libraries/REST_Controller.php';
        use Restserver\Libraries\REST_Controller;

        class Kontak extends REST_Controller {

            function __construct($config = 'rest') {
                parent::__construct($config);
                $this->load->database();
            }

            //Menampilkan data kontak
            function index_get() {
                $id = $this->get('id');
                if ($id == '') {
                    $kontak = $this->db->get('telepon')->result();
                } else {
                    $this->db->where('id', $id);
                    $kontak = $this->db->get('telepon')->result();
                }
                $this->response($kontak, 200);
            }

            //Masukan function selanjutnya disini
        }
        ?>

        Untuk menguji kode yang telah dibuat buka Postman, Pilih metode GET, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar lalu klik "Send".

    b. POST
        Metode POST digunakan untuk mengirimkan data baru dari client ke server REST API. Sebagai contohnya digunakan untuk menambahkan kontak baru yang terdiri dari id, nama, dan nomor.

                function index_post() {
                    $data = array(
                                'id'           => $this->post('id'),
                                'nama'          => $this->post('nama'),
                                'nomor'    => $this->post('nomor'));
                    $insert = $this->db->insert('telepon', $data);
                    if ($insert) {
                        $this->response($data, 200);
                    } else {
                        $this->response(array('status' => 'fail', 502));
                    }
                }

         Untuk menguji kode yang telah dibuat buka Postman, Pilih metode POST, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik "Body", pilih x-www-form-urlencoded, masukan key dan value yang diperlukan (id, nama, nomor), lalu klik "Send".

    c. PUT
        Metode PUT digunakan untuk memperbarui data yang telah ada di server REST API. Sebagai contohnya digunakan untuk memperbarui data dengan id pada tabel telepon database kontak.

                function index_put() {
                    $id = $this->put('id');
                    $data = array(
                                'id'       => $this->put('id'),
                                'nama'          => $this->put('nama'),
                                'nomor'    => $this->put('nomor'));
                    $this->db->where('id', $id);
                    $update = $this->db->update('telepon', $data);
                    if ($update) {
                        $this->response($data, 200);
                    } else {
                        $this->response(array('status' => 'fail', 502));
                    }
                }
        
        Untuk menguji kode yang telah dibuat buka Postman, Pilih metode PUT, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik body, pilih x-www-form-urlencoded dan ubah sesuai keinginan lalu klik "Send".

    d. DELETE
        Metode DELETE digunakan untuk menghapus data yang telah ada di server REST API. Sebagai contohnya digunakan untuk menghapus data dengan id 88 pada tabel telepon database kontak.

                    function index_delete() {
                    $id = $this->delete('id');
                    $this->db->where('id', $id);
                    $delete = $this->db->delete('telepon');
                    if ($delete) {
                        $this->response(array('status' => 'success'), 201);
                    } else {
                        $this->response(array('status' => 'fail', 502));
                    }
                }

        Untuk menguji kode yang telah dibuat buka Postman, Pilih metode DELETE, masukan http://127.0.0.1/rest_ci/index.php/kontak pada address bar, klik "Body", pilih x-www-form-urlencoded, masukan key id dan value id yang akan dihapus, lalu klik "Send".


