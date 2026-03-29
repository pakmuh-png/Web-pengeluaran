<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Actions\Action;
use App\Models\Setting;
use Filament\Notifications\Notification;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Global Settings';
    protected static ?string $title = 'Global Settings';
    protected static ?int $navigationSort = 100;

    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::first();
        if ($setting) {
            $this->form->fill($setting->toArray());
        } else {
            $this->form->fill([
                'company_lat' => '-6.200000',
                'company_lng' => '106.816666',
                'max_distance' => 500,
            ]);
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Location Settings')
                    ->description('Atur lokasi perusahaan dan toleransi jarak maksimal check-in.')
                    ->components([
                        TextInput::make('company_lat')
                            ->label('Latitude Perusahaan')
                            ->required()
                            ->numeric(),
                        TextInput::make('company_lng')
                            ->label('Longitude Perusahaan')
                            ->required()
                            ->numeric(),
                        TextInput::make('max_distance')
                            ->label('Jarak Maksimal (Meter)')
                            ->required()
                            ->numeric()
                            ->integer(),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $setting = Setting::first();
        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        Notification::make()
            ->title('Settings updated')
            ->success()
            ->send();
    }
}
