<?php

namespace App\Http\Controllers;

use App\ByElectionCandidate;
use App\ElectionCandidate;
use App\ElectionRetiringMP;
use App\Electorate;
use App\FederalElection;
use App\FederalElectionParty;
use Illuminate\Http\Request;
use App\ByElection;

class ElectionsController extends Controller
{
    public function index()
    {
        $byelections = ByElection::all()->sortByDesc('polling_day');
        $fedelections = FederalElection::all()->sortByDesc('polling_day');
        return view('elections.index', compact('byelections', 'fedelections'));
    }

    public function byElectionIndex($slug)
    {
        $election = ByElection::where('slug', $slug)->firstOrFail();
        $candidates = ByElectionCandidate::where('by_election_id', $election->id)->get();
        $sortedCandidates = ByElectionCandidate::where('by_election_id', $election->id)->get()->sortByDesc('first_preference_votes');
        $winning = ByElectionCandidate::whereId($election->winning_candidate)->firstOrFail();
        $tppcandidates = ByElectionCandidate::where('by_election_id', $election->id)->where('total_votes', '!=', 0)->get();
        return view('elections.byelection.index', compact('election', 'sortedCandidates', 'candidates', 'tppcandidates', 'winning'));
    }

    public function federalElectionIndex($slug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        return view('elections.federal.index', compact('election'));
    }

    public function federalElectionPartyBars($slug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        $parties = FederalElectionParty::all();
        return view('elections.federal.partybars', compact('election'));
    }

    public function retiringmps($slug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        $mps = ElectionRetiringMP::all();
        return view('elections.federal.retiringmps', compact('election', 'mps'));
    }

    public function electoratesIndex($slug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        $electorates = Electorate::where('election_id', $election->id)->get();
        return view('elections.federal.electorates', compact('election', 'electorates'));
    }

    public function candidatesIndex($slug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        $candidates = ElectionCandidate::all()->sortByDesc('full_name');
        $candidatesList = [];
        foreach ($candidates as $c){
            $e = Electorate::whereId($c->electorate_id)->firstOrFail();
            if ($e->election_id == $election->id) {
                array_push($candidatesList, $c);
            }
        }
        return view('elections.federal.candidates', compact('election', 'candidatesList'));
    }

    public function electorate($slug, $eslug)
    {
        $election = FederalElection::where('slug', $slug)->firstOrFail();
        $electorate = Electorate::where('slug', $eslug)->firstOrFail();
        return view('elections.federal.electorate', compact('election', 'electorate'));
    }
}
