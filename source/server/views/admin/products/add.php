<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>
<?php

?>
<?php vendor_html_helper::contentheader('Products <small>management</small>', [
  [
    'title' =>  'Index Products',
    'urlp' => ['ctl' => $app['ctl']]
  ],
  ['urlp'  =>  ['ctl' => $app['ctl'], 'act' => $app['act']]]
]); ?>

<section class="content">
  <?php
  include_once 'views/admin/products/_form.php';
  ?>
  <script>
    function templ(name, html) {
      temp = '';
      temp += `
			<div class="form-group row ${name}">
							<label class="control-label col-md-3" for="categories_name">Category child</label>
							<div class="controls col-md-7">
								<select name="${name}" id="${name}" class="form-control select2 w-p100"> <option value ='0'>None</option> >`;
      temp += html;
      temp += `				</select>
							</div>
						</div>
		`;
      return temp;
    }
    $(document).ready(function() {
      let dataCat = <?php echo $this->recordsCategories; ?>;
      console.log((dataCat));
      let html2 = html3 = html4 = tmp = '';
      let level1 = $("#category1").val();

      $('#category1').on('change', function() {
        $('.category2').remove();
        $('.category3').remove();
        $('.category4').remove();
        let html2 = '';
        let level1 = $(this).val();
        dataCat.map((value, key) => {
          if (parseInt(value['parentId']) == parseInt(level1)) {
            html2 += `<option value="${value['id']}" >${value['categoryName']}</option>`;
          } else {

          }
        });
        tmp = templ('category2', html2);
        $('#appendCat1').append(tmp);
      })
      $(document).on('change', '#category2', function() {
        $('.category3').remove();
        $('.category4').remove();
        let html3 = '';
        let level2 = $(this).val();
        if (parseInt(level2) == 0) {
          $('.category3').remove();
          $('.category4').remove();
        }
        dataCat.map((value, key) => {
          if (parseInt(value['parentId']) == parseInt(level2)) {
            html3 += `<option value="${value['id']}" >${value['categoryName']}</option>`;
          } else {

          }
        });
        tmp = templ('category3', html3);
        $('#appendCat2').append(tmp);

      })
      $(document).on('change', '#category3', function() {
        $('.category4').remove();
        let html4 = '';
        let level3 = $(this).val();
        if (parseInt(level3) == 0) {
          $('.category4').remove();
        }
        dataCat.map((value, key) => {

          if (parseInt(value['parentId']) == parseInt(level3)) {

            html4 += `<option value="${value['id']}" >${value['categoryName']}</option>`;
          } else {

          }
        });
        tmp = templ('category4', html4);
        $('#appendCat3').append(tmp);

      })
    });
  </script>
  <script type="text/javascript">
    CKEDITOR.replace('editor1', {});
    CKEDITOR.config.baseFloatZIndex = 100001;
  </script>

</section>

</div>
<!-- /.box -->
<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>