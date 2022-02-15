<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    private $ApplicationUrl;
    private $ApiToken;

    public function __construct($type = 'application') {
        $this->ApplicationUrl = 'https://pterodactyl.softserver.ro/';
        $this->ApiToken = '6N4jEtvmpMF8Le6SSRbfjLu9WM07wBh0b0ziVB8gR8uSFuJw';
    }

    public function getApplicationData($data = '', $type = 'application') {
        $response = Http::withToken($this->ApiToken)->accept('application/json')->get("{$this->ApplicationUrl}api/{$type}/{$data}");
        $responseDecode = json_decode($response->body());
        return $responseDecode;
    }

    public function createAccount($accountData, $data = '', $type = 'application') {
        $response = Http::withToken($this->ApiToken)->accept('application/json')->post("{$this->ApplicationUrl}api/{$type}/{$data}", $accountData);
        $responseDecode = json_decode($response->body());
        return $responseDecode;
    }

    public function getUserServers($id) {
        $servers = $this->getApplicationData('servers');
        $list = array_filter($servers->data, function($element) use($id){
            if($element->attributes->user == $id) {
                return true;
            } else {
                return false;
            }
        });
        return $list;
    }

    public function getServerById($id) {
        $servers = $this->getApplicationData('servers');
        $list = array_filter($servers->data, function($element) use($id){
            if($element->attributes->identifier == $id) {
                return true;
            } else {
                return false;
            }
        });
        return array_shift($list);
    }


    public function getNest($node, $allocation) {
        $servers = $this->getApplicationData("nodes/{$node}/allocations");
        $list = array_filter($servers->data, function($element) use($allocation){
            if($element->attributes->id == $allocation) {
                return true;
            } else {
                return false;
            }
        });
        return array_shift($list);
    }

    public function getEggsByNests($id) {
        $nests = $this->getApplicationData("nests/{$id}/eggs?include=variables");
        return $nests;
    }

    public function view() {
        // $servers = $this->getApplicationData('nodes/1/allocations');
        // return dd($servers);
        return dd($this->getEggsByNests(1)->data[0]);
    }
}
