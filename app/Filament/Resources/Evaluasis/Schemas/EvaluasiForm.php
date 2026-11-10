<?php

namespace App\Filament\Resources\Evaluasis\Schemas;

use App\Models\Pegawai;
use App\Models\Kunjungan;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class EvaluasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            // 1. Pilih Pegawai
            Select::make('pegawai_id')
                ->label('Nama Pegawai')
                ->options(
                    Pegawai::query()
                        ->orderBy('nama')
                        ->pluck('nama', 'id')
                )
                ->searchable()
                ->required(),

            // 2. Pilih Pengunjung
            Select::make('pengunjung_id')
                ->label('Nama Pengunjung')
                ->options(
                    Kunjungan::query()
                        ->orderBy('created_at', 'desc')
                        ->pluck('nama', 'id')
                )
                ->searchable()
                ->required(),

            // 3. Rating
            TextInput::make('rating')
                ->label('Rating')
                ->numeric()
                ->minValue(1)
                ->maxValue(5)
                ->required(),

        ]);
    }
}
