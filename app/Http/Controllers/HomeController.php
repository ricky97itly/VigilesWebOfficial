<?php

namespace App\Http\Controllers;

use Mapper;
use App\Report;
use Spatie\Geocoder\Geocoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // Da qui si crea geoJSON con array al cui interno ci sono lat e long
      // Mapper::map è per mappa, inserite coordinate di Milano con zoom e mappa che si apre al centro senza marker di default
      Mapper::map(45.4641013, 9.1897378, ['zoom' => 13, 'center' => true, 'marker' => false, 'overlay' => 'TRAFFIC'])->polygon([
                              [
                                'longitude' => 9.193582534790039,
                                'latitude' => 45.47957256610844
                              ],
                              [
                                'longitude' => 9.191694259643555,
                                'latitude' => 45.47978320042915
                              ],
                              [
                                'longitude' => 9.186244010925293,
                                'latitude' => 45.48059563971866
                              ],
                              [
                                'longitude' => 9.182209968566895,
                                'latitude' => 45.48128770839176
                              ],
                              [
                                'longitude' => 9.180965423583984,
                                'latitude' => 45.47770691346595
                              ],
                              [
                                'longitude' => 9.180665016174315,
                                'latitude' => 45.477676821788094
                              ],
                              [
                                'longitude' => 9.178948402404785,
                                'latitude' => 45.47743608778676
                              ],
                              [
                                'longitude' => 9.17757511138916,
                                'latitude' => 45.47710507685561
                              ],
                              [
                                'longitude' => 9.176416397094727,
                                'latitude' => 45.4766236029392
                              ],
                              [
                                'longitude' => 9.174935817718506,
                                'latitude' => 45.477405995964276
                              ],
                              [
                                'longitude' => 9.174377918243408,
                                'latitude' => 45.477842325817434
                              ],
                              [
                                'longitude' => 9.173691272735596,
                                'latitude' => 45.47822599237942
                              ],
                              [
                                'longitude' => 9.172993898391724,
                                'latitude' => 45.47847424582163
                              ],
                              [
                                'longitude' => 9.172307252883911,
                                'latitude' => 45.4785645195294
                              ],
                              [
                                'longitude' => 9.171652793884277,
                                'latitude' => 45.47860965632908
                              ],
                              [
                                'longitude' => 9.171191453933716,
                                'latitude' => 45.478504337073616
                              ],
                              [
                                'longitude' => 9.170612096786499,
                                'latitude' => 45.47845167737207
                              ],
                              [
                                'longitude' => 9.170064926147461,
                                'latitude' => 45.47824856091938
                              ],
                              [
                                'longitude' => 9.16958212852478,
                                'latitude' => 45.47793260053764
                              ],
                              [
                                'longitude' => 9.169045686721802,
                                'latitude' => 45.47765425301916
                              ],
                              [
                                'longitude' => 9.168680906295776,
                                'latitude' => 45.47724049065338
                              ],
                              [
                                'longitude' => 9.168434143066406,
                                'latitude' => 45.47669131045729
                              ],
                              [
                                'longitude' => 9.168305397033691,
                                'latitude' => 45.47623240235297
                              ],
                              [
                                'longitude' => 9.168434143066406,
                                'latitude' => 45.475359714335575
                              ],
                              [
                                'longitude' => 9.171180725097656,
                                'latitude' => 45.4730726057573
                              ],
                              [
                                'longitude' => 9.172725677490234,
                                'latitude' => 45.471628068304874
                              ],
                              [
                                'longitude' => 9.17083740234375,
                                'latitude' => 45.47054464091783
                              ],
                              [
                                'longitude' => 9.166803359985352,
                                'latitude' => 45.467896175183114
                              ],
                              [
                                'longitude' => 9.166116714477539,
                                'latitude' => 45.467474816887716
                              ],
                              [
                                'longitude' => 9.164915084838867,
                                'latitude' => 45.46296006606231
                              ],
                              [
                                'longitude' => 9.164314270019531,
                                'latitude' => 45.46229787220348
                              ],
                              [
                                'longitude' => 9.164314270019531,
                                'latitude' => 45.46139486804323
                              ],
                              [
                                'longitude' => 9.173498153686523,
                                'latitude' => 45.455916332781364
                              ],
                              [
                                'longitude' => 9.174184799194336,
                                'latitude' => 45.455374470697514
                              ],
                              [
                                'longitude' => 9.177274703979492,
                                'latitude' => 45.45302634150112
                              ],
                              [
                                'longitude' => 9.180107116699219,
                                'latitude' => 45.45308655116337
                              ],
                              [
                                'longitude' => 9.180879592895508,
                                'latitude' => 45.452905921983756
                              ],
                              [
                                'longitude' => 9.18680191040039,
                                'latitude' => 45.452484451648175
                              ],
                              [
                                'longitude' => 9.18954849243164,
                                'latitude' => 45.452062978162836
                              ],
                              [
                                'longitude' => 9.190835952758789,
                                'latitude' => 45.45200276740782
                              ],
                              [
                                'longitude' => 9.200706481933594,
                                'latitude' => 45.45188234570493
                              ],
                              [
                                'longitude' => 9.201478958129883,
                                'latitude' => 45.45230382054015
                              ],
                              [
                                'longitude' => 9.204053878784178,
                                'latitude' => 45.456819424684014
                              ],
                              [
                                'longitude' => 9.204826354980469,
                                'latitude' => 45.458143933312506
                              ],
                              [
                                'longitude' => 9.206714630126953,
                                'latitude' => 45.46085305860481
                              ],
                              [
                                'longitude' => 9.206628799438477,
                                'latitude' => 45.46157547003231
                              ],
                              [
                                'longitude' => 9.205255508422852,
                                'latitude' => 45.472109584902924
                              ],
                              [
                                'longitude' => 9.205513000488281,
                                'latitude' => 45.473855048084765
                              ],
                              [
                                'longitude' => 9.193582534790039,
                                'latitude' => 45.47957256610844
                              ]
                              // Riempimento zona geoJSON
                          ],['strokeColor' => '#FF4C4C', 'strokeOpacity' => 0.1, 'strokeWeight' => 2, 'fillColor' => '#FF4C4C']);

      // Aggiunta marker che vanno sulla home
      $this->addMarkers();

      return view('home');
    }

   // Funzione per aggiunta marker
    public function addMarkers() {
      // Si richiama reports che prende segnalazioni pending
      $reports = DB::table('reports')->select('*')->where('code_id', '!=', '1')->get();

      // per aggiungere marker
      foreach ($reports as $report) {
        // si prendono lat e long
        $latlng = $this->getLatLng($report);

        // Suddivisione codici, si parte da 2 perché 1 è pending
        if($report->code_id == 2) {
          Mapper::informationWindow($latlng["lat"], $latlng["lng"], '
            <h5>'.$report->title.'<i class="ml-2 fas text-success fa-dot-circle"></i></h5>
            <h6 class="text-muted">'.$report->address.', '.$report->street_number.'</h6>
            <img class="img-infowin img-thumbnail" src='.$report->media.' alt="immagine della segnalazione">
            <p class="mt-4"><a class="link-red" href="/reports/'.$report->id.'"> Vai al dettaglio <i class="fas fa-chevron-circle-right"></i></a></p>');
        }
        else if($report->code_id == 3) {
          Mapper::informationWindow($latlng["lat"], $latlng["lng"], '
            <h5>'.$report->title.'<i class="ml-2 fas text-warning fa-dot-circle"></i></h5>
            <h6 class="text-muted">'.$report->address.', '.$report->street_number.'</h6>
            <img class="img-infowin img-thumbnail" src='.$report->media.' alt="immagine della segnalazione">
            <p class="mt-4"><a class="link-red" href="/reports/'.$report->id.'"> Vai al dettaglio <i class="fas fa-chevron-circle-right"></i></a></p>');
        }
        else if($report->code_id == 4) {
          Mapper::informationWindow($latlng["lat"], $latlng["lng"], '
            <h5>'.$report->title.'<i class="ml-2 fas text-danger fa-dot-circle"></i></h5>
            <h6 class="text-muted">'.$report->address.', '.$report->street_number.'</h6>
            <img class="img-infowin img-thumbnail" src='.$report->media.' alt="immagine della segnalazione">
            <p class="mt-4"><a class="link-red" href="/reports/'.$report->id.'"> Vai al dettaglio <i class="fas fa-chevron-circle-right"></i></a></p>');
        }
      }
    }

    // Per andare al marker
    public function goToMarker($report_id) {
      // findOrFail è come find, ma ha funzione in più di mostrare schermata report non trovato se non trova nessun report id, non mandando così l'app in crash
      $report = Report::findOrFail($report_id);
      $latlng = $this->getLatLng($report);
      Mapper::map($latlng["lat"], $latlng["lng"], ['zoom' => 18, 'center' => true, 'marker' => false, 'overlay' => 'TRAFFIC']);

      $this->addMarkers();

      return view ('home');
    }
    // Per convertire lat e long in indirizzo usando geocoder
    public function getLatLng($report) {
      $client = new \GuzzleHttp\Client();
      $geocoder = new Geocoder($client);
      $geocoder->setApiKey(config('geocoder.key'));

      // Città è solo MIlano
      $fullAddress = $report->address.", ".$report->street_number.", Milano";
      // Prende coordinate da lat e long
      $latlng = $geocoder->getCoordinatesForAddress($fullAddress);
      return $latlng;
    }
}
