<?php

namespace App\Http\Livewire\Admin\Businesses;

use Livewire\Component;
use App\Models\BusinessSettings;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Filter;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

class Businesses extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    protected $index = 0;

    public $deleteId = '';

    //Custom per page
    public int $perPage = 5;
    
    //Custom per page values
    public array $perPageValues = [0, 5, 10, 20, 50];

    protected function getListeners(): array
    {
        return array_merge(
            parent::getListeners(),
            [
                'deleted'   => 'deleteModel',
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
        $this->persist(['columns', 'filters']);
        $this->showPerPage()->showSearchInput();
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
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\BusinessSettings>|null
     */
    public function datasource(): ?Builder
    {
        return BusinessSettings::query();
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
            ->addColumn('id_inc', function () {
                return ++$this->index +  ($this->page - 1) * $this->perPage;
            })
            ->addColumn('title')
            ->addColumn('type', function (BusinessSettings $model) {
                return ucfirst($model->type);
              })
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', function (BusinessSettings $model) {
                return $model->created_at ? Carbon::parse($model->created_at)->format('d/m/Y H:i') : '' ;
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
                ->field('id_inc', 'id')
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('Title')
                ->field('title')
                ->searchable()
                ->makeInputText('title')
                ->sortable(),

            Column::add()
                ->title('Type')
                ->field( 'type')
                ->searchable()
                ->makeInputSelect(BusinessSettings::select('type')->distinct()->get(), 'type', 'type', ['live-search' => true])
                ->sortable(),

            Column::add()
                ->title('Status')
                ->field('status')
                ->makeBooleanFilter('status', 'Enabled', 'Disabled')
                ->toggleable(true, 1, 0)
                ->sortable(),

            Column::add()
                ->title('Created at')
                ->field('created_at')
                ->hidden(),   

            Column::add()
                ->title('Created at')
                ->field('created_at_formatted', 'created_at')
                ->makeInputDatePicker('created_at')
                ->searchable()
        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('type', 'type')
                ->dataSource(BusinessSettings::all())
                ->optionValue('type')
                ->optionLabel('type'),
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
     * PowerGrid BusinessSettings Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


     public function actions(): array
     {
         return [
             Button::add('edit')
                 ->caption('Edit')
                 ->class('btn btn-primary')
                 ->route('admin.businesses.edit', ['id' => 'id'])
                 ->target('_self'),
 
             Button::add('destroy')
                 ->caption('Delete')
                 ->class('btn btn-danger')
                 ->emit('deleted', ['key' => 'id']),
         ];
     }

     /**
     * PowerGrid Business Setting Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data): bool
    {
        try {
            $updated = BusinessSettings::query()
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

    public function deleteModel($id)
    {
        $model = BusinessSettings::find($id['key']);
        if (isset($model->image)) {
            deleteImage($model->image);
        }
        $model->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Data deleted',
            'timer' => 3000,
            'icon' => 'success',
            'timerProgressBar' => true,
        ]);
    }

 
}
