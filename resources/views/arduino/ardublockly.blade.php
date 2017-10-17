<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#00878F">
    <link rel="icon" href="/ardublockly/ardublockly/img/favicon.ico">
    <title class="translatable_title">Ardublockly</title>

    <!-- Materialize, Prettify, and Ardublockly CSS -->
    <link rel="stylesheet" href="/ardublockly/ardublockly/materialize/materialize.css" media="screen,projection">
    <link rel="stylesheet" href="/ardublockly/ardublockly/prettify/arduino.css">
    <link rel="stylesheet" href="/ardublockly/ardublockly/ardublockly.css" media="screen,projection">

    <!-- Ardublockly - These three files contain the compress version -->
    <script src="/ardublockly/blockly/blockly_compressed.js"></script>
    <script src="/ardublockly/blockly/blocks_compressed.js"></script>
    <script src="/ardublockly/blockly/arduino_compressed.js"></script>

    <!-- Default language js files, user selection appended to head on load -->
    <script src="/ardublockly/blockly/msg/js/en.js"></script>
    <script src="/ardublockly/ardublockly/msg/en.js"></script>
</head>

<body>
<!-- Horizontal Navigation bar -->
<nav class="nav-fixed arduino_teal">
    <div class="nav-wrapper container">
        <a id="logo-container" class="brand-logo">
            <span class="app_title translatable_title">Ardublockly:</span>
        </span>
        </a>
        <!-- Horizontal Navbar links only shown on large resolutions -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#" id="button_load"><span class="translatable_open">Open</span><i class="mdi-file-file-upload left"></i></a></li>
            <li><a href="#" id="button_save"><span class="translatable_save">Save</span><i class="mdi-file-file-download left"></i></a></li>
            <li><a href="#" id="button_delete"><span class="translatable_deleteAll">Delete All</span><i class="mdi-action-delete left"></i></a></li>
        </ul>
    </div>
</nav>


<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col s12 m12 l8" style="position:relative">
            <!-- Toolbox visibility button -->
            <a id="button_toggle_toolbox" class="waves-effect waves-light btn-flat button_toggle_toolbox_off" style="display: none"><i id="button_toggle_toolbox_icon" class="mdi-action-visibility-off"></i></a>
            <!-- Arduino IDE action buttons -->
            <div id="ide_buttons_wrapper">
                <a id="button_ide_left" class="waves-effect waves-light waves-circle btn-floating z-depth-1-half arduino_yellow"><i id="button_ide_left_icon" class="mdi-action-open-in-browser"></i></a>
                <a id="button_ide_middle" class="waves-effect waves-light waves-circle btn-floating z-depth-1-half arduino_teal"><i id="button_ide_middle_icon" class="mdi-navigation-check"></i></a>
                <a id="button_ide_large" class="waves-effect waves-light waves-circle btn-floating z-depth-1-half arduino_orange"><i id="button_ide_large_icon" class="mdi-av-play-arrow"></i></a>
                <div id="button_ide_large_spinner" class="preloader-wrapper active ide_loader" style="display:none">
                    <div class="spinner-layer spinner-orange">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-dark-teal">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                    <div class="spinner-layer spinner-light-teal">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blockly Panel -->
            <div class="card-panel white" style="padding: 0">
                <div id="blocks_panel" class="content blocks_panel_large">
                    <div id="content_blocks" class="content z-depth-1"></div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <ul class="collapsible z-depth-1" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header active">
                        <span class="collapsible_logo">{ }</span>
                        <span class="translatable_arduinoSourceCode">Arduino Source Code</span>
                    </div>
                    <div class="collapsible-body">
                        <pre id="content_arduino" class="content content_height_transition content_arduino_large"></pre>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header" id="xml_collapsible_header">
                        <span class="collapsible_logo">&#60; &#62;</span>
                        <span class="translatable_blocksXml">Blocks XML</span>
                    </div>
                    <div class="collapsible-body" style="position:relative" id="xml_collapsible_body">
                        <a class="btn-floating btn-large waves-effect waves-light arduino_teal z-depth-1-half" id="button_load_xml"><i class="mdi-action-extension"></i></a>
                        <textarea id="content_xml" class="content content_height_transition content_xml_large" wrap="soft"></textarea>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- IDE Output content -->
<div class="ide_output_wrapper">
    <ul class="collapsible ide_output_collapsible" data-collapsible="expandable">
        <li>
            <div id="ide_output_collapsible_header" class="collapsible-header ide_output_header_normal">
                <i class="mdi-action-swap-vert Medium" style="font-size: 2.2rem;"></i>
                <span class="translatable_arduinoOpMainTitle">Arduino IDE output</span>
            </div>
            <div class="collapsible-body">
                <div id="content_ide_output" class="content"></div>
            </div>
        </li>
    </ul>
</div>
<div id="ide_output_spacer"></div>

<!-- Settings: Displayed as a Materialize Modal -->
<div id="settings_dialog" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4><span class="translatable_settings">Settings</span></h4>
        <div class="modal_section">
            <label><span class="translatable_compilerLocation">Compiler Location</span>:</label>
            <input type="text" id="settings_compiler_location">
        </div>
        <div class="modal_section">
            <label><span class="translatable_sketchFolder">Sketch Folder</span>:</label>
            <input type="text" id="settings_sketch_location">
        </div>
        <div class="modal_section">
            <label><span class="translatable_arduinoBoard">Arduino Board</span>:</label>
            <select name="settings_board" id="board">
                <option value="uno" class="translatable_arduinoBoardDefault">Arduino Board unknown</option>
            </select>
        </div>
        <div class="modal_section">
            <label><span class="translatable_comPort">COM Port<span>:</label>
            <select name="settings_serial" id="serial_port">
                <option value="COMX" class="translatable_comPortDefault">COM Port unknown</option>
            </select>
        </div>
        <div class="modal_section">
            <label><span class="translatable_defaultIdeButton">Default IDE button</span>:</label>
            <select name="settings_ide" id="ide_settings">
                <option value="verify" class="translatable_defaultIdeButtonDefault">IDE options unknown</option>
            </select>
        </div>
        <div class="modal_section">
            <label><span class="translatable_language">Language</span>:</label>
            <select name="settings_language" id="language"></select>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="waves-effect btn-flat modal-close"><span class="translatable_return">Return</span></a>
    </div>
</div>

<!-- Select Additional Blocks menu -->
<div id="blocks_menu" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div>
            <h4><span class="translatable_addBlocksTitle">Additional Blocks</span></h4>
        </div>
        <div id="blocks_menu_body"></div>
    </div>
    <div class="modal-footer">
        <a href="#" class="waves-effect btn-flat modal-close"><span class="translatable_return">Return</span></a>
    </div>
</div>

<!-- General Alert: Content is loaded using JavaScript to display alerts -->
<div id="gen_alert" class="modal modal_small modal-fixed-footer">
    <div class="modal-content">
        <h5 id="gen_alert_title">Empty Alert</h4>
            <p><span id="gen_alert_body">Empty alert text</span></p>
    </div>
    <div class="modal-footer">
        <a id="gen_alert_ok_link" href="#" class="waves-effect btn-flat modal-close"><span class="translatable_okay">Okay</span></a>
        <a id="gen_alert_cancel_link" href="#" class="waves-effect btn-flat modal-close"><span class="translatable_cancel">Cancel</span></a>
    </div>
</div>

<!-- Prompt: Content is loaded using JavaScript to display input prompt -->
<div id="gen_prompt" class="modal modal_small modal-fixed-footer">
    <div class="modal-content">
        <p><span id="gen_prompt_message">Prompt message</span></p>
        <p><input id="gen_prompt_input" value="test" /></p>
    </div>
    <div class="modal-footer">
        <a id="gen_prompt_ok_link" href="#" class="waves-effect btn-flat modal-close"><span class="translatable_okay">Okay</span></a>
        <a id="gen_prompt_cancel_link" href="#" class="waves-effect btn-flat modal-close"><span class="translatable_cancel">Cancel</span></a>
    </div>
</div>

<!-- Local Modal to be shown if Ardublockly Server is not running. -->
<div id="not_running_dialog" class="modal">
    <div class="modal-content">
        <div>
            <h4 id="gen_alert_title"><span class="translatable_noServerTitle">Server error</span></h4>
        </div>
        <div class="translatable_noServerBody">
        </div>
    </div>
    <div class="modal-footer">
        <a id="gen_alert_ok_link" href="#" class="waves-effect btn-flat modal-close"><span class="translatable_okay">Okay</span></a>
    </div>
</div>

<!-- Desktop version of Ardublockly JS, needs to be loaded first. -->
<script src="/ardublockly/ardublockly/ardublockly_desktop.js"></script>
<!-- jQuery and Materialize JS -->
<script src="/ardublockly/ardublockly/js_libs/jquery-2.1.3.min.js"></script>
<script src="/ardublockly/ardublockly/materialize/materialize.js"></script>
<!-- FileSaver JS -->
<script src="/ardublockly/ardublockly/js_libs/FileSaver.min.js"></script>
<!-- JS Diff -->
<script src="/ardublockly/ardublockly/js_libs/diff.js"></script>
<!-- Prettify JS -->
<script src="/ardublockly/ardublockly/prettify/prettify.js"></script>
<!-- Ardublockly app -->
<script src="/ardublockly/ardublockly/ardublocklyserver_ajax.js"></script>
<script src="/ardublockly/ardublockly/ardublockly_lang.js"></script>
<script src="/ardublockly/ardublockly/ardublockly_design.js"></script>
<script src="/ardublockly/ardublockly/ardublockly_toolbox.js"></script>
<script src="/ardublockly/ardublockly/ardublockly_blockly.js"></script>
<script src="/js/ardublockly.js"></script>
<script>
    window.addEventListener('load', function load(event) {
        window.removeEventListener('load', load, false);
        Ardublockly.init();
    });
</script>
</body>
</html>
