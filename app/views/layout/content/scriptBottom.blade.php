<script src="{{ asset('asset/vendor/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap-3.2.0-dist/js/bootstrap3-2-0.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script src="{{ asset('asset/js/chosen.jquery.js') }}"></script>
<script src="{{ asset('asset/js/nprogress.js') }}"></script>
<script type="text/javascript">
var config = {
  '.chosen-select'           : {},
  '.chosen-select-deselect'  : {allow_single_deselect:true},
  '.chosen-select-no-single' : {disable_search_threshold:10},
  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
  '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
  $(selector).chosen(config[selector]);
}
NProgress.start();
$(window).load(function() {
  setTimeout(function() { NProgress.done(); }, 500);
  //NProgress.done();
});
</script>
