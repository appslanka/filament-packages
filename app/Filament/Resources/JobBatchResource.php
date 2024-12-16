<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobBatchResource\Pages;
use App\Filament\Resources\JobBatchResource\RelationManagers;
use App\Models\JobBatch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobBatchResource extends Resource
{
    protected static ?string $model = JobBatch::class;
    protected static ?string $navigationGroup = 'Job watcher';
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('total_jobs')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('pending_jobs')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('failed_jobs')
                    ->required()
                    ->numeric(),

                Forms\Components\Textarea::make('failed_job_ids')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('options')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('cancelled_at')
                    ->datetime(),

                Forms\Components\TextInput::make('finished_at')
                    ->date(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_jobs')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pending_jobs')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('failed_jobs')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cancelled_at')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('finished_at')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageJobBatches::route('/'),
        ];
    }
}
