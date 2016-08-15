
// CODEBLOCK FIELD FOR "{!! $id !!}"
var {!! $editorName !!} = ace.edit("{!! '_ed_'.$id !!}");
// DEFINE DEFAULTS
{!! $editorName !!}.setTheme("ace/theme/dreamweaver");
{!! $editorName !!}.setFontSize(11);
{!! $editorName !!}.setShowPrintMargin(false);
{!! $editorName !!}.getSession().setUseSoftTabs(true);
{!! $editorName !!}.getSession().setUseWrapMode(true);
{!! $editorName !!}.setHighlightActiveLine(true);
{!! $editorName !!}.setHighlightGutterLine(true);
{!! $editorName !!}.setHighlightSelectedWord(true);
{!! $editorName !!}.setDisplayIndentGuides(false);
{!! $editorName !!}.setShowInvisibles(false);
{!! $editorName !!}.setShowFoldWidgets(true);
{!! $editorName !!}.setFadeFoldWidgets(true);
// USER DEFINED
@if (isset($language) && $language != '')
{!! $editorName !!}.getSession().setMode("{!! 'ace/mode/'.strtolower($language) !!}");
@else
{!! $editorName !!}.getSession().setMode("ace/mode/plain_text");
@endif
@if (isset($readonly) && $readonly == 'readonly') {
{!! $editorName !!}.setReadOnly(true);
@endif
// LANGUAGE MODE SELECTOR
$("{!! '#'.$id.'_mode' !!}").bind("change", function(e) {
  e.preventDefault;
  {!! $editorName !!}.getSession().setMode("ace/mode/"+$(this).val());
});
// INVISIBLES SELECT
$("{!! '#showInvisibles_'.$id !!}").bind("click", function(e) {
  e.preventDefault;
  var current = {!! $editorName !!}.getShowInvisibles();
  {!! $editorName !!}.setShowInvisibles(!current);
  if (!current) {
    $(this).addClass("active");
  } else {
    $(this).removeClass("active");
  };
});
// INDENTS SELECT
$("{!! '#showIndents_'.$id !!}").bind("click", function(e) {
  e.preventDefault;
  var current = {!! $editorName !!}.getDisplayIndentGuides();
  {!! $editorName !!}.setDisplayIndentGuides(!current);
  if (!current) {
    $(this).addClass("active");
  } else {
    $(this).removeClass("active");
  };
});
// FORCE UPDATE OF FIELD
{!! $editorName !!}.getSession().on("change", function(e) {
  $("{!! '#'.$id !!}").val({!! $editorName !!}.getValue());
  });
