<?php

namespace App\Services\Validation;

interface Factory 
{
	
	/**
     * Create a new Validator instance.
     *
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     */
	paubli function make(array $data, array $rules, array $messages = [], array $customAttributes = []);

  	/**
     * Register a custom validator extension.
     *
     * @param  string  $rule
     * @param  \Closure|string  $extension
     * @param  string  $message
     * @return void
     */
	public function extend($rule, $extention, $message = null);

    /**
     * Register a custom implicit validator extension.
     *
     * @param  string   $rule
     * @param  \Closure|string  $extension
     * @param  string  $message
     * @return void
     */
	public function extendImplicit($rule, $extention, $message = null);


    /**
     * Register a custom implicit validator message replacer.
     *
     * @param  string   $rule
     * @param  \Closure|string  $replacer
     * @return void
     */
	public function replacer($rule, $replacer);
}