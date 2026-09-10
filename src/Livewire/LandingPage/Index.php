<?php

namespace Bale\BaleRakaca\Livewire\LandingPage;

use Bale\Umpak\Livewire\UmpakComponent;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Index extends UmpakComponent
{
    #[Layout('bale-rakaca::layouts.app')]
    #[Title('Rakaca — Etalase Layanan TIK')]
    public function render()
    {
        return view('bale-rakaca::livewire.landing-page.index', [
            'heroSection' => $this->section('hero'),
            'serviceSection' => $this->section('service'),
            'contactSection' => $this->section('contact'),
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return $this->redirect('/dashboard');
        }

        return $this->redirect('/login');
    }
}
