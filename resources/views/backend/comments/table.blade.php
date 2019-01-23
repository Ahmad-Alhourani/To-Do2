<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
                 <th>{{ __('labels.backend.comments.table.body') }}</th>
                
                 <th>{{ __('labels.backend.comments.table.person_id') }}</th>
                
                 <th>{{ __('labels.backend.comments.table.todo_id') }}</th>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
        <tr>
             
                <td>{{  $comment->body }}</td>  
                <td>{!! $comment->man? $comment->man->name : 'N/A' !!}</td> 
                <td>{!! $comment->todo? $comment->todo->title : 'N/A' !!}</td> 
                

               <td>{!! $comment->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>