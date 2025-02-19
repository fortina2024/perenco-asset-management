<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoatResource\Pages;
use App\Filament\Resources\BoatResource\RelationManagers;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Boat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;


class BoatResource extends Resource
{
    protected static ?string $model = Boat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->description('')
                ->schema([
                    Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('typeofboat_id')
                    ->relationship(name: 'typeofboat', titleAttribute: 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('categoryofboat_id')
                    ->relationship(name: 'categoryofboat', titleAttribute: 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('costcenter_id')
                    ->relationship(name: 'costcenter', titleAttribute: 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('company_id')
                    ->relationship(name: 'company', titleAttribute: 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('Contract')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(['On-Hire'=>'On-Hire','Off-Hire'=>'Off-Hire']),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ])->columns(3)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('typeofboat.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoryofboat.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('costcenter.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.nom')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contract')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('Category')
                    ->relationship('categoryofboat', 'nom')
                    ->searchable()
                    ->preload()
                    ->label('Filter by category')
                    ->indicator('Category'),
                    Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBoats::route('/'),
            'create' => Pages\CreateBoat::route('/create'),
            'view' => Pages\ViewBoat::route('/{record}'),
            'edit' => Pages\EditBoat::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
