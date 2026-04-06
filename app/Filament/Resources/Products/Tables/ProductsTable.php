<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),

                TextColumn::make('price')
                    ->formatStateUsing(fn ($state) =>
                        number_format($state, 0, ',', '.') . ' VNĐ'
                    ),

                TextColumn::make('category.name'),

                TextColumn::make('status'),

                ImageColumn::make('image_path'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name'),
            ]);
    }
}