@extends('layout.main')
   @section('content')  
              <div class="Polaris-Frame__Content">
         
  <div class="Polaris-Page">
    <div class="Polaris-Page-Header Polaris-Page-Header--isSingleRow Polaris-Page-Header--mobileView Polaris-Page-Header--noBreadcrumbs Polaris-Page-Header--mediumTitle">
      <div class="Polaris-Page-Header__Row">
        <div class="Polaris-Page-Header__TitleWrapper">
          <div>
            <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
              <h1 class="Polaris-Header-Title">User Details</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Polaris-Page__Content">
      <div class="Polaris-Card">
        <div class="">
          <div class="Polaris-DataTable__Navigation"><button class="Polaris-Button Polaris-Button--disabled Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table left one column" type="button" disabled=""><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><span class="Polaris-VisuallyHidden"></span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                      <path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16z"></path>
                    </svg></span></span></span></button><button class="Polaris-Button Polaris-Button--plain Polaris-Button--iconOnly" aria-label="Scroll table right one column" type="button"><span class="Polaris-Button__Content"><span class="Polaris-Button__Icon"><span class="Polaris-Icon"><span class="Polaris-VisuallyHidden"></span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                      <path d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16z"></path>
                    </svg></span></span></span></button></div>
          <div class="Polaris-DataTable">
            <div class="Polaris-DataTable__ScrollContainer">
              <table class="Polaris-DataTable__Table">
                <thead>
                     
                  <tr >
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">#Id</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Email</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Marketing Audience</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Issue Date</th>
                
                  </tr>
             
                </thead>
                <tbody>
              
               @foreach($customer_list_get as $customer)
                  <tr  class="Polaris-DataTable__TableRow Polaris-DataTable--hoverable">
                    <th class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn" scope="row">{{$customer->customer_id}}</th>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">{{$customer->email}}</td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">{{$customer->accept_merketing}}</td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric">{{$customer->created_at}}</td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="PolarisPortalsContainer"></div>
</div>
              </div>
              
              
@endsection          