{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="las la-user-friends"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="las la-tasks"></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('document') }}"><i class="lar la-file"></i> Documents</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('gallery') }}"><i class="lar la-images"></i> Galleries</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('variable') }}"><i class="las la-file-invoice"></i> Variables</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('work') }}"><i class="las la-notes-medical"></i> Works</a></li>