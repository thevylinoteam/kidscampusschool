@extends('layouts.app', ['breadcrumbs' => [
        ['href'=> route('dashboard'), 'text'=> 'Dashboard'],
        ['href'=> route('students.index'), 'text'=> 'Students'],
        ['href'=> route('students.create'), 'text'=> 'New admission', 'active'],
]])

@section('title',  __('New admission'))

@section('page_heading',   __('New admission'))

@section('content' )
    @livewire('create-student-form')
@endsection