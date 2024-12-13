<?php

namespace App\Filament\Resources\JobBatchResource\Pages;

use App\Filament\Resources\JobBatchResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJobBatches extends ManageRecords
{
    protected static string $resource = JobBatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
