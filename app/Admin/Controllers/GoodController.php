<?php

namespace App\Admin\Controllers;

use App\Catalog;
use App\Good;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    public $title = 'Товары';
    public $catalog_id=0;
    public $catalog_name = '';
    public $bread_crubs='';


    public function __construct()
    {
//        $this->middleware('set_catalog');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $this->getHeader();


        $grid = new Grid(new Good());
        $grid->renderHeader('test');

        $grid->model()->where('catalog_id',session('catalog_id'));

        $grid->column('id', __('Id'));
        $grid->column('catalog_id', __('Catalog id'));
        $grid->column('name', __('Name'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('url', __('Url'));
        $grid->column('text', __('Text'));
        $grid->column('sort', __('Sort'));
        $grid->image('Изображение')->display(function () {
            return  '<img src="/uploads/images/thumbnail/'.$this->image.'" width="200"/>';
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Good::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('catalog_id', __('Catalog id'));
        $show->field('name', __('Name'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('keywords', __('Keywords'));
        $show->field('url', __('Url'));
        $show->field('text', __('Text'));
        $show->field('sort', __('Sort'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Good());

        $form->text('name', __('Name'));
        $form->myimage('image', __('Image'));
        $form->number('sort', __('Sort'))->default(1);
        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->text('keywords', __('Keywords'));
        $form->url('url', __('Url'));
        $form->textarea('text', __('Text'));
        $form->number('catalog_id', __('Catalog id'))->default(session('catalog_id'));

        return $form;
    }

    private function getHeader() {
        $catalog = Catalog::find(session('catalog_id'));
//        dd($catalog->name, session('catalog_id'));
        if ($catalog) {
            $this->catalog_id = $catalog->id;
            $this->catalog_name = $catalog->name;
            $this->title = $catalog->name;
        }
        else {
            return redirect('/admin/catalogs');
        }
    }
}
