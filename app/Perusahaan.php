<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'outlets';
    protected $keyType = 'string';
    protected $primaryKey = 'nib';
    protected $fillable = [
        'nib', 'name', 'address', 'nama_pendaftar', 'telepon_pendaftar', 'email_pendaftar', 'nik', 'propinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'jumlah_tki_l', 'jumlah_tki_p', 'kbli', 'bangunan', 'mesin_peralatan', 'peralatan_impor', 'pembelian_dan_pematangan_tanah', 'investasi_lain_lain', 'pembelian_pematangan_lain_lain', 'modal_kerja_3_bulanan', 'jumlah_investasisin_p', 'tanggal_pengajuan_pemohonan_berusaha', 'tanggal_terbit_oss', 'jenis_perseroan', 'status_penanaman_modal', 'nama_pemegang_saham', 'total_modal', 'jabatan', 'negara_asal', 'penanggung_jawab', 'gambar', 'latitude', 'longitude', 'creator_id'
    ];


    // public $appends = [
    //     'coordinate', 'map_popup_content',
    // ];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="' . route('outlets.show', $this) . '"';
        $link .= ' title="' . $title . '">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ', ' . $this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    // public function getMapPopupContentAttribute()
    // {
    //     $mapPopupContent = '';
    //     $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.name').':</strong><br>'.$this->address.'</div>';
    //     $mapPopupContent .= '<div class="my-2">yyy<strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

    //     return $mapPopupContent;
    // }


    public function getMapPopupContentAttribute()
    {
        $popupContent = "<table>
                            <tr><td colspan=3><img src=" . asset('images/imagesr.jpeg') . "></td></tr>
                            <tr><td>Nama Perusahaan</td><td>:</td><td>" . $this->name . "</td></tr>
                            <tr><td>NIB</td><td>:</td><td>" . $this->nib . "</td></tr>
                            <tr><td>Alamat Perusahaan</td><td>:</td><td>" . $this->address . "</td></tr>
                            <tr><td>Kode KBLI</td><td>:</td><td>" . $this->kbli . "</td></tr>
                            <tr><td>Kelurahan</td><td>:</td><td>" . $this->kelurahan . "</td></tr>
                            <tr><td>Kecamatan</td><td>:</td><td>" . $this->kecamatan . "</td></tr>
                            <tr><td>No Izin</td><td>:</td><td>" . $this->NOMOR_IZIN . "</td></tr>
                            <tr><td>Tanggal Izin</td><td>:</td><td>" . $this->TANGGAL_IZ . "</td></tr>
                            </tr></table>";

        return $popupContent;
    }
}
