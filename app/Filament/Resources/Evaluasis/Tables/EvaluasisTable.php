<?php

namespace App\Filament\Resources\Evaluasis\Tables;

// use Filament\Action\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class EvaluasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawai.nama')
                    ->label('Nama Pegawai')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export Semua Data')
                    ->exports([
                        ExcelExport::make()
                            ->withColumns([
                                Column::make('pegawai.nama')->heading('Nama Pegawai'),
                                Column::make('rating')->heading('Rating'),
                                Column::make('created_at')->heading('Tanggal Dibuat'),
                                Column::make('updated_at')->heading('Tanggal Diperbarui'),
                            ])
                            ->withFilename(fn () => 'evaluasi-all-' . now()->format('Y-m-d')),
                    ]),
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Export Data Terpilih')
                    ->exports([
                        ExcelExport::make()
                            ->withColumns([
                                Column::make('pegawai.nama')->heading('Nama Pegawai'),
                                Column::make('rating')->heading('Rating'),
                                Column::make('created_at')->heading('Tanggal Dibuat'),
                                Column::make('updated_at')->heading('Tanggal Diperbarui'),
                            ])
                            ->withFilename(fn () => 'evaluasi-terpilih-' . now()->format('Y-m-d')),
                    ]),
                DeleteBulkAction::make(),
            ]);
    }
}
