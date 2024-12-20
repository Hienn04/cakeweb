<?php
$link_limit = 7; // maximum number buttons
?>

@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ $paginator->currentPage() == 1 ? ' disabled' : '' }}">
            <a class="page-link" href="javascript:searchProductMenu(1)" style="">Trước</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
                $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="page-item {{ $paginator->currentPage() == $i ? ' active' : '' }}">
                    <a style="" class="page-link" href="javascript:searchProductMenu({{ $i }})">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="page-link" href="javascript:searchProductMenu({{ $paginator->lastPage() }})">Sau</a>
        </li>
    </ul>
@endif
