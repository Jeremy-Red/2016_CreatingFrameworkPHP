<div id="answer"></div>
<button class="btn btn-primary"
        id="send">Button</button>
<br>
<?php
$obj1 = new \fw\widgets\menu\Menu([
    // 'tpl' => WWW . '/menu/my_menu.php',
    // 'container' => 'ul',
    'tpl' => WWW . '/menu/select.php',
    'container' => 'select',
    'class' => 'my-menu',
    'table' => 'categories',
    // 'cache' => 0,
    'cache' => 60,
    'cacheKey' => 'fw-menu-select',
]);
$obj2 = new \fw\widgets\menu\Menu([
    'tpl' => WWW . '/menu/my_menu.php',
    'container' => 'ul',
    // 'tpl' => WWW . '/menu/select.php',
    // 'container' => 'select',
    'class' => 'my-menu',
    'table' => 'categories',
    // 'cache' => 0,
    'cache' => 60,
    'cacheKey' => 'fw-menu-ul',
]);
// echo $obj1->getHash();
?>

<?php if (!empty($posts)): ?>
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <div class="list-group">
            <?php foreach ($posts as $post): ?>
                <a href="#"
                   class="list-group-item list-group-item-action d-flex gap-3 py-3"
                   aria-current="true">
                    <img src="/images/image.png"
                         alt="twbs"
                         width="32"
                         height="32"
                         class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">
                                <?= $post['title']; ?>
                            </h6>
                            <p class="mb-0 opacity-75">
                                <?= $post['excerpt']; ?>
                            </p>
                        </div>
                        <!-- <small class="opacity-50 text-nowrap">now</small> -->
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<script src="/js/test.js"></script>
<script>
    $('#send').click(() => {
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {
                'id': 3,
            },
            success: function (response) {
                $('#answer').html(response);
            },
            error: function (error) {
                alert(error);
            }
        });
    });
</script>