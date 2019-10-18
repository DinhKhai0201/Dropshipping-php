<?php include_once 'views/admin/layout/' . $this->layout . 'top.php'; ?>
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/libs/bootstrap/css/checkbox-x.min.css">
<link rel="stylesheet" href="<?php echo RootREL; ?>media/admin/css/table.css">
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

    <div class="row categories-management" id="aaabbbb">
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
                            </div>
                        </div>
                        <div class="col-sm-12 ">
                            <div class="form-group">
                                <label for="">Ranking No (*): </label>
                                <input class="form-control" type="number" name="ranking" placeholder="" data-validation="length alphanumeric" data-validation-length="min3" required />
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
    </div><!-- Modal -->
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
    $(document).ready(function() {
        $("#search").click(() => {
            toastr.info("Are you the 6 fingered man?");
        });
    });
</script>

<script>
    $(document).ready(function() {
        var table = $("#example").DataTable();

        $("#example tbody").on("click", "tr", function() {
            $(this).toggleClass("selected");
        });

        $("#delete-enter").click(function() {
            const length = table.rows(".selected").data().length;
            const _data = table.rows(".selected").data();
            let _arr = [];
            for (let i = 0; i < length; i++) {
                _arr.push(_data[i][0]);
            }
            console.log(_arr);
            $.ajax({
                type: "POST",
                url: "/admin/entertainer-type-delete-records",
                data: {
                    _arr
                },
                dataType: "text",
                success: function(result) {
                    if (result) {
                        toastr.success("Deleted successfully");
                        // setTimeout(() => {
                        //   window.location.reload();
                        // }, 1000);

                        table.rows('.selected').remove().draw(false);
                    } else {
                        toastr.error("Deleted error");
                    }
                }
            });
        });
    });
</script>

<script>
    // var entertainerCategories = '<%=JSON.stringify(entertainerType)%>';
    // var entertainerCategories = JSON.parse(entertainerCategories.replace(/&#34;/g, '"'));

    var entertainerCategories = {};

    var idLevel1Active = '';
    var idLevel2Active = '';
    var idLevel3Active = '';
    var isAdd = false;

    var _id = null;
    var _level = null;
    var _idParent = null;
    var _rankingNo = null;
    var _occupationId = null;
    var _name = null;
</script>
<script>
    $(document).ready(function() {
        init();

        function uuidv4() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        console.log(uuidv4());

        function init() {
            let html = '';
            entertainerCategories.level1 && entertainerCategories.level1.map(item => {
                let haschild = entertainerCategories.level2.filter(item2 => {
                    if (item2.parentId === item.id) return true;
                    return false;
                })[0] ? true : false;
                html += `
                    <li class="${haschild?'haschild':''}" id="${item.id}">
                        <span>${item.categoryName}</span>
                        <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" occupationId="${item.occupationId}" level='1' data-toggle="modal" data-target="#myModal">Edit</span>
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
            entertainerCategories.level2 && entertainerCategories.level2.map(item => {
                if (item.parentId === idLevel1Active) {
                    let haschild = entertainerCategories.level3.filter(item2 => {
                        if (item2.parentId === item.id) return true;
                        return false;
                    })[0] ? true : false;
                    html += `
                        <li class="${haschild?'haschild':''}" id="${item.id}">
                            <span>${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" occupationId="${item.occupationId}" level='2' data-toggle="modal" data-target="#myModal">Edit</span>
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
            entertainerCategories.level3 && entertainerCategories.level3.map(item => {
                if (item.parentId === idLevel2Active) {
                    let haschild = entertainerCategories.level4.filter(item2 => {
                        if (item2.parentId === item.id) return true;
                        return false;
                    })[0] ? true : false;
                    html += `
                        <li class="${haschild?'haschild':''}" id="${item.id}">
                            <span>${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" occupationId="${item.occupationId}" level='3' data-toggle="modal" data-target="#myModal">Edit</span>
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
            entertainerCategories.level4 && entertainerCategories.level4.map(item => {
                if (item.parentId === idLevel3Active) {
                    html += `
                        <li class="" id="${item.id}">
                            <span>${item.categoryName}</span>
                            <span class="edit" id="${item.id}" rankingNo="${item.rankingNo}" occupationId="${item.occupationId}" level='4' data-toggle="modal" data-target="#myModal">Edit</span>
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
            _occupationId = $(this).attr('occupationId');
            _name = $(this).parent().find('span').first().html();

            $("input[name=name]").val(_name);
            $("input[name=ranking]").val(_rankingNo);
            $("input[name=occupation_id]").val(_occupationId);
            $('.level-number').html(_level);

        })

        $('.level').on('click', '.btn-add', function() {
            isAdd = true;
            _level = parseInt($(this).attr('level'));
            console.log("1111111", _level);

            // $('.level-number').html(_level);
            // if (_level === 2) _idParent = idLevel1Active;
            // else if (_level === 3) _idParent = idLevel2Active;
            // else if (_level === 4) _idParent = idLevel3Active;
            // else _idParent = '';
            // isAdd = true;
        })

        $('#btn-submit').on('click', function() {
            console.log("11112222");


            let rankingNo = $("input[name=ranking]").val();
            let occupationId = $("input[name=occupation_id]").val();
            let categoryName = $("input[name=name]").val();
            if (occupationId === '' ||
                categoryName === '') return;
            if (isAdd) {
                $.ajax({
                    url: '/admin/entertainer-type/add',
                    data: {
                        level: _level,
                        parentId: _idParent,
                        rankingNo,
                        occupationId,
                        categoryName,
                        status: 'active'
                    },
                    type: "POST",
                    success: function(data) {
                        location.reload();
                    },
                    error: function(e) {
                        console.log('err', e);
                        // location.reload();  
                    }
                });
            } else {
                $.ajax({
                    url: '/admin/entertainer-type/edit',
                    data: {
                        id: _id,
                        level: _level,
                        rankingNo,
                        occupationId,
                        categoryName
                    },
                    type: "POST",
                    success: function(data) {
                        location.reload();
                    },
                    error: function(e) {
                        console.log('err', e);
                        // location.reload();  
                    }
                });
            }

        });

        $('.level').on('click', '.delete', function() {
            let id = $(this).parent().attr('id');
            let isDelete = confirm("Are you sure to delete this category");
            if (isDelete) {
                $.ajax({
                    url: '/admin/entertainer-type/delete',
                    data: {
                        id
                    },
                    type: "POST",
                    success: function(data) {
                        location.reload();
                    },
                    error: function(e) {
                        console.log('err', e);
                        // location.reload();  
                    }
                });
            }
        })

    });
</script>
<?php include_once 'views/admin/layout/' . $this->layout . 'footer.php'; ?>