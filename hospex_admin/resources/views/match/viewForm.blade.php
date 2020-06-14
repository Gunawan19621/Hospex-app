<form id="approve{{ $match }}" action="matches/{{ $match }}/approve" method="POST" style="display: none;">
    @method('patch')
    @csrf
    {{-- <input type="hidden" name="_token" value="{{ $csrf }}"> --}}
   </form>
   <a href="javascript::void(0);" class="btn btn-sm btn-outline-success m-btn m-btn--icon m-btn--pill" onclick="event.preventDefault();
   document.getElementById('approve{{ $match }}').submit();">
       <span>
           <i class="fa fa-calendar-check-o"></i><span>Approve</span>
       </span>
   </a>