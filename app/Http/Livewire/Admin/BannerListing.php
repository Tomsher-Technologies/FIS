<?php

namespace App\Http\Livewire\Admin;

use App\Models\Banner;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class BannerListing extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    public int $perPage = 2;

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'deleted'   => 'deleteBanner',
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showPerPage(2)
            ->showSearchInput();
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Banner>|null
     */
    public function datasource(): ?Builder
    {
        return Banner::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('heading')
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function (Banner $model) {
                return Carbon::parse($model->created_at)->format('d/m/Y');
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->sortable(),

            Column::add()
                ->title('Heading')
                ->field('heading')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Status')
                ->field('status')
                ->toggleable(true, 1, 0)
                ->sortable(),

            Column::add()
                ->title('Created at')
                ->field('created_at')
                ->hidden(),

            Column::add()
                ->title('Created at')
                ->field('created_at_formatted', 'created_at')
                ->sortable()
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Banner Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('Edit')
                ->class('btn btn-primary')
                ->route('admin.banner.edit', ['banner' => 'id'])
                ->target('_self'),


            Button::add('destroy')
                ->caption('Delete')
                ->class('btn btn-danger')
                ->emit('deleted', ['key' => 'id']),

            // Button::add('destroy')
            //     ->caption('Delete')
            //     ->route('admin.banner.destroy', ['banner' => 'id'])
            //     ->method('delete')
            //     ->target('_self')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Banner Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($banner) => $banner->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid Banner Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data): bool
    {
        try {
            $updated = Banner::query()
                ->find($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
        } catch (QueryException $exception) {
            $updated = false;
        }
        return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }


    // public function onUpdatedToggleable($id, $field, $value): void
    // {
    //     Banner::query()->find($id)->update([
    //         $field => $value,
    //     ]);
    // }

    public function deleteBanner($id)
    {
        Banner::destroy($id['key']);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Banner deleted',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
    }
}
