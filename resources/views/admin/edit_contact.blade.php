@extends('admin.admin')
@section('admin_title', 'Edit Contact')
@section('content_title', 'Edit Contact')

@section('sidebar')
    <li class="nav-item">
        <a class="nav-link" href={{ 'master_contact' }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Master Contact</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href={{ 'tambah_contact' }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tambah Contact</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href={{ 'edit_contact' }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Edit Contact</span></a>
    </li>
@endsection