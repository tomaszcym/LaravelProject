<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use App\Model\Offer;
use App\Model\Page;
use App\Model\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class OfferController extends Controller
{

    public function Index() {
        $items = DB::table('offer')
            ->select('*')
            ->leftJoin('seo', 'seo.id_seo', '=', 'offer.id_seo')
            ->get();
        return view('administrator.offer.index', ['items' => $items]);
    }


    public function Edit($id_offer = 0) {

        if(request()->method() == 'POST') {

            $form_post = request()->all();

            $offer_rules = [
                'offer_title' => ['required', 'max:255'],
                'offer_lead' => ['max:255'],
                'offer_price' => ['max:255'],
                'offer_external_url' => ['max:255'],
            ];

            $offer = Offer::find($id_offer);
            $seo_rules = [
                'url' => ['required', 'max:255', Rule::unique('seo')->ignore($offer ? $offer->seo->id_seo : 0, 'id_seo')],
                'seo_title' => 'required|max:255',
                'seo_description' => 'max:255',
                'seo_tags' => 'max:255',
            ];

            Validator::make(request()->all(), array_merge($offer_rules, $seo_rules))->validate();


            DB::transaction(function() use ($id_offer, $form_post){
                if($id_offer != 0) {
                    $offer = Offer::find($id_offer);
                    $seo = $offer->seo;

                    $offer->fill($form_post);
                    $seo->fill($form_post);

                    if(isset($form_post['offer_status']))
                        $offer->offer_status = 1;
                    else
                        $offer->offer_status = 0;

                    $offer->save();
                    $seo->save();

                    request()->session()->flash('status', 'Oferta została zaktualizowana!');
                    request()->session()->flash('alert-class', 'success');
                } else {
                    $seo = new Seo($form_post);
                    $offer = new Offer($form_post);

                    if(isset($form_post['offer_status']))
                        $offer->offer_status = 1;
                    else
                        $offer->offer_status = 0;

                    $seo->save();
                    $offer->id_seo = $seo->id_seo;
                    $offer->save();

                    $gallery = new Gallery;
                    $gallery->source_table = 'offer';
                    $gallery->source_id = $offer->id_offer;
                    $gallery->gallery_name = 'gallery1';
                    $gallery->save();

                    request()->session()->flash('status', 'Oferta została dodana!');
                    request()->session()->flash('alert-class', 'success');
                }
            });

            return redirect(route('administrator.offer.index'));
        }
        else {

            $item = null;
            $seo = null;

            if($id_offer != 0) {
                $item = Offer::find($id_offer);
                $seo = $item->seo;
            }

            return view('administrator.offer.edit', [
                'item' => $item,
                'seo' => $seo
            ]);
        }
    }


    function Delete($id_offer) {
        DB::transaction(function () use ($id_offer) {
            $offer = Offer::find($id_offer);
            $offer->seo->delete();
            $offer->delete();
        });

        return redirect(route('administrator.offer.index'));
    }
}
