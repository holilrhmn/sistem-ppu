<?php

namespace App\Imports;

use App\Perusahaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerusahaanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Perusahaan([
            'nib' => $row['nib'],
            'name' => $row['name'],
            'address' => $row['address'],
            'nama_pendaftar' => $row['nama_pendaftar'],
            'telepon_pendaftar' => $row['telepon_pendaftar'],
            'email_pendaftar' => $row['email_pendaftar'],
            'nik' => $row['nik'],
            'propinsi' => $row['propinsi'],
            'kab_kota' => $row['kab_kota'],
            'kecamatan' => $row['kecamatan'],
            'kelurahan' => $row['kelurahan'],
            'jumlah_tki_l' => $row['jumlah_tki_l'],
            'jumlah_tki_p' => $row['jumlah_tki_p'],
            'kbli' => $row['kbli'],
            'bangunan' => $row['bangunan'],
            'mesin_peralatan' => $row['mesin_peralatan'],
            'peralatan_impor' => $row['peralatan_impor'],
            'pembelian_dan_pematangan_tanah' => $row['pembelian_dan_pematangan_tanah'],
            'investasi_lain_lain' => $row['investasi_lain_lain'],
            'pembelian_pematangan_lain_lain' => $row['pembelian_pematangan_lain_lain'],
            'modal_kerja_3_bulanan' => $row['modal_kerja_3_bulanan'],
            'jumlah_investasisin_p' => $row['jumlah_investasisin_p'],
            'tanggal_pengajuan_pemohonan_berusaha' => $row['tanggal_pengajuan_pemohonan_berusaha'],
            'tanggal_terbit_oss' => $row['tanggal_terbit_oss'],
            'jenis_perseroan' => $row['jenis_perseroan'],
            'status_penanaman_modal' => $row['status_penanaman_modal'],
            'nama_pemegang_saham' => $row['nama_pemegang_saham'],
            'total_modal' => $row['total_modal'],
            'jabatan' => $row['jabatan'],
            'negara_asal' => $row['negara_asal'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'gambar' => $row['gambar'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude']
        ]);
    }
}
