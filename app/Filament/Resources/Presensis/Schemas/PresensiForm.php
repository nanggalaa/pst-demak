<?php

namespace App\Filament\Resources\Presensis\Schemas;

use App\Models\Presensi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;

class PresensiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            // Pegawai
            TextInput::make('pegawai_id')
                ->label('Pegawai')
                ->required()
                ->numeric()
                ->rules([
                    function ($get, $record) {
                        return function (string $attribute, $value, $fail) use ($get, $record) {

                            $tanggal = $get('tanggal');

                            if (!$tanggal) {
                                return;
                            }

                            $query = Presensi::where('pegawai_id', $value)
                                ->where('tanggal', $tanggal);

                            // Jika EDIT, abaikan record yang sedang diedit
                            if ($record) {
                                $query->where('id', '!=', $record->id);
                            }

                            if ($query->exists()) {
                                $fail('Pegawai ini sudah memiliki presensi pada tanggal tersebut.');
                            }
                        };
                    },
                ]),

            // Tanggal
            DatePicker::make('tanggal')
                ->required()
                ->rules([
                    function ($get, $record) {
                        return function (string $attribute, $value, $fail) use ($get, $record) {

                            $pegawaiId = $get('pegawai_id');

                            if (!$pegawaiId) {
                                return;
                            }

                            $query = Presensi::where('pegawai_id', $pegawaiId)
                                ->where('tanggal', $value);

                            if ($record) {
                                $query->where('id', '!=', $record->id);
                            }

                            if ($query->exists()) {
                                $fail('Pegawai ini sudah memiliki presensi pada tanggal tersebut.');
                            }
                        };
                    },
                ]),

            // Jam Masuk
            TimePicker::make('jam_masuk'),

            // Jam Selesai
            TimePicker::make('jam_selesai'),

            // Status
            Select::make('status')
                ->options([
                    'Hadir' => 'Hadir',
                ])
                ->default('Hadir')
                ->required(),
        ]);
    }
}
