<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Proposal;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProposalResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProposalResource\RelationManagers;

class ProposalResource extends Resource
{
    protected static ?string $model = Proposal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'File Upload';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(150),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Select::make('ministry_id')
                    ->relationship('ministry', 'nama')
                    ->label('Kementerian')
                    ->required(),
                Select::make('status_id')
                    ->relationship('status', 'name') // Relasi ke tabel statuses
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pengajuan')
                    ->required(),
                FileUpload::make('file_path')
                    ->required()
                    ->label('File Proposal')
                    ->preserveFilenames()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_pengajuan')
                    ->date()
                    ->label('Tanggal Pengajuan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                // Mengakses relasi ministry dan menampilkan 'name'
                Tables\Columns\TextColumn::make('ministry.nama')
                    ->sortable()
                    ->label('Kementerian'),
                // Mengakses relasi status dan menampilkan 'name'

                
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable()
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->label('File Proposal'),
                Tables\Columns\TextColumn::make('status.name')
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
                //
            ])
            ->actions([
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
            'index' => Pages\ListProposals::route('/'),
            'create' => Pages\CreateProposal::route('/create'),
            'edit' => Pages\EditProposal::route('/{record}/edit'),
        ];
    }
}
