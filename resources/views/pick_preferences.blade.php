@extends('templates.skeleton')

@section('content')



  <form method="POST"id="top-3">
    {{ csrf_field() }}

    <div class="row">
      <div class="col m6">
        <h3>
          Click and Drag your top 3 Preferences
        </h3>
        <div class="prefs">
          <div class="pref">
            <h5>First Preference</h5>
            <br>
            <div data-order="1" id="pref-1" ondrop="drop_handler(event);" ondragover="dragover_handler(event);" class="card-panel ra-drop grey-text text-lighten-1">
            </div>
          </div>
          <div class="pref">
            <h5>Second Preference</h5>
            <br>
            <div data-order="2" id="pref-2" ondrop="drop_handler(event);" ondragover="dragover_handler(event);" class="card-panel ra-drop grey-text text-lighten-1">
            </div>
          </div>
          <div class="pref">
            <h5>Third Preference</h5>
            <br>
            <div data-order="3" id="pref-3" ondrop="drop_handler(event);" ondragover="dragover_handler(event);" class="card-panel ra-drop grey-text text-lighten-1">
            </div>
          </div>
        </div>

      </div>
      <div class="col m6">
        <h3>
          Residence Areas
        </h3>
        <div class="card-panel ra" ondrop="drop_handler(event);" ondragover="dragover_handler(event);">
          <div id="sheahan" draggable="true" ondragstart="dragstart_handler(event);" class="card-panel ra-card">
            Sheahan
          </div>
          <div id="leo" draggable="true" ondragstart="dragstart_handler(event);" class="card-panel ra-card">
            Leo
          </div>
          <div id="champ" draggable="true" ondragstart="dragstart_handler(event);" class="card-panel ra-card">
            Champ
          </div>
        </div>
      </div>
    </div>

  </form>


@endsection

@section('js')
  <script src="/js/prefs.js"></script>
@endsection
