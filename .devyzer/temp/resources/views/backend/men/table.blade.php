<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
                 <th>@sortablelink('name', trans('labels.backend.men.table.name')) </th>
                
                 <th>@sortablelink('email', trans('labels.backend.men.table.email')) </th>
                
                 <th>{{ __('labels.backend.men.table.sms') }}</th>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($men as $man)
        <tr>
             
                <td>{{  $man->name }}</td>  
                <td>{{  $man->email }}</td>  
                <td>{{  $man->sms }}</td>  
                

               <td>{!! $man->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>