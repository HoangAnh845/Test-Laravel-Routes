/**
 * This file contains the input component.
 *
 * The input component is used to render an input field.
 * It accepts a 'disabled' prop which determines if the input field is disabled or not.
 */
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>