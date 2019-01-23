<div class="row mt-4 mb-4">
    <div class="col">

       
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.todos.id'))->class('col-md-2 form-control-label')->for('id') }}
            <div class="col-md-10">
       

                {{ $todo->id }}

            </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.todos.title'))->class('col-md-2 form-control-label')->for('title') }}
            <div class="col-md-10">
       

                {{ $todo->title }}

            </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.todos.description'))->class('col-md-2 form-control-label')->for('description') }}
            <div class="col-md-10">
       

                {{ $todo->description }}

            </div><!--col-->
         </div><!--form-group-->
         
            <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.todos.deadline'))->class('col-md-2 form-control-label')->for('deadline') }}
            <div class="col-md-10">
       

                {{ $todo->deadline }}

            </div><!--col-->
         </div><!--form-group-->
         

        <!--end-columns-->
      
        <div class="form-group row">
           {{html()->label(__('Categorys'))->class('col-md-2 form-control-label')->for('categories') }}
            <div class="col-md-10">
                @if  ( isset($todo->categories)&&$todo->categories->count())
                    @foreach($todo->categories as $temp)
                        {{$temp->name }},
                    @endforeach
                @endif
            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
           {{html()->label(__('People'))->class('col-md-2 form-control-label')->for('men') }}
            <div class="col-md-10">
                @if  ( isset($todo->users)&&$todo->users->count())
                    @foreach($todo->users as $temp)
                        {{$temp->name }},
                    @endforeach
                @endif
            </div><!--col-->
        </div><!--form-group-->
        


    </div><!--col-->
</div><!--row-->