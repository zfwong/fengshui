@extends('layouts.app')

@section('content')
<div class="bz-card">
  <div class="card">
    <div class="card-body">
      <div class="row flex-row align-items-stretch">
        <!-- Row 1 -->
        <div class="d-flex flex-column col-lg-4 col-md-4" style="padding-right:2px;">
          <!-- Col 1 -->
          <div class="card">
            <img class="card-img-top px-5 pt-0" src="/images/logo.png" alt="Card image cap">
            <div class="card-body text-center">
              <h2 class="card-title m-0 bz-title"><strong>Personal Destiny</strong></h5>
              <h5 class="card-title m-0">by</h5>
              <h5 class="card-title m-0">Fredmum Leong</h5>
            </div>
          </div>

          <!-- Col 2 -->
          <div class="card">
            <div class="card-header">{{ $data['title']['personal_info'] }}</div>
            <div class="card-body">
              <div class="d-flex flex-column">
                <div>
                  <span>{{ $data['title']['user_detail']['name'] }}: {{ $data['user'][1] }}<span>
                </div>
                <div>
                  <span>{{ $data['title']['user_detail']['dob'] }}: {{ date('d F Y H:i A', strtotime($data['user'][3])) }}<span>
                </div>
                <div>
                  <span>{{ $data['title']['user_detail']['nl_dob'] }}: {{ $data['gz_year_str'] }}{{ $data['nl_month'] }}{{ $data['nl_day'] }} ({{ $data['nl_time'] }})<span><br/>
                </div>
                <div>
                  <span>{{ $data['title']['user_detail']['sex'] }}: {{ $data['title']['user_detail'][$data['user'][4]] }}<span><br/>
                </div>
                <div>
                  <span>{{ $data['title']['user_detail']['email'] }}: {{ $data['user'][2] }}<span>
                </div>
              </div>
            </div>
          </div>
          <!-- Col 3 -->
          <div class="card">
            <div class="card-header">{{ $data['title']['wxsx'] }}: {{ $data['wu_xing'] }}</div>
            <div class="card-body">
              <div class="d-flex">
                <div><span>{{ $data['wu_xing_detail'] }}</span></div>
              </div>
            </div>
          </div>

          <!-- Col 4 -->
          <div class="card">
            <div class="card-header">{{ $data['title']['product'] }}</div>
            <div class="card-body">
              <div class="d-flex flex-column">
                <div><span>1. Product 1</span></div>
                <div><span>2. Product 1</span></div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Row 2 -->
        <div class="d-flex flex-column col-lg-8 col-md-8" style="padding-left:0;">
          <!-- Col 1 -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column">
                <div>
                  <span>{{ $data['title']['company_detail']['website'] }}: www.fredmanleong.com</span>
                </div>
                <div>
                  <span>{{ $data['title']['company_detail']['contact'] }} (WhatsApp): 012-9685437</span>
                </div>
                <div>
                  <span>{{ $data['title']['user_detail']['email'] }}: fredmunconsult@gmail.com</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Col 2 -->
          <div class="card">
            <div class="card-header text-center" style="border-bottom:none;">{{ $data['title']['bzmp'] }}</div>
                <table style="width: 100%;">
                  <tr>
                    <th class="bz-header"></th>
                    <th class="bz-header text-center">{{ $data['title']['year'] }}Year</th>
                    <th class="bz-header text-center">{{ $data['title']['month'] }}Month</th>
                    <th class="bz-header text-center">{{ $data['title']['day'] }}Day</th>
                    <th class="bz-header text-center">{{ $data['title']['time'] }}Time</th>
                  </tr>
                  <tr>
                    <td class="bz-header">{{ $data['title']['tg'] }}</td>
                    <td>{{ $data['gz_year'] }}</td>
                    <td>{{ $data['gz_month'] }}</td>
                    <td>{{ $data['gz_day'] }}</td>
                    <td>{{ $data['gz_time'] }}</td>
                  </tr>
                  <tr>
                    <td class="bz-header">{{ $data['title']['dz'] }}</td>
                    <td>{{ $data['gz_year'] }}</td>
                    <td>{{ $data['gz_month'] }}</td>
                    <td>{{ $data['gz_day'] }}</td>
                    <td>{{ $data['gz_time'] }}</td>
                  </tr>
                  <tr>
                    <td class="bz-header">{{ $data['title']['cg'] }}</td>
                    <td>@foreach ($data['cg_year'] as $d){{ $d }}@endforeach</td>
                    <td>@foreach ($data['cg_month'] as $d){{ $d }}@endforeach</td>
                    <td>@foreach ($data['cg_day'] as $d){{ $d }}@endforeach</td>
                    <td>@foreach ($data['cg_time'] as $d){{ $d }}@endforeach</td>
                  </tr>
                </table>
          </div>

          <!-- Col 3 -->
          <div class="d-flex flex-row">
            <!-- Row 1 -->
            <div class="d-flex flex-column">

              <!-- Col 1 -->
              <div class="card">
                <div class="card-header">{{ $data['xing_zuo'][0] }}</div>
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div>
                      <span><strong>{{ $data['title']['feeling'] }}: </strong>{{ $data['xing_zuo'][3] }}</span>
                    </div>
                    <br>
                    <div>
                      <span><strong>{{ $data['title']['personality'] }}: </strong>{{ $data['xing_zuo'][4] }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Col 2 -->
              <div class="card">
                <div class="card-header">{{ $data['title']['cgg'] }}: ({{ $data['cheng_gu_ge_weight'] }})</div>
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div>
                      <span>{{ $data['cheng_gu_ge_detail'] }}<span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Row 2 -->
            <div class="d-flex flex-column">
              <!-- Col 1-->
              <div class="card">
                <div class="card-header">{{ $data['title']['career'] }}</div>
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div>
                      <span>{{ $data['shi_ye'][0] }}</span>
                    </div>
                    <div>
                      <span>{{ $data['shi_ye'][1] }}</span>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Col 2-->
              <div class="card">
                <div class="card-header text-center">{{ $data['title']['strong'] }}</div>
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div>
                      <span>{{ $data['qiang_ruo'][0] }}<span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Col 3-->
              <div class="card">
                <div class="card-header text-center">{{ $data['title']['weak'] }}</div>
                <div class="card-body">
                  <div class="d-flex flex-column">
                    <div>
                      <span>{{ $data['qiang_ruo'][1] }}<span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection