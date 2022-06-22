<?php

namespace App\Controller;

use Ghibli\Controller;
use App\Model\Manager\FilmManager;

class AppController extends Controller {

    public function home(): void {
        
        $filmManager = new FilmManager();
        $films = $filmManager->findAll();
        $this->renderView('app/home.php', [
            'title' => 'Le monde de Ghibli',
            'image' => 'Banniere',
            'contenu' => 'Intro'
        ]);
    }

    public function musee(): void {
        
        $this->renderView('app/musee.php', [
            'title' => 'Musée Ghibli',
            'image' => 'Batiment',
            'content' => 'Description',
            
            ]);
    }
    
    public function expo_ephemere(): void { 
        
        $this->renderView('musee/expo_ephemere.php', [
            'title' => 'Exposition ephemere',
            'image' => 'Expo',
            'content' => 'Description',
            
            ]);
    }
    
    public function visite(): void { 
        
        $this->renderView('musee/visite.php', [
            'title' => 'Les visite',
            'content' => 'Description',
            'tableau' => 'horaire'
             
            ]);
    }
    
    public function y_aller(): void { 
        $this->renderView('musee/y_aller.php', [
            'title' => 'Exposition ephemere',
            'image' => 'Expo',
            'content' => 'Description',
            
            ]);
    }
    
    public function studio(): void { 
        
        $this->renderView('app/studio.php', [
            'title' => 'Contact',
            'image' => 'Batiment',
            'content' => 'Description'
            
            ]);
    }
    
    public function historique(): void { 
        
        $this->renderView('studio/historique.php', [
            'title' => 'L historique',
            'content' => 'Description',
             
            ]);
    }
    
    public function park(): void { 
        
        $this->renderView('studio/park.php', [
            'title' => 'Parc',
            'image' => 'extérieur',
            'content' => 'Description',
            'plan' => 'googlemap'
             
            ]);
    }
    
    public function visite_parc(): void { 
        
        $this->renderView('studio/visite_parc.php', [
            'title' => 'La visite du parc',
            'content' => 'Description',
            'image' => 'Differents lieux'
             
            ]);
    }
    
    public function contact(): void { 
        
        $this->renderView('app/contact.php', [
            'title' => 'Contact',
            'content' => 'Formulaire'
            
            ]);
    }
}

