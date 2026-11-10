<?php

namespace App\Filament\Resources\Presensis;

use App\Filament\Resources\Presensis\Pages\CreatePresensi;
use App\Filament\Resources\Presensis\Pages\EditPresensi;
use App\Filament\Resources\Presensis\Pages\ListPresensis;
use App\Filament\Resources\Presensis\Schemas\PresensiForm;
use App\Models\Presensi;
use App\Models\Pegawai;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class PresensiResource extends Resource
{
    protected static ?string $model = Presensi::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-clipboard-document';

    protected static ?string $recordTitleAttribute = 'id';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('pegawai');
    }

    public static function form(Schema $schema): Schema
    {
        return PresensiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawai.nama')
                    ->label('Nama Pegawai')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),

                TextColumn::make('jam_masuk')
                    ->label('Jam Masuk')
                    ->time(),

                TextColumn::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->time(),

                TextColumn::make('status')
                    ->label('Status'),
            ])

            // =====================
            // FILTER
            // =====================
            ->filters([
                SelectFilter::make('pegawai_id')
                    ->label('Pegawai')
                    ->options(
                        Pegawai::query()
                            ->orderBy('nama')
                            ->pluck('nama', 'id')
                    ),

                SelectFilter::make('status')
                    ->options([
                        'Hadir' => 'Hadir',
                    ]),

                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('from')->label('Dari Tanggal'),
                        DatePicker::make('until')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['from'] ?? null,
                                fn (Builder $query, $date) =>
                                    $query->whereDate('tanggal', '>=', $date)
                            )
                            ->when(
                                $data['until'] ?? null,
                                fn (Builder $query, $date) =>
                                    $query->whereDate('tanggal', '<=', $date)
                            );
                    }),
            ])

            // =====================
            // HEADER ACTION (EXPORT)
            // =====================
            ->headerActions([
                ExportAction::make()
                    ->label('Export Presensi')
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withColumns([
                                Column::make('pegawai.nama')->heading('Nama Pegawai'),
                                Column::make('tanggal')->heading('Tanggal'),
                                Column::make('jam_masuk')->heading('Jam Masuk'),
                                Column::make('jam_selesai')->heading('Jam Selesai'),
                                Column::make('status')->heading('Status'),
                            ])
                            ->withFilename(fn () => 'presensi-' . now()->format('Y-m-d')),
                    ]),
            ])

            // =====================
            // ROW ACTION (EDIT & DELETE)
            // =====================
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            // =====================
            // BULK DELETE
            // =====================
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPresensis::route('/'),
            'create' => CreatePresensi::route('/create'),
            'edit' => EditPresensi::route('/{record}/edit'),
        ];
    }
}
