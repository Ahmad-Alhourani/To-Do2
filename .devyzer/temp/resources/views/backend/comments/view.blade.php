<div class="row mt-4 mb-4">
    <div class="col">

       
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.id'))->class('col-md-2 form-control-label')->for('id') }}
            <div class="col-md-10">
       

                {{ $comment->id }}

            </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.body'))->class('col-md-2 form-control-label')->for('body') }}
            <div class="col-md-10">
       

                {{ $comment->body }}

            </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.person_id'))->class('col-md-2 form-control-label')->for('person_id') }}
            <div class="col-md-10">
       
           {{ $comment->man? $comment->man->name : 'N/A' }}

        </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.comments.todo_id'))->class('col-md-2 form-control-label')->for('todo_id') }}
            <div class="col-md-10">
       
           {{ $comment->todo? $comment->todo->title : 'N/A' }}

        </div><!--col-->
         </div><!--form-group-->
         

        <!--end-columns-->
      


    </div><!--col-->
</div><!--row-->