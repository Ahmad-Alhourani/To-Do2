<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait TodoAttribute.
 */
trait TodoAttribute
{
    /**
     * @return   todo
     */
    public function getViewButtonAttribute()
    {
        return '<a href="' .
            route('admin.todo.show', $this) .
            '" data-toggle="tooltip" data-placement="top" title="' .
            __('buttons.general.crud.view') .
            '" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string  todo
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' .
            route('admin.todo.edit', $this) .
            '" data-toggle="tooltip" data-placement="top" title="' .
            __('buttons.general.crud.edit') .
            '" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' .
            route('admin.todo.destroy', $this) .
            '"
			 data-method="delete"
			 data-trans-button-cancel="' .
            __('buttons.general.cancel') .
            '"
			 data-trans-button-confirm="' .
            __('buttons.general.crud.delete') .
            '"
			 data-trans-title="' .
            __('strings.backend.general.are_you_sure') .
            '"
			 class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' .
            __('buttons.general.crud.delete') .
            '"></i></a> ';
    }

    /**
     * @return  string
     */
    public function getCategorysButtonAttribute()
    {
        return '<a href="' .
            route('admin.category.todo', $this) .
            ' " class="dropdown-item">' .
            __('Categorys') .
            '</a> ';
    }

    /**
     * @return  string
     */
    public function getPeopleButtonAttribute()
    {
        return '<a href="' .
            route('admin.man.todo', $this) .
            ' " class="dropdown-item">' .
            __('People') .
            '</a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div
       class="btn-group btn-group-sm" todo="group" aria-label="Todo Actions">
	   		 ' .
            $this->view_button .
            '
			  ' .
            $this->edit_button .
            '
			  ' .
            $this->delete_button .
            '
</div>
';
    }
}
