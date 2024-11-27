@extends('admin.layouts.master')

@section('title')
    Setting | Admin Panel
@endsection

@section('content')
<div class="row mt-4 d-flex justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

            {{-- Display success message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Display error message --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
              
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="web-tab" data-bs-toggle="tab" data-bs-target="#web-tab-pane"
                        type="button" role="tab" aria-controls="web-tab-pane" aria-selected="true">Web Setting</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="app-tab-pane" role="tabpanel" aria-labelledby="app-tab">
                    @include('admin.pages.setting_manages.partials._app', ['record' => $appSettingManage])
                </div>
                <div class="tab-pane fade" id="web-tab-pane" role="tabpanel" aria-labelledby="web-tab">
                    @include('admin.pages.setting_manages.partials._web', ['record' => $webSettingManage])
                </div>
                <div class="tab-pane fade" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab">
                    @include('admin.pages.setting_manages.partials._user', ['record' => $userSetting])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the tab from the URL query parameter
      let tab = new URLSearchParams(window.location.search).get('tab');

      // Check if a tab is specified
      if (tab) {
          // Find the corresponding tab button
          let targetTabButton = document.querySelector(`#${tab}`);
          let targetTabPane = document.querySelector(`#${tab}-pane`);

          if (targetTabButton && targetTabPane) {
              // Remove 'active' class from all tab buttons and panes
              document.querySelectorAll('.nav-link').forEach(button => button.classList.remove('active'));
              document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));

              // Activate the target tab and pane
              targetTabButton.classList.add('active');
              targetTabPane.classList.add('show', 'active');
          }
      } else {
          let defaultTabButton = document.querySelector('#app-tab');
          let defaultTabPane = document.querySelector('#app-tab-pane');

          if (defaultTabButton && defaultTabPane) {
              defaultTabButton.classList.add('active');
              defaultTabPane.classList.add('show', 'active');
          }
      }
    });
</script>
