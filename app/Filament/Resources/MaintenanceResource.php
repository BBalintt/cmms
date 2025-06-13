<?php

namespace App\Filament\Resources;

use FilamentTiptapEditor\TiptapEditor;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\MaintenanceResource\Pages;
use App\Filament\Resources\MaintenanceResource\RelationManagers;
use App\Models\Maintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        return $form->schema([
            Forms\Components\Select::make('device_id')
                ->label('Berendezés')
                ->relationship('device', 'name')
                ->required(),

            TiptapEditor::make('description')
                ->label('Leírás')
                ->profile('default') // vagy 'simple', ha egyszerűbb kell
                ->required(),

            Forms\Components\DateTimePicker::make('scheduled_at')
                ->label('Tervezett időpont'),

            Forms\Components\Toggle::make('completed')
                ->label('Elvégezve')
                ->default(false),

            Forms\Components\FileUpload::make('attachments')
                ->label('Mellékletek')
                ->multiple()
                ->preserveFilenames()
                ->downloadable()
                ->openable()
                ->directory('maintenances')
                ->reorderable()
                ->columnSpanFull(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('device.name')->label('Berendezés'),
            Tables\Columns\TextColumn::make('description')->label('Leírás')->limit(50),
            Tables\Columns\TextColumn::make('scheduled_at')->label('Tervezett idő')->dateTime(),
            Tables\Columns\IconColumn::make('completed')->label('Elvégezve')->boolean(),
            Tables\Columns\TextColumn::make('created_at')->label('Létrehozva')->dateTime(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
            Tables\Actions\DeleteBulkAction::make(),
            ExportBulkAction::make(),
            ])
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
            'view' => Pages\ViewMaintenance::route('/{record}'),
        ];
    }
}
