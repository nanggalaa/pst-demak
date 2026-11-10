<?php

namespace App\Filament\Resources\Kunjungans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class KunjungansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
                TextColumn::make('instansi')->label('Instansi')->searchable(),
                TextColumn::make('tanggal')->label('Tanggal Kunjungan')->date()->sortable(),
                TextColumn::make('layanan')->label('Layanan')->searchable(),
                TextColumn::make('email')->label('Email')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y H:i')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('tahun')
                    ->form([
                        Select::make('tahun')
                            ->label('Pilih Tahun')
                            ->options(fn () => collect(range(2018, now()->year))->mapWithKeys(fn($y) => [$y => (string)$y])->all())
                            ->searchable()
                            ->native(false),
                    ])
                    ->query(fn (Builder $query, array $data) => $query->when($data['tahun'] ?? null, fn (Builder $q, $year) => $q->whereYear('tanggal', (int) $year)))
                    ->indicateUsing(fn (array $data) => !empty($data['tahun']) ? ['Tahun: ' . $data['tahun']] : null),
                Filter::make('triwulan')
                    ->form([
                        Select::make('triwulan')
                            ->label('Pilih Triwulan')
                            ->options([
                                1 => 'Triwulan 1 (Jan–Mar)',
                                2 => 'Triwulan 2 (Apr–Jun)',
                                3 => 'Triwulan 3 (Jul–Sep)',
                                4 => 'Triwulan 4 (Okt–Des)',
                            ])
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data) {
                        $quarter = (int) ($data['triwulan'] ?? 0);
                        if (!$quarter) return $query;
                        $ranges = [1 => [1,3], 2 => [4,6], 3 => [7,9], 4 => [10,12]];
                        [$start,$end] = $ranges[$quarter];
                        return $query->whereBetween(DB::raw('MONTH(tanggal)'), [$start,$end]);
                    })
                    ->indicateUsing(fn (array $data) => !empty($data['triwulan']) ? ['Triwulan: Q'.$data['triwulan']] : null),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export Semua Data')
                    ->exports([
                        ExcelExport::make() // otomatis menggunakan query table saat ini
                            ->withColumns([
                                Column::make('nama')->heading('Nama'),
                                Column::make('instansi')->heading('Instansi'),
                                Column::make('tanggal')->heading('Tanggal Kunjungan'),
                                Column::make('layanan')->heading('Layanan'),
                                Column::make('email')->heading('Email'),
                                Column::make('created_at')->heading('Dibuat'),
                            ])
                            ->withFilename(fn () => 'kunjungan-filtered-' . now()->format('Y-m-d')),
                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->label('Export Data Terpilih')
                        ->exports([
                            ExcelExport::make()
                                ->withColumns([
                                    Column::make('nama')->heading('Nama'),
                                    Column::make('instansi')->heading('Instansi'),
                                    Column::make('tanggal')->heading('Tanggal Kunjungan'),
                                    Column::make('layanan')->heading('Layanan'),
                                    Column::make('email')->heading('Email'),
                                    Column::make('created_at')->heading('Dibuat'),
                                ])
                                ->withFilename(fn () => 'kunjungan-terpilih-' . now()->format('Y-m-d')),
                        ]),
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal', 'desc');
    }
}
