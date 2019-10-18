<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/table.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<?php
global $app;
?>
<script type="text/javascript">
    var norecords = parseInt(<?php echo $this->records['norecords']; ?>);
    var nocurp = parseInt(<?php echo $this->records['nocurp']; ?>);
    var curp = parseInt(<?php echo $this->records['curp']; ?>);
    var nopp = parseInt(<?php echo $this->records['nopp']; ?>);
</script>

<?php vendor_html_helper::contentheader('Categories <small>management</small>', [['urlp' => ['ctl' => $app['ctl'], 'act' => $app['act']]]]); ?>

<br />
<section class="content-header">

    <div class="row categories-management">
        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level level-1" level="1">
            </ul>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level level-2" level="2">
            </ul>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level level-3" level="3">
            </ul>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
            <ul class="level level-4" level="4">
            </ul>
        </div>
    </div>
    <div class="row categories-management">
        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level" level="1">
                <button type="button" class="btn btn-add btn-block btn-success" level='1' data-toggle="modal" data-target="#myModal">Add category</button>

            </ul>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level level2-btn" level="2">
            </ul>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12 bd-r">
            <ul class="level level3-btn" level="3">
            </ul>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12">
            <ul class="level level4-btn" level="4">
            </ul>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title text-center">Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <label for="">Level <span class="level-number"></span></label>
                            </div>
                        </div>

                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <label for="">Category name (*): </label>
                                <input class="form-control" type="text" name="name" placeholder="Name" data-validation="length alphanumeric" data-validation-length="min3" required />
                                <span style="display:none" class="error_cate">Category name is required!</span>
                            </div>
                        </div>
                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <label for="">Ranking No (*): </label>
                                <input class="form-control" type="number" name="ranking" placeholder="" value="0" data-validation="length alphanumeric" data-validation-length="min3" required />
                            </div>
                        </div>

                        <div class="col-12 ta-center">
                            <div class="btn-150">
                                <button id="btn-submit" class="btn btn-block btn-rounded btn-success btn-lg">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<br />
</div>
<script src="<?php echo RootREL; ?>media/libs/bootstrap/js/checkbox-x.min.js"></script>
<script src="<?php echo RootREL; ?>media/admin/js/records_table.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    var level1 = <?php echo json_encode($this->level1) ?>;
    var level2 = <?php echo json_encode($this->level2) ?>;
    var level3 = <?php echo json_encode($this->level3) ?>;
    var level4 = <?php echo json_encode($this->level4) ?>;

    var categoriesData = {
        'level1': level1 ? level1 : [],
        'level2': level2 ? level2 : [],
        'level3': level3 ? level3 : [],
        'level4': level4 ? level4 : [],
    };
    var idLevel1Active = '';
    var idLevel2Active = '';
    var idLevel3Active = '';
    var isAdd = false;

    var _id = null;
    var _level = null;
    var _idParent = null;
    var _rankingNo = null;
    var _name = null;
</script>
<script>
    $(document).ready(function() {
        init();

        function updateCate(level, _id, categoryName, rankingNo) {
            categoriesData[level] && categoriesData[level].map(val => {
                if (val.id == _id) {
                    val.categoryName = categoryName;
                    val.rankingNo = rankingNo;
                }
            });
        }

        function delCate(level, lev, _id, _idParent) {
            categoriesData[level] && categoriesData[level].map((val, key) => {
                if (val.id == _id) {
                    categoriesData[level].splice(key, 1);
                }
            });
            $(`.level${Number(lev) + 1}-btn`).empty();
            let haschild = categoriesData[level] && categoriesData[level].filter(item2 => {
                if (item2.parentId == _idParent) return true;
                return false;
            })[0] ? true : false;

            if (!haschild && _idParent != '') {
                $(`#${_idParent}`).removeClass('haschild');
                $(`#${_idParent}`).append('<span class="delete">X</span>');
            }
        }

        function init() {
            let html = '';
            categoriesData.level1 && categoriesData.level1.map(item => {
                let haschild = categoriesData.level2 && categoriesData.level2.filter(item2 => {
                    if (item2.parentId === item.id) return true;
                    return false;
                })[0] ? true : false;
                html += `
                    <li class="${haschild?'haschild':''}" id="${item.id}" level='1'>
                        <span class="cate_name">${item.categoryName}</span>
                        <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" level='1' data-toggle="modal" data-target="#myModal">Edit</span>
                        ${haschild?'':'<span class="delete">X</span>'}
                    </li>
                `;
            })
            $('.level-1').append(html);
        }
        $('.level-1').on('click', 'li', function() {
            idLevel1Active = $(this).attr('id');
            $('.level-1 li').removeClass('active');
            $(this).addClass('active');

            $('.level-2').html('');
            $('.level-3').html('');
            $('.level-4').html('');
            $('.level2-btn').html('');
            $('.level3-btn').html('');
            $('.level4-btn').html('');
            let html = '';
            categoriesData.level2 && categoriesData.level2.map(item => {
                if (item.parentId === idLevel1Active) {
                    let haschild = categoriesData.level3 && categoriesData.level3.filter(item2 => {
                        if (item2.parentId === item.id) return true;
                        return false;
                    })[0] ? true : false;
                    html += `
                        <li class="${haschild?'haschild':''}" id="${item.id}" level='2'>
                            <span class="cate_name">${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" level='2' data-toggle="modal" data-target="#myModal">Edit</span>
                            ${haschild?'':'<span class="delete">X</span>'}
                        </li>
                    `;
                }

            })
            $('.level-2').append(html);
            $('.level2-btn').append('<button type="button" class="btn btn-add btn-block btn-success"  level="2"  data-toggle="modal" data-target="#myModal">Add category</button>')
        })
        $('.level-2').on('click', 'li', function() {
            idLevel2Active = $(this).attr('id');
            $('.level-2 li').removeClass('active');
            $(this).addClass('active');

            $('.level-3').html('');
            $('.level-4').html('');
            $('.level3-btn').html('');
            $('.level4-btn').html('');

            let html = '';
            categoriesData.level3 && categoriesData.level3.map(item => {
                if (item.parentId === idLevel2Active) {
                    let haschild = categoriesData.level4 && categoriesData.level4.filter(item2 => {
                        if (item2.parentId === item.id) return true;
                        return false;
                    })[0] ? true : false;
                    html += `
                        <li class="${haschild?'haschild':''}" id="${item.id}" level='3'>
                            <span class="cate_name">${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" level='3' data-toggle="modal" data-target="#myModal">Edit</span>
                            ${haschild?'':'<span class="delete">X</span>'}
                        </li>
                    `;
                }

            })
            $('.level-3').append(html);
            $('.level3-btn').append('<button type="button" class="btn btn-add btn-block btn-success"  level="3"  data-toggle="modal" data-target="#myModal">Add category</button>')
        })
        $('.level-3').on('click', 'li', function() {
            idLevel3Active = $(this).attr('id');
            $('.level-3 li').removeClass('active');
            $(this).addClass('active');
            $('.level-4').html('');
            $('.level4-btn').html('');

            let html = '';
            categoriesData.level4 && categoriesData.level4.map(item => {
                if (item.parentId === idLevel3Active) {
                    html += `
                        <li class="" id="${item.id}" level='4'>
                            <span class="cate_name">${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" level='4' data-toggle="modal" data-target="#myModal">Edit</span>
                            <span class="delete">X</span>
                        </li>
                    `;
                }
            })
            $('.level-4').append(html);
            $('.level4-btn').append('<button type="button" class="btn btn-add btn-block btn-success"  level="4"  data-toggle="modal" data-target="#myModal">Add category</button>')
        })
        $('.level').on('click', '.edit', function() {
            isAdd = false;
            _id = $(this).attr('id');
            _level = parseInt($(this).attr('level'));
            _idParent = '';
            _rankingNo = $(this).attr('rankingNo');
            _name = $(this).parent().find('span').first().html();
            $('.error_cate').removeClass('active');
            $("input[name=name]").val(_name);
            $("input[name=ranking]").val(_rankingNo);
            $('.level-number').html(_level);

        })

        $('.level').on('click', '.btn-add', function() {
            isAdd = true;
            _level = parseInt($(this).attr('level'));
            $('.level-number').html(_level);
            $("input[name=name]").val('');
            $("input[name=ranking]").val(0);
            $('.error_cate').removeClass('active');
            $('#btn-submit').html("Add");
            if (_level === 2) _idParent = idLevel1Active;
            else if (_level === 3) _idParent = idLevel2Active;
            else if (_level === 4) _idParent = idLevel3Active;
            else _idParent = '';
            isAdd = true;
        })

        $('#btn-submit').on('click', function() {
            let rankingNo = $("input[name=ranking]").val();
            let categoryName = $("input[name=name]").val();
            if (categoryName == "") {
                $('.error_cate').addClass('active');
                return;
            }
            // console.log("222222", _level, _idParent, rankingNo, categoryName );

            if (isAdd) {
                $.ajax({
                    url: rootUrl + 'admin/categories/addCate',
                    data: {
                        level: _level,
                        parentId: _idParent,
                        rankingNo,
                        categoryName,
                        status: 'active'
                    },
                    type: "POST",
                    success: function(data) {
                        var resObject = JSON.parse(data);
                        if (resObject.status == 1) {
                            var datadd = {
                                level: _level,
                                parentId: _idParent,
                                id: resObject.id,
                                rankingNo,
                                categoryName,
                                status: 'active'
                            }
                            let html = `
                                    <li class="" id="${resObject.id}" level='${_level}'>
                                        <span class="cate_name">${categoryName}</span>
                                        <span class="edit" id="${resObject.id}" rankingNo="${rankingNo}" level='${_level}' data-toggle="modal" data-target="#myModal">Edit</span>
                                        <span class="delete">X</span>
                                    </li>
                                `;
                            categoriesData[`level${_level}`].push(datadd);
                            $(`.level-${_level}`).append(html);
                            $('#myModal').trigger('click');
                            let haschild = (_idParent != '' && $(`#${_idParent}`).attr('class') == "haschild active") ? true : false;
                            if (!haschild && _idParent != '') {
                                $(`#${_idParent}`).addClass("haschild");
                                $(`#${_idParent} .delete`).remove();
                            }
                            // location.reload();
                        } else {
                            confirm(resObject.error);
                        }
                    }
                });
            } else {
                $.ajax({
                    url: rootUrl + 'admin/categories/editCate',
                    data: {
                        id: _id,
                        level: _level,
                        rankingNo,
                        categoryName
                    },
                    type: "POST",
                    success: function(data) {
                        var resObject = JSON.parse(data);
                        if (resObject.status == 1) {
                            let haschild = $(`#${_id}`).attr('class') == "haschild active" ? true : false;
                            var html = `<span class="cate_name">${categoryName}</span>
                            <span class="edit" id="${_id}" rankingNo="${rankingNo}" level="${_level}" data-toggle="modal" data-target="#myModal">Edit</span>
                            ${haschild?'':'<span class="delete">X</span>'}`

                            $(`#${_id}`).empty().append(html);
                            updateCate(`level${_level}`, _id, categoryName, rankingNo);

                            $('#myModal').trigger('click');
                            toastr.success("Successfully updated");

                        } else {
                            toastr.error(resObject.error);
                        }
                    }
                });
            }

        });

        $('.level').on('click', '.delete', function() {
            let id = $(this).parent().attr('id');
            let _level = $(this).parent().attr('level');
            if (_level == 2) _idParent = idLevel1Active;
            else if (_level == 3) _idParent = idLevel2Active;
            else if (_level == 4) _idParent = idLevel3Active;
            else _idParent = '';
            let isDelete = confirm("Are you sure to delete this category");
            if (isDelete) {
                $.ajax({
                    url: rootUrl + 'admin/categories/deleteCate',
                    data: {
                        id
                    },
                    type: "POST",
                    success: function(data) {
                        var resObject = JSON.parse(data);
                        if (resObject.status == 1) {
                            $(`#${id}`).remove();
                            delCate(`level${_level}`, _level, id, _idParent);
                        } else {
                            toastr.error(resObject.error);
                        }
                    }
                });
            }
        })

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>