<?php

namespace Appslanka\JobWatcher\Resources\JobBatchResource\Pages;

use Appslanka\JobWatcher\Resources\JobBatchResource;
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
