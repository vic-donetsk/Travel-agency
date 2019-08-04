@if ($paginationPages)
	<div class="pagination">
		{{--<div class="pagination_elem mod_prev"> <i class="fas fa-angle-left"> </i></div>
		<div class="pagination_elem pagination_active"> 1 </div>
		<div class="pagination_interval"> ... </div>
		<div class="pagination_elem pagination_active"> 77 </div>
		<div class="pagination_interval"> ... </div>
		<div class="pagination_elem"> 1578 </div>
		<div class="pagination_elem mod_next"> <i class="fas fa-angle-right"> </i></div>--}}

		<script>
			let paginationPages = {{$paginationPages}}
			let currentPage = {{$currentPage}}
		</script>
	</div>
@endif

