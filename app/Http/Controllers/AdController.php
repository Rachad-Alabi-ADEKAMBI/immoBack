<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $ad = new Ad();

        $ad->name = $request->input('name');
        $ad->price = $request->input('price');
        $ad->description = $request->input('description');
        $ad->rooms = $request->input('rooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->kitchens = $request->input('kitchens');
        $ad->parkings = $request->input('parkings');
        $ad->living_rooms = $request->input('living_rooms');
        $ad->warehouses = $request->input('warehouses');
        $ad->location = $request->input('location');

        $ad->area = $request->input('area');
        $ad->size = $request->input('size');
        $ad->offices = $request->input('offices');
        $ad->action = $request->input('action');
        $ad->category = $request->input('category');
        $ad->seller_id = auth()->id();

        $ad->status = 'Disponible';
        $ad->views = 0;
        $ad->shares = 0;

        $pic1 = $request->file('pic1');
        if ($pic1) {
            $imagename = time() . '.' . $pic1->getClientOriginalExtension();
            $pic1->move(public_path('img/ads'), $imagename);
            $ad->pic1 = $imagename;
        }

        for ($i = 2; $i < 8; $i++) {
            $pic = 'pic' . $i;
            $file = $request->file($pic);

            if ($file) {
                $imagename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/ads'), $imagename);
                $ad->$pic = $imagename;
            }
        }

        $ad->save();

        return redirect('/dashboard')->with(
            'success',
            'Nouvelle annonce publiée !!!'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function editAd($id, Request $request)
    {
        $ad = Ad::find($id);

        $ad->name = $request->input('name');
        $ad->price = $request->input('price');
        $ad->description = $request->input('description');
        $ad->rooms = $request->input('rooms');
        $ad->bathrooms = $request->input('bathrooms');
        $ad->kitchens = $request->input('kitchens');
        $ad->parkings = $request->input('parkings');
        $ad->living_rooms = $request->input('living_rooms');
        $ad->warehouses = $request->input('warehouses');
        $ad->location = $request->input('location');

        $ad->area = $request->input('area');
        $ad->size = $request->input('size');
        $ad->offices = $request->input('offices');
        $ad->action = $request->input('action');
        $ad->category = $request->input('category');
        $ad->seller_id = auth()->id();

        $ad->status = 'Disponible';
        $ad->views = 0;
        $ad->shares = 0;

        $pic1 = $request->file('pic1');
        if ($pic1) {
            $imagename = time() . '.' . $pic1->getClientOriginalExtension();
            $pic1->move(public_path('img/ads'), $imagename);
            $ad->pic1 = $imagename;
        }

        for ($i = 2; $i < 8; $i++) {
            $pic = 'pic' . $i;
            $file = $request->file($pic);

            if ($file) {
                $imagename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/ads'), $imagename);
                $ad->$pic = $imagename;
            }
        }

        $ad->save();

        return redirect('/dashboard')->with('success', 'Annonce modifiée !!!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adView($id)
    {
        return view('pages/front/ad');
    }

    public function newAdView()
    {
        return view('pages/back/users/newAd');
    }

    public function allAds()
    {
        return view('pages/back/admin/allAds');
    }

    public function allAdsApi()
    {
        $data = Ad::orderByDesc('id')->get();

        return response()->json($data);
    }

    public function availableAdsApi()
    {
        $data = Ad::where('status', 'Disponible')
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function adApi($id)
    {
        $data = Ad::find($id);

        return response()->json($data);
    }

    public function myAdsApi()
    {
        $userId = auth()->id();
        $data = Ad::where('seller_id', $userId)
            ->orderByDesc('id')
            ->get();

        return response()->json($data);
    }

    public function editAdView($id)
    {
        $data = Ad::find($id);

        return view('pages/back/users/edit', compact('data'));
    }

    public function deleteAdView($id)
    {
        $data = Ad::find($id);

        return view('pages/back/delete', compact('data'));
    }

    public function deleteAd($id)
    {
        $data = Ad::find($id);

        $data->delete();

        return redirect('/dashboard')->with('success', 'Annonce supprimée !!!');
    }

    public function adsView()
    {
        return view('pages/front/ads');
    }

    public function myAds()
    {
        return view('pages/back/users/myAds');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        //
    }
}