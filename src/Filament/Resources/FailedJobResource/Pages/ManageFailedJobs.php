<?php

namespace Appslanka\JobWatcher\Filament\Resources\FailedJobResource\Pages;

use Appslanka\JobWatcher\Resources\FailedJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFailedJobs extends ManageRecords
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
