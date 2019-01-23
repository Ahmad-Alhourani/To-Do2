<div class="row mt-4 mb-4">
    <div class="col">
         
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.body'))->class('col-md-2 form-control-label')->for('body') }}
            <div class="col-md-10">
                
                        {{ html()->textarea('body')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.comments.body'))
                        
                        
                      
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.person_id'))->class('col-md-2 form-control-label')->for('person_id') }}
            <div class="col-md-10">
                
                    <select class="form-control m-bot15" name="person_id"  required  >
                         <option value="">select...</option>
                        @if  ($men->count())
                        @foreach($men as $temp)
                                <option value="{{ $temp->id }}" {{ isset($comment->person_id)&& $comment->person_id == $temp->id ? 'selected="selected"' : '' }}>{{ $temp->name }}</option>
                        @endforeach
                        @endif
                    </select>
                

            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.todo_id'))->class('col-md-2 form-control-label')->for('todo_id') }}
            <div class="col-md-10">
                
                    <select class="form-control m-bot15" name="todo_id"  required  >
                         <option value="">select...</option>
                        @if  ($todos->count())
                        @foreach($todos as $temp)
                                <option value="{{ $temp->id }}" {{ isset($comment->todo_id)&& $comment->todo_id == $temp->id ? 'selected="selected"' : '' }}>{{ $temp->title }}</option>
                        @endforeach
                        @endif
                    </select>
                

            </div><!--col-->
        </div><!--form-group-->
        

        <!--end-columns-->
             



    </div><!--col-->
</div><!--row-->