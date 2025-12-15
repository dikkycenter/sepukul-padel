<?php

namespace App\Filament\Resources\Scores\Pages;

use App\Filament\Resources\Scores\ScoreResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class EditScore extends EditRecord
{
    protected static string $resource = ScoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->hidden(),
        ];
    }
    

    // Update score baru, score lama valid => false
    
    protected function beforeSave() : void
    {
        // validation can update if changed
        $state = $this->form->getState();
        if ((int) $this->record->point === (int) ($state['point'] ?? null)) 
        {
            Notification::make() 
            ->title('Gagal update! Point tidak berubah')
            ->warning()
            ->send();
            
            $this->halt();
        }
        
        $this->record->updateNewScore($this->data);

        Notification::make() 
            ->title('Score updated!')
            ->success()
            ->send();

        $this->redirect($this->getResource()::getUrl('index'));

        $this->halt();
        
    }

    
}
