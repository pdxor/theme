@php $sdssheets = Archive::sdssheets(get_the_id()) @endphp
<section class="product-tabs" id="product-tabs">
  <!-- Nav tabs -->
<ul class="nav nav-tabs tabs-left tabs-part-data" role="tablist">
  <li class="nav-item"><a class="nav-link {{ $tabs['metric_active'] }}" href="#metric{{ get_the_id() }}" role="tab" data-toggle="tab">{!! __('metric') !!}</a></li>
  <li class="nav-item"><a class="nav-link {{ $tabs['us_active'] }}" href="#us{{ get_the_id() }}" role="tab" data-toggle="tab">{!! __('us') !!}</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade {{ $tabs['metric_active'] }}" id="metric{{ get_the_id() }}">
      <table class="table table-striped table-sm rwd-table">
        @include('partials/products/tabs/table-thead')

          @if( have_rows('package') )
            @while ( have_rows('package') )
              @php(the_row())
              <tr>
                <td data-th="{!! __('Part Number', 'microcare_theme') !!}">{!! the_sub_field('part_number_prefix') !!}-{!! the_sub_field('part_number') !!}</td>
                <!-- <td><?php the_sub_field('description'); ?></td> -->
                <td data-th="{!! __('Package', 'microcare_theme') !!}">{!! the_sub_field('package_description') !!}</td>
                <td data-th="{!! __('Weight', 'microcare_theme') !!}">{!! the_sub_field('weight_metric') !!}</td>
                <td data-th="{!! __('Size', 'microcare_theme') !!}">{!! the_sub_field('size_metric') !!}</td>
                <td data-th="{!! __('Tech Sheet', 'microcare_theme') !!}" class="text-center">
                    <?php /*
                      if( get_field('tech_sheets') ) { ?><a class="btn btn-default btn-xs" href="<?php echo wp_get_attachment_url( get_field('tech_sheets') ); ?>" ><i class="fa fa-cloud-download"></i><span class="hidden-sm"> Download</span></a><?php }
                    */ ?>

                    {!! Archive::techsheetbutton() !!}

                </td>
                <td data-th="{!! __('Safety Data Sheets', 'microcare_theme') !!}" class="text-center">
                  @foreach($sdssheets as $package => $sheets)
                    @if($package == strtoupper(get_sub_field('package_type')) && count($sheets) >= 1)
                      <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdown{!! $package !!}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-cloud-download"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                          @foreach($sheets as $sheet)
                            @if($sheet['exists'])
                              <a class="dropdown-item" href="{{ $sheet['link'] }}">{{ $sheet['lang'] }}</a>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    @endif
                  @endforeach

                </td>
              </tr>
                    @endwhile
                @endif

      </table>
  </div>
  <div class="tab-pane fade {{ $tabs['us_active'] }}" id="us{{ get_the_id() }}">
      <table class="table table-striped table-sm rwd-table">
        @include('partials/products/tabs/table-thead')

            @if( have_rows('package') )
              @while ( have_rows('package') )
                @php(the_row())
                <tr>
                  <td data-th="{!! __('Part Number', 'microcare_theme') !!}">{!! the_sub_field('part_number_prefix') !!}-{!! the_sub_field('part_number') !!}</td>
                  <!-- <td><?php the_sub_field('description'); ?></td> -->
                  <td data-th="{!! __('Package', 'microcare_theme') !!}">{!! the_sub_field('package_description') !!}</td>
                  <td data-th="{!! __('Weight', 'microcare_theme') !!}">{!! the_sub_field('weight_us') !!}</td>
                  <td data-th="{!! __('Size', 'microcare_theme') !!}">{!! the_sub_field('size_us') !!}</td>
                  <td data-th="{!! __('Tech Sheet', 'microcare_theme') !!}" class="text-center">																			<?php /*
                      if( get_field('tech_sheets') ) { ?><a class="btn btn-default btn-xs" href="<?php echo wp_get_attachment_url( get_field('tech_sheets') ); ?>" ><i class="fa fa-cloud-download"></i><span class="hidden-sm"> Download</span></a><?php }
                    */ ?>

                    {!! Archive::techsheetbutton() !!}

                </td>
                <td data-th="<?php _e('Safety Data Sheets', 'microcare_theme'); ?>" class="text-center">

                  @foreach($sdssheets as $package => $sheets)
                    @if($package == strtoupper(get_sub_field('package_type')) && count($sheets) >= 1)
                      <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdown{!! $package !!}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-cloud-download"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                          @foreach($sheets as $sheet)
                            @if($sheet['exists'])
                              <a class="dropdown-item" href="{{ $sheet['link'] }}">{{ $sheet['lang'] }}</a>
                            @endif
                          @endforeach
                        </div>
                      </div>
                    @endif
                  @endforeach

                </td>
              </tr>
                    @endwhile
                @endif
      </table>
  </div>
</div>
</section>
