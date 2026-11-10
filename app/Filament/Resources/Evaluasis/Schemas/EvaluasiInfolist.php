<?php

namespace App\Filament\Resources\Evaluasis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EvaluasiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Infolists\Components\TextEntry::make('pegawai.nama')
                    ->label('Nama Pegawai'),

                \Filament\Infolists\Components\TextEntry::make('rating')
                    ->label('Rating'),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('Dibuat Pada'),
            ]);
    }
}
