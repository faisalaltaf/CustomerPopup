@extends('layout.main')
@section('content')
<div class="Polaris-Frame__Content">
  <form id="data_form" class="Polaris-Page" enctype="multipart/form-data">
    @csrf
    <div class="Polaris-Layout">
      <a id="SkipToContentTarget" tabindex="-1"></a>

      <!-------pop up background color change---->

      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading" id="Heading">Pop Up background </h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Change your pop up background.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">


                    <!------color picker---->

                    <div class="color_pic">
                      <input type="color" id="head" name="head_background" value="{{$setting->head_background}}">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----- logo img-->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading">Logo</h2>
              <p>Customize the style of your Logo.</p>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-SettingAction">
                  <div class="Polaris-SettingAction__Setting">
                    Upload your store’s logo, change colors and fonts, and
                    more.
                  </div>
                  <div class="Polaris-SettingAction__Action">
                    <button type="button" class="Polaris-Button Polaris-Button--primary">
                      <input type="file" name="file_name" accept="image/png/*">
                      <span class="Polaris-Button__Content"><span>Upload logo</span></span>

                      <img width="100px" height="100px" class="popup-logo" src="https://customerpup.discountly.app/images/{{$setting->file_path}}" alt="">

                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!------heading---->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading" id="Heading">Heading</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Enter your Heading ,Change Font family and color.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <!------input field---->
                    <div class="">
                      <div class="Polaris-Labelled__LabelWrapper">
                        <div class="Polaris-Label"><label id="PolarisTextField1Label" for="PolarisTextField1" class="Polaris-Label__Text">Heading</label></div>
                      </div>
                      <div class="Polaris-Connected">
                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                          <div class="Polaris-TextField Polaris-TextField--hasValue">
                            <input id="PolarisTextField1" name="top_heading" class="Polaris-TextField__Input" type="Text" aria-labelledby="PolarisTextField1Label" aria-invalid="false" value="{{$setting->top_heading}}">
                            <div class="Polaris-TextField__Backdrop"></div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div>


                      <!------ start heading color picker---->
                      <div style='display:flex'>
                      <div style="display:flex;">
                        <div class="color_pic" style="padding-top:38px;">
                          <label id="PolarisSelect2Label" for="PolarisSelect2" style="padding-bottom:5px" class="Polaris-Label__Text">Heading Color</label>
                          <input type="color" id="head" name="top_heading_color" value="{{$setting->top_heading_color}}">
                        </div>
                      </div>
                                     <!-----select duration---->
                      <div style="padding-left:25px; padding-top:34px;">
                        <div class="Polaris-Labelled__LabelWrapper">
                          <!---<div class="Polaris-Label"><label id="PolarisSelect2Label" for="PolarisSelect2" class="Polaris-Label__Text">Select Size</label></div>-->
                        </div>
                        <div class="Polaris-Labelled__LabelWrapper">
                          <div class="Polaris-Label"><label id="PolarisSelect2Label" for="PolarisSelect2" class="Polaris-Label__Text">Font Family</label></div>
                        </div>
                        <div class="row columns two" >
                          <select name="top_heading_font" class="">
                            <option {{$setting->top_heading_font =='Halveta' ? 'selected' : ''}} value="Halveta">Halveta</option>
                            <option {{$setting->top_heading_font =='Rallway' ? 'selected' : ''}} value="Rallway">Rallway</option>
                            <option {{$setting->top_heading_font =='Sarif' ? 'selected' : ''}} value="Sarif">Sarif</option>
                          </select>
                        </div>


                      </div>
                      <div id="PolarisPortalsContainer">
                      </div>
                    </div>
                    </div>
                    <!------ end heading color picker---->
                     


                      
                  


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-----List items-->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading">List Items</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Enter your list item text,Change Font family and color.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <div class="">
                      <div class="Polaris-Labelled__LabelWrapper">
                        <div class="Polaris-Label">
                          <label id="PolarisTextField2Label" for="PolarisTextField2" class="Polaris-Label__Text">List Items</label>
                        </div>
                      </div>
                      <div class="Polaris-Connected">
                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                          <div class="Polaris-TextField Polaris-TextField--hasValue">
                            <input id="PolarisTextField2" name="list_items" autocomplete="New sales every day" class="Polaris-TextField__Input" type="" aria-labelledby="PolarisTextField2Label" aria-invalid="false" value="{{$setting->list_item}}">
                            <div class="Polaris-TextField__Backdrop"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <!------ list_items_color color picker---->
                      <div style='display:flex'>
                      <div class="color_pic" style="padding-top:29px">
                        <label style="padding-bottom:5px" id="PolarisSelect2Label" for="PolarisSelect2" class="Polaris-Label__Text">List Items Color</label>
                        <input type="color" id="head" name="list_items_color" value="{{$setting->list_items_color}}">
                      </div>
                       <!------end list_items_color color picker---->
                       
                       <!-----select duration list_items_font---->
                       <div>
                        <div class="Polaris-Labelled__LabelWrapper" style="padding-top:29px; padding-left:20px">
                          <div class="Polaris-Label"><label id="PolarisSelect2Label" for="PolarisSelect2" class="Polaris-Label__Text">Font Family</label></div>
                        </div>
                        <div class="row columns two" style="padding-left:20px" >
                          
                          <select name="list_items_font" class="">
                            <option {{$setting->list_items_font =='Halveta' ? 'selected' : ''}} value="Halveta">Halveta</option>
                            <option {{$setting->list_items_font =='Rallway' ? 'selected' : ''}} value="Rallway">Rallway</option>
                            <option {{$setting->list_items_font =='Sarif' ? 'selected' : ''}} value="Sarif">Sarif</option>
                          </select>
                        </div>
                        <div>
                        </div>
                      </div>
                      <div id="PolarisPortalsContainer">
                      </div>
                    </div>
                      <!----- end select duration list_items_font---->

                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-----Email-->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading">Email</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Enter your Email Address.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <div class="">
                      <div class="Polaris-Labelled__LabelWrapper">
                        <div class="Polaris-Label"><label id="PolarisTextField3Label" for="PolarisTextField3" class="Polaris-Label__Text">Email</label></div>
                      </div>
                      <div class="Polaris-Connected">
                        <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                          <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="PolarisTextField2" name="email" class="Polaris-TextField__Input" type="text" aria-labelledby="PolarisTextField3Label" aria-invalid="false" value="{{$setting->email}}">
                            <div class="Polaris-TextField__Backdrop"></div>
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

      <!-----button text----->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading">Button Text and Background color</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Enter your Button Text and change background color.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <div>
                      <div class="" style="width: 100%;">
                        <div class="Polaris-Labelled__LabelWrapper">
                          <div class="Polaris-Label"><label id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Button</label></div>
                        </div>
                        <div class="Polaris-Connected">
                          <div class="Polaris-Connected__Item Polaris-Connected__Item--primary">
                            <div class="Polaris-TextField Polaris-TextField--hasValue">
                              <input id="PolarisTextField4" autocomplete="Enter Heading" name="button" class="Polaris-TextField__Input" type=" " aria-labelledby="PolarisTextField4Label" aria-invalid="false" value="{{$setting->button}}">
                              <div class="Polaris-TextField__Backdrop"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!------color picker---->

                      <div class="color_pic1" style="padding-top:20px">
                        <label style="padding-bottom:5px" id="PolarisTextField4Label" for="PolarisTextField4" class="Polaris-Label__Text">Button Color</label>
                        <input type="color" id="head" name="button_color" value="{{$setting->button_colors}}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!----- Pop Up Pages-->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading">Pop Up pages</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Select the page on show Pop Up.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <!----tag code-->
                    <select name="tags_shop[]" class="form-control" multiple="multiple">

                      <?php $tags_shop = json_decode($setting->tags_shop);

                      ?>

                      @foreach($pages as $page)


                      <option {{ in_array($page['id'], $tags_shop) == $page['id']  ? 'selected' : ''}} value="{{$page['id']}}">{{$page['handle']}} </option>

                      @endforeach
                    </select>
                    <div>
                      <span class="Polaris-Tag"><span title="Wholesale" class="Polaris-Tag__TagText">Cart Page</span></span>
                      <span class="Polaris-Tag"><span title="Wholesale" class="Polaris-Tag__TagText">Product Page</span></span>
                      <span class="Polaris-Tag"><span title="Wholesale" class="Polaris-Tag__TagText">Home Page</span></span>
                      <span class="Polaris-Tag"><span title="Wholesale" class="Polaris-Tag__TagText">Checkout Page</span></span>
                      <div id="PolarisPortalsContainer">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-----Re show pop up duration-->
      <div class="Polaris-Layout__AnnotatedSection">
        <div class="Polaris-Layout__AnnotationWrapper">
          <div class="Polaris-Layout__Annotation">
            <div class="Polaris-TextContainer">
              <h2 class="Polaris-Heading"> Pop Up duration</h2>
              <div class="Polaris-Layout__AnnotationDescription">
                <p>Reshow pop up duration.</p>
              </div>
            </div>
          </div>
          <div class="Polaris-Layout__AnnotationContent">
            <div class="Polaris-Card">
              <div class="Polaris-Card__Section">
                <div class="Polaris-FormLayout">
                  <div class="Polaris-FormLayout__Item">
                    <!-----select duration---->
                    <div>
                      <div class="">
                        <div class="Polaris-Labelled__LabelWrapper">
                          <div class="Polaris-Label"><label id="PolarisSelect2Label" for="PolarisSelect2" class="Polaris-Label__Text">Select Duration</label></div>
                        </div>
                        
                      </div>
                      <div class="row columns two">
                          <select name="weekday" class="">
                            <option {{$setting->weekday =='7' ? 'selected' : ''}} value="7">One Week</option>
                            <option {{$setting->weekday =='14' ? 'selected' : ''}} value="14">Two Week</option>
                            <option {{$setting->weekday =='21' ? 'selected' : ''}} value="21">Three Week</option>
                            <option {{$setting->weekday =='35' ? 'selected' : ''}} value="35">One Weel</option>
                            <option {{$setting->weekday =='70' ? 'selected' : ''}} value="70">Forever</option>
                          </select>
                        </div>
                      <div id="PolarisPortalsContainer"></div>
                    </div>
                    <div id="PolarisPortalsContainer"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <!--------button-->
    <!----- <div style="width:27%;">
                             <button class="Polaris-Button Polaris-Button--primary" type="button" style="margin:40px 0px 0px 0px;">
                               <span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Submit</span></span></button>
                            <div id="PolarisPortalsContainer"></div>
                          </div>--->

    <!----- submit button-->


    <div class="Polaris-Layout__AnnotatedSection">
      <div class="Polaris-Layout__AnnotationWrapper">



      </div>
      <div class="Polaris-Layout__AnnotationContent">
        <button type="submit" class="Polaris-Button Polaris-Button--primary submit_btn">
          <span class="Polaris-Button__Content "><span>Submit</span></span>
        </button>
      </div>
    </div>
</div>


</form>



</div>





@endsection