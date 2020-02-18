<?php

namespace App\Admin\Controllers;

use App\Catalog;
use App\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CatalogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ассортимент';
    public $catalog_id=0;
    public $catalog_name = '';
    public $bread_crubs='';


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $this->getHeader();

        $grid = new Grid(new Catalog());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('url', __('Url'));
        $grid->column('redirect', __('Redirect'));
        $grid->column('relation', __('Relation'));
        $grid->name('Наименование')->display(function ($name) {
                $str = "<a href='/admin/goods?set={$this->id}' title='перейти к товарам'>{$this->name}</a>";
            return $str;
        });
        $grid->column('order', __('Order'));
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
        $show = new Show(Catalog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('keywords', __('Keywords'));
        $show->field('url', __('Url'));
        $show->field('redirect', __('Redirect'));
        $show->field('relation', __('Relation'));
        $show->field('name', __('Name'));
        $show->field('order', __('Order'));
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
        $form = new Form(new Catalog());

        $form->number('parent_id', __('Parent id'))->default(0);
        $form->text('title', __('Заголовок'));
        $form->text('description', __('Описание'));
        $form->text('keywords', __('Ключевые слова'));
//        $form->url('url', __('Url'));
//        $form->text('redirect', __('Redirect'));
//        $form->switch('relation', __('Relation'));
        $form->text('name', __('Наименование'));
        $form->ckeditor('text', 'Описание направления')
            ->options(
                [
                    'filebrowserBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserImageBrowseUrl' =>  '/ckfinder/browser',
                    'filebrowserUploadUrl' => '/ckfinder/browser?type=Files',
                    'filebrowserImageUploadUrl' => '/ckfinder/browser?command=QuickUpload&type=Images',
                    'lang' => 'ru',
                    'height' => 500,
                    'filebrowserWindowWidth' => '1000',
                    'filebrowserWindowHeight' => '700'
                ])->default('-');
        $form->number('order', __('Сортировка'))->default(1);

        return $form;
    }

    private function getHeader() {
        $catalog = Catalog::find(session('catalog_id'));
        if ($catalog) {
            $this->catalog_id = $catalog->id;
            $this->catalog_name = $catalog->name;
        }
        else {
            return redirect('/admin/catalogs');
        }
    }

    private function getBeadCrumbs($id)
    {
        $page = Page::find($id);
        $this->bread_crubs = " <a href='/admin/sub_pages?set={$page->id}'>".$page->name."</a> / ".$this->bread_crubs;

        if (($page->parent_id>0) and (Admin::user()->isAdministrator()) ) {
            $this->getBeadCrumbs($page->parent_id);
        }
    }
}
