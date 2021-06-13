<?php

namespace SewidanField;

use Carbon\Carbon;
use Form;


/**
 * to create dynamic fields for modules
 */
class Field
{

    private $config;
    private $view_path = 'fields::fields';
    private $app_path = 'fields::layouts.field-app';

    function __construct($theme = null)
    {
        $theme = $theme ? $theme : config('field.default_theme');
        $config_themes = config('field.themes');
        $config = isset($config_themes[$theme]) ? $config_themes[$theme] : $config_themes['default'];
        $this->config = $config;
    }


    /**
     * @param $field_type
     * @param array $params
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function view($field_type , $params = [])
    {
        $params['config'] = $this->config;
        $params['field_type'] = $field_type;
        return view($this->app_path, $params);
    }

    /**
     * @return array|string
     * @throws \Throwable
     */
    public function langNavTabs()
    {
        return view($this->view_path.'.lang-nav-tabs')->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return array|string
     * @throws \Throwable
     */
    public function text($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('text', compact('name', 'label', 'value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function dateTime($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('date-time', compact('name', 'label', 'value','field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function time($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('time', compact('name', 'label', 'value','field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function number($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('number', compact('name', 'label', 'value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function email($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('email', compact('name', 'label', 'value','field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param array $field_attributes
     * @return string
     */
    public function password($name, $label, $field_attributes = [])
    {
        return $this->view('password', compact('name', 'label','field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function datePicker($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('datepicker', compact('name', 'label', 'value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function date($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('date', compact('name', 'label', 'value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param null $selected
     * @param array $field_attributes
     * @return string
     */
    public function select($name, $label, $options, $selected = null, $field_attributes = [])
    {
        return $this->view('select', compact('name', 'label', 'options', 'selected', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param null $selected
     * @param array $field_attributes
     * @return string
     */
    public function multiSelect($name, $label, $options, $selected = null, $field_attributes = [])
    {
        return $this->view('multi-select', compact('name', 'label', 'options', 'selected', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param array $field_attributes
     * @return string
     */
    public function multiFileUpload($name, $label, $field_attributes = [])
    {
        return $this->view('multiFile-upload', compact('name', 'label', 'field_attributes'))->render();
    }


    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function fileManger($name, $label, $value = null , $field_attributes = [])
    {
        return $this->view('file', compact('name', 'label','value','field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function textarea($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('textarea', compact('name', 'label', 'value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param array $field_attributes
     * @return string
     */
    public function fileWithPreview($name, $label, $field_attributes = [])
    {
        return $this->view('file', compact('name', 'label', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function checkBox($name, $label, $value = null, $field_attributes = [])
    {
        return $this->view('check-box', compact('name', 'label','value', 'field_attributes'))->render();
    }

    /**
     * @param $name
     * @param $label
     * @param $options
     * @param null $checked
     * @param array $field_attributes
     * @return string
     */
    public function radio($name, $label, $options, $checked = null, $field_attributes = [])
    {
        return $this->view('radio', compact('name', 'label', 'options', 'checked','field_attributes'))->render();
    }
}