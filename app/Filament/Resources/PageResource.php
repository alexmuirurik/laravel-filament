<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state){
                        $set('slug', \Illuminate\Support\Str::slug($state));
                    })
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Card::make([
                    Forms\Components\RichEditor::make('content')
                    ->maxLength(65535)
                    ->columnSpan('full')
                    ->required(),
                ]),
                Forms\Components\MarkdownEditor::make('meta')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\Select::make('template_id')
                    ->relationship('template', 'name'),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('author'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('categories'),
                Tables\Columns\TextColumn::make('tags'),
                Tables\Columns\TextColumn::make('template'),
                Tables\Columns\TextColumn::make('meta'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }    
}
