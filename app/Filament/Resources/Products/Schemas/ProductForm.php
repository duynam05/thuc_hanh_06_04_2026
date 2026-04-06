<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([

                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required(),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),

                TextInput::make('price')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                TextInput::make('stock_quantity')
                    ->numeric()
                    ->integer()
                    ->required(),

                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'out_of_stock' => 'Out of stock',
                    ])
                    ->required(),

                // 🔥 FIELD SÁNG TẠO
                TextInput::make('discount_percent')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                FileUpload::make('image_path')
                    ->image()
                    ->directory('products'),

                RichEditor::make('description')
                    ->columnSpanFull(),

            ])
        ]);
    }
}