<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
                 <th>@sortablelink('name', trans('labels.backend.categories.table.name')) </th>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
             
                <td>{{  $category->name }}</td>  
                

               <td>{!! $category->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>