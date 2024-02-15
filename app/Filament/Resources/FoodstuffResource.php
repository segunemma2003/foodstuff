<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodstuffResource\Pages;
use App\Filament\Resources\FoodstuffResource\RelationManagers;
use App\Models\Foodstuff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodstuffResource extends Resource
{
    protected static ?string $model = Foodstuff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Name')->required(),
                Forms\Components\TextInput::make('Price')
                ->required()
                ->numeric()
                ->default(0.00)
                ->prefix('N'),
                Forms\Components\TextInput::make('Weight')->required(),

                Forms\Components\TextInput::make('Unit')->required(),
                Forms\Components\Textarea::make('Description')
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
                Forms\Components\Select::make('Status')
                ->options([
                    'Active' => 'Active',
                    'Inactive' => 'Inactive',

                ])
                ->native(false),
                Forms\Components\TextInput::make('Tags')->required(),
                Forms\Components\Select::make('Category')
                ->options([

                    'Protein'=>'Protein',
                    'Vegetable'=>'Vegetable',
                    'Processed'=> 'Processed',
                    'Grain'=>'Grain',
                    'Fruit'=>'Fruit',
                    'Seeds'=>'Seeds',
                    'Fluids'=>'Fluids',
                    'Nuts'=>'Nuts',
                    'Live Stock'=>'Live Stock',
                    'Seasoning'=>'Seasoning',
                    'Others'=>'Others'

                ])
                ->native(false),

                Forms\Components\FileUpload::make('Image')
                    ->image()
                    ->imageEditor()
                    ->getUploadedFileNameForStorageUsing(function ( $file): string {
                        (string)  $filename =  str($file->getClientOriginalName())->prepend(time());
                        $result = cloudinary()->uploadFile($file->getRealPath(),[
                            'transformation'=> [
                                'width' => 300,
                                'height'=> 300,
                                'quality'=>"auto",
                                'fetch_format'=>"auto"
                            ]
                        ])->getSecurePath();
                        // dd($result);
                        return $result;
                    })
                    // ->multiple()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Name'),
                Tables\Columns\ImageColumn::make('Image')
                ->width(50)->height(50),
                Tables\Columns\TextColumn::make('ProductID'),
                Tables\Columns\TextColumn::make('Price')
                    ->money("NGN")
                    ->sortable(),
                Tables\Columns\TextColumn::make('Weight'),
                Tables\Columns\TextColumn::make('Unit'),
                Tables\Columns\TextColumn::make('Description'),
                Tables\Columns\TextColumn::make('Category'),
                //
            ])
            ->filters([
                Tables\Filters\Filter::make('Name')
                // ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
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
            'index' => Pages\ListFoodstuffs::route('/'),
            'create' => Pages\CreateFoodstuff::route('/create'),
            'view' => Pages\ViewFoodstuff::route('/{record}'),
            'edit' => Pages\EditFoodstuff::route('/{record}/edit'),
        ];
    }
}
