<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\Filter;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                IconColumn::make('is_visible')->boolean(),
            ])
            ->filters([
                Filter::make('is_visible')
                    ->query(fn ($query) => $query->where('is_visible', true)),
            ]);
    }
}