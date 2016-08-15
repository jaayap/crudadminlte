<?php

  // \_e::pre( $paginator->count() );
  // \_e::pre( $paginator->currentPage() );
  // \_e::pre( $paginator->hasMorePages() );
  // \_e::pre( $paginator->lastPage() );
  // \_e::pre( $paginator->nextPageUrl() );
  // \_e::pre( $paginator->perPage() );
  // \_e::pre( $paginator->previousPageUrl() );
  // \_e::pre( $paginator->total() );
  // \_e::pre( $paginator->url(1) );

?>

@if ($paginator->lastPage() > 1)
<div class="btn-group btn-group-sm btn-flat">
  @if ($paginator->currentPage() != 1 && $paginator->lastPage() >= 7)
    <a href="{{ $paginator->previousPageUrl() }}" type="button" class="btn btn-default">Prev.</a>
  @endif
  @if ($paginator->currentPage() >= 5)
    <a href="{{ $paginator->url(1) }}" type="button" class="btn btn-default">1</a>
  @endif
  @if ($paginator->currentPage() >= 6)
    <a href="{{ $paginator->url(2) }}" type="button" class="btn btn-default">2</a>
  @endif
  @if ($paginator->currentPage() >= 7)
    <a href="#" type="button" class="btn btn-default disabled">...</a>
  @endif
  @for($i = max($paginator->currentPage()-3, 1); $i <= min(max($paginator->currentPage()-3, 1)+6,$paginator->lastPage()); $i++)
    <a href="{{ $paginator->url($i) }}" type="button" class="btn btn-default {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">{{ $i }}</a>
  @endfor
  @if ($paginator->currentPage() <= ($paginator->lastPage() - 6))
    <a href="#" type="button" class="btn btn-default disabled">...</a>
  @endif
  @if ($paginator->currentPage() <= ($paginator->lastPage() - 5))
    <a href="{{ $paginator->url( $paginator->lastPage()-1 ) }}" type="button" class="btn btn-default">{{ $paginator->lastPage()-1 }}</a>
  @endif
  @if ($paginator->currentPage() <= ($paginator->lastPage() - 4))
    <a href="{{ $paginator->url( $paginator->lastPage() ) }}" type="button" class="btn btn-default">{{ $paginator->lastPage() }}</a>
  @endif
  @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() >= 7)
    <a href="{{ $paginator->nextPageUrl() }}" type="button" class="btn btn-default">Next</a>
  @endif

  <a type="button" class="btn btn-default disabled">
    Page {{ $paginator->currentPage().' of '.$paginator->lastPage() }}
  </a>

  @define $perpage	= $paginator->perPage();
  @define $pageArr	= array(10,20,50,100,200);
  @define $langPP   = trans('crudadminlte::crud.general.resultspp');

  <div id="_displayOption" class="btn-group btn-group-sm dropup" style="cursor:pointer !important;">
    <a id="_displayOptionBtn" href="#" type="button" class="btn btn-default" style="cursor:pointer !important; background-color: #fff; border-color: #ccc;">
      {{ ($perpage == '99999999999999') ? 'All results' : $perpage.' '.$langPP }}
    </a>
    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
    @define $x = 1;
    @foreach ($pageArr as $_p)
      <li @if($perpage == $_p) class="active" @endif>
        <a href="{{ url(Request::url().'/?perPage='.$_p.'') }}">
          {{ $_p.' '.( ($x == 1) ? $langPP : '' ) }}
        </a>
      </li>
      @define $x++;
    @endforeach
    <li class="divider"></li>
    <li {{ ($perpage == '99999999999999') ? ' class="active"' : '' }} >
      <a href="{{ Request::url().'/?perPage=all' }}">View all</a>
    </li>
    </ul>
  </div>

</div>
@endif
