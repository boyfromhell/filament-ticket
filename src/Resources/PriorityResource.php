<?php

namespace IchBin\FilamentTicket\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use IchBin\FilamentTicket\Models\Priority;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use IchBin\FilamentTicket\Resources\PriorityResource\Pages;
use IchBin\FilamentTicket\Resources\PriorityResource\RelationManagers;

class PriorityResource extends Resource
{
    protected static ?string $model = Priority::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationGroup(): ?string
    {
        return config("filament-ticket.navigation_group", parent::getNavigationGroup());
    }

    public static function getPluralModelLabel(): string
    {
        return config("filament-tiket.priority_label", parent::getPluralModelLabel()); // TODO: Change the autogenerated stub
    }

    public static function getModelLabel(): string
    {
        return config("filament-tiket.priority_label", parent::getModelLabel()); // TODO: Change the autogenerated stub

    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")->required(),
                Forms\Components\ColorPicker::make("color"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\ColorColumn::make('color'),
                Tables\Columns\TextColumn::make('created_at')->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePriorities::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
