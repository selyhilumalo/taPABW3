<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        return view('donasi.index', [
            'campaigns' => Campaign::all(),
        ]);
    }

    public function show(int $id)
    {
        $campaign = Campaign::find($id);
        abort_if(is_null($campaign), 404);

        return view('donasi.show', [
            'campaign' => $campaign,
            'donatur'  => Campaign::donatur($id),
        ]);
    }

    public function store(Request $request, int $id)
    {
        abort_if(is_null(Campaign::find($id)), 404);

        $request->validate([
            'nama'    => 'required|string|max:60',
            'nominal' => 'required|integer|min:10000',
            'pesan'   => 'nullable|string|max:200',
        ], [
            'nama.required'    => 'Nama wajib diisi.',
            'nominal.required' => 'Nominal donasi wajib diisi.',
            'nominal.min'      => 'Nominal minimal Rp 10.000.',
        ]);

        return redirect()
            ->route('donasi.show', $id)
            ->with('success', 'Terima kasih, ' . $request->nama . '! Niat donasimu sudah kami catat.');
    }
}
